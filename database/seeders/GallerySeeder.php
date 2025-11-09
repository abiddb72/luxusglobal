<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    public function run()
    {
        Gallery::create([
            'client_id' => 1,
            'image'     => 'gallery/gallery1.jpg'
        ]);

        Gallery::create([
            'client_id' => 1,
            'image'     => 'gallery/gallery2.jpg'
        ]);

        Gallery::create([
            'client_id' => 1,
            'image'     => 'gallery/gallery3.jpg'
        ]);

        Gallery::create([
            'client_id' => 1,
            'image'     => 'gallery/gallery4.jpg'
        ]);

        Gallery::create([
            'client_id' => 2,
            'image'     => 'gallery/gallery5.jpg'
        ]);

        Gallery::create([
            'client_id' => 2,
            'image'     => 'gallery/gallery6.jpg'
        ]);

        Gallery::create([
            'client_id' => 2,
            'image'     => 'gallery/gallery7.jpg'
        ]);

        Gallery::create([
            'client_id' => 2,
            'image'     => 'gallery/gallery8.jpg'
        ]);

        Gallery::create([
            'client_id' => 3,
            'image'     => 'gallery/gallery9.jpg'
        ]);

        Gallery::create([
            'client_id' => 3,
            'image'     => 'gallery/gallery10.jpg'
        ]);

        Gallery::create([
            'client_id' => 3,
            'image'     => 'gallery/gallery11.jpg'
        ]);

        Gallery::create([
            'client_id' => 3,
            'image'     => 'gallery/gallery12.jpg'
        ]);

        Gallery::create([
            'client_id' => 4,
            'image'     => 'gallery/gallery13.jpg'
        ]);

        Gallery::create([
            'client_id' => 4,
            'image'     => 'gallery/gallery14.jpg'
        ]);

        Gallery::create([
            'client_id' => 4,
            'image'     => 'gallery/gallery15.jpg'
        ]);

        Gallery::create([
            'client_id' => 4,
            'image'     => 'gallery/gallery16.jpg'
        ]);
    }
}
