<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Item;
use Illuminate\Http\Request;

/**
 * Class Company
 *
 * @package App
 * @property string $name
 * @property string $price
 * @property string $city
 * @property string $address
 * @property text $description
 * @property string $logo
 */

class Item extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'price', 'address', 'description', 'logo', 'city_id'];

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCityIdAttribute($input)
    {
        $this->attributes['city_id'] = $input ? $input : null;
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id')->withTrashed();
    }

    public function categories()
    {
        return $this->belongsToMany(Subcategory::class, 'subcategory_myitem')->withTrashed();
    }

    public function scopeFilterByRequest($query, Request $request)
    {
        if ($request->input('city_id')) {
            $query->where('city_id', '=', $request->input('city_id'));
        }

        if ($request->input('categories')) {
            $query->whereHas('categories',
                function ($query) use ($request) {
                    $query->where('id', $request->input('categories'));
                });
        }

        if ($request->input('search')) {
            $query->where('name', 'LIKE', '%'.$request->input('search').'%');
        }

        return $query;
    }

}
