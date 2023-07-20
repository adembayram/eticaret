<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //

            'author' => "adembayram",
            'title' => "Eticaret | Sevgini Yansıt",
            'description' => "Sevdiklerinize sevginizi yansıtın.",
            'seo_key' => 'taki,eticaret,kadin,bilezik,bileklik,kolye,canta',
            'phone' => '02111111111',
            'mobile' => '05111111111',
            'address' => '85 Sage Rd. Ooltewah, TN 37363',
            'mail' => 'info@site.com.tr',
            'banner_enable' => 1,
            'banner_text' => 'Kendini ve sevdiklerini yansıt.',
            'banner_link' => 'https://www.site.com',
            'social_facebook' => 'https://www.facebook.com',
            'social_instagram' => 'https://www.instagram.com',
            'social_twitter' => 'https://www.twitter.com',
            'social_youtube' => 'https://www.youtube.com'
        
        ];
    }
}
