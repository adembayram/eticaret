<?php

namespace Database\Factories;

use App\Models\BaseCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BaseCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BaseCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->text(50);
        return [
            //
            'name' => $name,
            'menu_id' => 1,
            'slug' => Str::slug($name)
        ];
    }
}
