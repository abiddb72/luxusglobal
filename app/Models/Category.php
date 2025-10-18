<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'slug', 'type', 'feature_image', 'sort', 'status'];

    public function packages()
    {
        return $this->hasMany(Package::class, 'cat_id');
    }
}


