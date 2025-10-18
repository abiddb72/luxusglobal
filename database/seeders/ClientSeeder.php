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
            'profession' => 'Web Developer',
            'image' => 'clients/client1.jpg',
            'description' => 'Sample client description.',
            'status' => 1,
        ]);

        Client::create([
            'name' => 'Emma Watson',
            'profession' => 'Marketer',
            'image' => 'clients/client2.jpg',
            'description' => 'Sample client description.',
            'status' => 1,
        ]);

        Client::create([
            'name' => 'Harry Potter',
            'profession' => 'Magician',
            'image' => 'clients/client3.jpg',
            'description' => 'Sample client description.',
            'status' => 1,
        ]);

        Client::create([
            'name' => 'Bugston',
            'profession' => 'SEO Specialist',
            'image' => 'clients/client4.jpg',
            'description' => 'Sample client description.',
            'status' => 1,
        ]);
    }
}
