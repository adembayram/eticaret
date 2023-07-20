<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Menu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //

            'id' => 1,
            'name' => "BOHEM",
            'created_at' => "2022-01-28 19:57:32",
            'updated_at' => "2022-01-28 19:57:32",
            'deleted_at' => null,            
        ];
    }
}
