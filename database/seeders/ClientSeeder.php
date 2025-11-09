<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    public function run()
    {
        Client::create([
            'name' => 'John Doe',
            'slug' => 'john-doe',
            'rating' => 4,
            'profession' => 'Web Developer',
            'image' => 'clients/client1.jpg',
            'description' => 'Sample client description.',
            'status' => 1,
        ]);

        Client::create([
            'name' => 'Emma Watson',
            'slug' => 'emma-watson',
            'rating' => 3,
            'profession' => 'Marketer',
            'image' => 'clients/client2.jpg',
            'description' => 'Sample client description.',
            'status' => 1,
        ]);

        Client::create([
            'name' => 'Harry Potter',
            'slug' => 'harry-potter',
            'rating' => 5,
            'profession' => 'Magician',
            'image' => 'clients/client3.jpg',
            'description' => 'Sample client description.',
            'status' => 1,
        ]);

        Client::create([
            'name' => 'Bugston',
            'slug' => 'bugston',
            'rating' => 5,
            'profession' => 'SEO Specialist',
            'image' => 'clients/client4.jpg',
            'description' => 'Sample client description.',
            'status' => 1,
        ]);
    }
}
