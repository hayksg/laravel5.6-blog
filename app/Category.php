<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['parent_id', 'name', 'is_visible', 'category_order'];
    
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    
    public static function getCategories()
    {
        return static::where('parent_id', null)->get();
    }
}
