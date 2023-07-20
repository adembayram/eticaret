<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            //
            'enable_slider' => rand(0,1),
            'image' => $this->faker->imageUrl(1920,710),
            'title' => $this->faker->text(20),
            'description' => $this->faker->text(40),
            'link' => "http://127.0.0.1:8000/"
        ];
    }
}
