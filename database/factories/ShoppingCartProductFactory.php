<?php

namespace Database\Factories;

use App\Models\ShoppingCartProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShoppingCartProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShoppingCartProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'shoppingcart_id' => 1,
            'product_id' => 1,
            'number' => rand(1,5),
            'size' => "S",
            'color' => "Blue",
            'price' => 25,
            'status' => "Siparişiniz Alındı"

        ];
    }
}
