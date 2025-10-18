<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            [
                'title' => 'Domestic',
                'slug' => 'domestic', 
                'feature_image' => 'packages/domestic_cat_feature.jpg', 
                'type' => 1,
                'sort' => 1, 
                'status' => 1, 
                'is_delete' => 0, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'title' => 'International',
                'slug' => 'international', 
                'feature_image' => 'packages/international_cat_feature.jpg', 
                'type' => 1,
                'sort' => 2, 
                'status' => 1, 
                'is_delete' => 0, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'title' => 'Group',
                'slug' => 'group', 
                'feature_image' => 'packages/group_cat_feature.jpg', 
                'type' => 1,
                'sort' => 3, 
                'status' => 1, 
                'is_delete' => 0, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'title' => 'Hajj',
                'slug' => 'hajj', 
                'feature_image' => 'packages/hajj_cat_feature.jpg', 
                'type' => 2,
                'sort' => 4, 
                'status' => 1, 
                'is_delete' => 0, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'title' => 'Umrah',
                'slug' => 'umrah', 
                'feature_image' => 'packages/umrah_cat_feature.jpg', 
                'type' => 2,
                'sort' => 5, 
                'status' => 1, 
                'is_delete' => 0, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'title' => 'Ramzan',
                'slug' => 'ramzan', 
                'feature_image' => 'packages/ramzan_cat_feature.jpg', 
                'type' => 2,
                'sort' => 6, 
                'status' => 1, 
                'is_delete' => 0, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'title' => 'Summer',
                'slug' => 'summer', 
                'feature_image' => 'packages/summer_cat_feature.jpg', 
                'type' => 3,
                'sort' => 7, 
                'status' => 1, 
                'is_delete' => 0, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
        ]);
    }
}
