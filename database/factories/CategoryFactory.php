<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->text(40);
        return [
            //
            'base_id' => rand(1,50),
            'name' => $name,
            'slug' => Str::slug($name),
            'image' => $this->faker->imageUrl(161,161)
        ];
    }
}
