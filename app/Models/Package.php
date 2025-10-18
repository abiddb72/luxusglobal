<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'cat_id',
        'is_featured',
        'title',
        'slug',
        'price',
        'description',
        'package_included',
        'package_summary',
        'package_exclusions',
        'terms_condition',
        'image',
        'feature_image',
        'departure_country',
        'departure_city',
        'destination_country',
        'destination_city',
        'min_person_allowed',
        'ticket',
        'visa',
        'insurance',
        'stay',
        'hotel_choice',
        'company',
        'rate_mentioned',
        'expire_date',
        'status',
        'is_delete',
    ];

    protected $casts = [
        'expire_date' => 'date',
    ];

    /**
     * Relationship with Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    /**
     * Relationship with Package Queries (If Using)
     */
    public function queries()
    {
        return $this->hasMany(PackageQuery::class, 'package_id');
    }
}
