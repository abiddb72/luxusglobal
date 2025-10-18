<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting; 

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'meta_title'       => 'Luxus Global',
            'meta_description' => 'Best Travel and Tours Agency',
            'meta_keywords'    => 'travel, tours, luxus',
            'email'            => 'info@luxusglobal.net',
            'contact_no'       => '+0000-000-000',
            'whatsapp_number'  => '+0000-000-111',
            'address'          => 'Karachi, Pakistan',
            'header_logo'      => 'header_logo.jpg',
            'footer_logo'      => 'footer_logo.jpg',
            'favicon'          => 'favicon.jpg',
            'description'      => 'Welcome to Luxus Global, your trusted travel partner.',
            'footer_text'      => 'Copyright 2025 Luxusglobal All Rights Reserved',
            'facebook_link'    => 'https://www.facebook.com/',
            'twitter_link'     => 'https://www.twitter.com/',
            'linkedin_link'    => null,
            'instagram_link'   => 'https://www.instagram.com/',
            'youtube_link'     => null,
        ]);
    }
}
