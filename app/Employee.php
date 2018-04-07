<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'age', 'position', 'performance', 'salary', 'hired', 'img'];
    
    public static function deleteImage($img)
    {
        if ($img) {
            \Storage::delete('public/employee/' . $img);
        }
    }
}
