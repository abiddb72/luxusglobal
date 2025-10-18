<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        Banner::create([
            'image' => 'banners/banner1.jpg',
            'status' => 1,
        ]);

        Banner::create([
            'image' => 'banners/banner2.jpg',
            'status' => 1,
        ]);
    }
}
