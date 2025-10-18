<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visa;
use Illuminate\Support\Str;

class VisaSeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            [
                'country_title' => 'United Arab Emirates',
                'country_image' => 'flags/uae.jpg',
                'feature_image' => 'flags/uae_feature.jpg',
                'visa_description' => 'UAE visa information and process.',
                'embassy_requirements' => 'Passport, Photo, Bank Statement.',
                'duration_description' => '30 Days / 90 Days Stay.'
            ],
            [
                'country_title' => 'United States of America',
                'country_image' => 'flags/usa.jpg',
                'feature_image' => 'flags/usa_feature.jpg',
                'visa_description' => 'USA visa guidelines and details.',
                'embassy_requirements' => 'Passport, Invitation Letter.',
                'duration_description' => '1 Month / 3 Month.'
            ],
            [
                'country_title' => 'Germany',
                'country_image' => 'flags/germany.jpg',
                'feature_image' => 'flags/germany_feature.jpg',
                'visa_description' => 'Germany e-visa details and process.',
                'embassy_requirements' => 'Passport, Return Ticket.',
                'duration_description' => '30 Days Stay.'
            ],
            [
                'country_title' => 'France',
                'country_image' => 'flags/france.jpg',
                'feature_image' => 'flags/france_feature.jpg',
                'visa_description' => 'France e-visa details and process.',
                'embassy_requirements' => 'Passport, Return Ticket.',
                'duration_description' => '30 Days Stay.'
            ],
            [
                'country_title' => 'United Kingdom',
                'country_image' => 'flags/uk.jpg',
                'feature_image' => 'flags/uk_feature.jpg',
                'visa_description' => 'UK e-visa details and process.',
                'embassy_requirements' => 'Passport, Return Ticket.',
                'duration_description' => '30 Days Stay.'
            ],
        ];

        foreach ($countries as $country) {
            Visa::create([
                'country_title' => $country['country_title'],
                'slug' => Str::slug($country['country_title']),
                'country_image' => $country['country_image'],
                'feature_image' => $country['feature_image'],
                'visa_description' => $country['visa_description'],
                'embassy_requirements' => $country['embassy_requirements'],
                'duration_description' => $country['duration_description'],
                'status' => 1,
            ]);
        }
    }
}
