<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Subcategory extends Model
{
    /**
     * Class Category
     *
     * @package App
     * @property string $name
     */
    use SoftDeletes;

    protected $fillable = ['name'];


    public static function subcategories()
    {
        return static::pluck('name', 'id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_subcategory')->withTrashed();
    }


}
