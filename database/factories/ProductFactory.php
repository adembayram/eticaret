<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = "Elbise ".rand(0,100);
        return [
            //
            'product_code'  => $this->faker->numberBetween(1000000000,9999999999),
            'product_name'  => $name,
            'slug'          => Str::slug($name),
            'description'   => $this->faker->paragraph(20),
            'price'         => $this->faker->randomFloat(3,50,250),
            'stock'         => rand(20,100)
        ];
    }
}
