<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        Blog::create([
            'title' => 'Top 10 Beaches to Visit in 2025',
            'slug' => Str::slug('Top 10 Beaches to Visit in 2025'),
            'author' => 'John Doe',
            'image' => 'blogs/blog-1.jpg', // image path inside public/images/blogs
            'description' => 'Here are the top 10 beaches you must explore in 2025.',
            'status' => 1,
        ]);

        Blog::create([
            'title' => 'How to Travel on a Budget',
            'slug' => Str::slug('How to Travel on a Budget'),
            'author' => 'Jane Smith',
            'image' => 'blogs/blog-2.jpg',
            'description' => 'Traveling doesn’t have to be expensive. Here’s how to save money while exploring the world.',
            'status' => 1,
        ]);

        Blog::create([
            'title' => 'Ultimate Guide to Solo Traveling',
            'slug' => Str::slug('Ultimate Guide to Solo Traveling'),
            'author' => 'Emily Clark',
            'image' => 'blogs/blog-3.jpg',
            'description' => 'Solo traveling can be life-changing. Here are tips to make it safe and unforgettable.',
            'status' => 1,
        ]);
    }
}
