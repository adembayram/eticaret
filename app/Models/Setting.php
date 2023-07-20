<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [

        'title',
        'description',
        'seo_key',
        'phone',
        'mobile',
        'mail',
        'address',
        'banner_enable',
        'banner_text',
        'banner_link',
        'social_facebook',
        'social_instagram',
        'social_twitter',
        'social_youtube'
    ];
}
