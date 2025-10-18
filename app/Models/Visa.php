<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Visa extends Model
{
    protected $fillable = [
        'country_title',
        'slug',
        'country_image',
        'feature_image',
        'visa_description',
        'embassy_requirements',
        'duration_description',
        'status',
    ];

    // Auto set slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($visa) {
            $visa->slug = Str::slug($visa->country_title);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
