<?php

namespace Database\Seeders;

use App\Models\ShoppingCards;
use Illuminate\Database\Seeder;

class ShoppingCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ShoppingCards::factory(1)->create();
    }
}
