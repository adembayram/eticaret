<?php

namespace Database\Factories;

use App\Models\Bodies;
use Illuminate\Database\Eloquent\Factories\Factory;

class BodiesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bodies::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'product_id' => 1,
            'size' => "S"
        ];
    }
}
