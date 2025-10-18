<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        Blog::create([
            'title' => 'Top 10 Beaches to Visit in 2025',
            'author' => 'John Doe',
            'image' => 'blogs/blog-1.jpg',
            'description' => 'Here are the top 10 beaches you must explore in 2025...',
        ]);

        Blog::create([
            'title' => 'How to Travel on a Budget',
            'author' => 'Jane Smith',
            'image' => 'blogs/blog-2.jpg',
            'description' => 'Traveling doesn’t have to be expensive. Here’s how to make the most of your money...',
        ]);
    }
}
