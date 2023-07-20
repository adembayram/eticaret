<?php

namespace Database\Factories;

use App\Models\ShoppingCards;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShoppingCardsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShoppingCards::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => 1
        ];
    }
}
