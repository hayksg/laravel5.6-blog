<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
    
    public function posts()
    {
        // 1 post may have many tags
        // 1 tag may applied to many posts
        
    	return $this->belongsToMany(Post::class);
    }
    
    public function getRouteKeyName()
    {
        return 'name';
    }
    
    public static function saveTag($tags)
    {
        $tags = explode(' ', $tags);
        foreach ($tags as $tagName) {
            $result = static::where('name', $tagName)->get()->toArray();
        
            if (is_array($result) && count($result) == 0) { 
                static::create([
                    'name' => $tagName,
                ]);
            }
        }
    }
}
