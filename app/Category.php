<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['parent_id', 'name', 'is_visible', 'category_order'];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    
    public function parent()
    {
        $parent = $this->where('id', $this->parent_id)->pluck('name')->shift();
        if (! $parent) {
            return 'Has no parent';
        }
        
        return $parent;
    }
    
    public static function getCategories()
    {
        return static::where('parent_id', null)->where('is_visible', 'on')->orderBy('category_order', 'asc')->get();
    }
    
    public function getRouteKeyName()
    {
        return 'name';
    }
    
    protected function getNestedCategories()
    {
        $result = [];
        
        $categories = $this->where('parent_id', $this->id)->get();
        
        if (! empty($categories)) {
            foreach ($categories as $category) {
                if (!empty($category)) {
                    $result[] = $category;
                    $result[] = $category->getNestedCategories();
                }
            }
        }
        return $result;
    }  
    
    protected function deleteAllNestedCategoriesPostsImages()
    {
        $nestedCategories = $this->getNestedCategories();
        
        array_walk_recursive($nestedCategories, function($value) {
            $posts = Post::where('category_id', $value->id)->get();
             
            if ($posts && count($posts) > 0) {
                array_walk_recursive($posts, function($post){
                    Post::deleteImage($post->img);
                });
            }
        });
    }
    
    protected function deleteCategoryPostsImages()
    {
        $posts = $this->posts()->get();
        
        foreach ($posts as $post) {          
            Post::deleteImage($post->img);
        }
    }
    
    public function deletePostsImages()
    {
        $this->deleteCategoryPostsImages();
        $this->deleteAllNestedCategoriesPostsImages();
    }
}
