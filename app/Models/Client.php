<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'rating',
        'profession',
        'image',
        'description',
        'status',
    ];

    // ✅ Gallery Relation
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'client_id', 'id');
    }
}
