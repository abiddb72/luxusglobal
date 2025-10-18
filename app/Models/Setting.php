<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
    'meta_title',
    'meta_description',
    'meta_keywords',
    'email',
    'contact_no',
    'address',
    'header_logo',
    'footer_logo',
    'favicon',
    'description',
    'footer_text', 
    'whatsapp_number',
    'facebook_link',
    'twitter_link',
    'linkedin_link',
    'instagram_link',
    'youtube_link',
];
}
