<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 *
 * @package App
 * @property string $name
*/
class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'icon'];

    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class, 'category_subcategory');
    }
    public static function categories()
    {
        return static::pluck('name', 'id');
    }
    
}
