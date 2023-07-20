<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //

            'user_id' => 1,
            'name' => "Demo Demo",
            'mail' => "demo@site.com",
            'country' => "Türkiye",
            'city' => "İstanbul",
            'address' => "İstanbul",
            'postcode' => "34000"
        ];
    }
}
