<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Company;
use Illuminate\Http\Request;

/**
 * Class Company
 *
 * @package App
 * @property string $name
 * @property string $city
 * @property string $address
 * @property text $description
 * @property string $logo
*/
class Company extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'price', 'address', 'description', 'logo', 'city_id'];
    
    public function getImageUrl(){
        return asset($this->logo);
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->user_id = auth()->id();
        });
    }

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

    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class, 'category_company')->withTrashed();
    }

    public function scopeFilterByRequest($query, Request $request)
    {

        if ($request->input('city_id')) {
            $query->where('city_id', '=', $request->input('city_id'));
        }

        if ($request->input('subcategories')) {
            $query->whereHas('subcategories',
            function ($query) use ($request) {
                $query->where('id', $request->input('subcategories'));
            });
        }
        
        if ($request->input('search')) {
            $query->where('name', 'LIKE', '%'.$request->input('search').'%');
        }

        return $query;
    }
    
}

