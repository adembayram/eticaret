<?php

namespace Database\Seeders;

use App\Models\ShoppingCartProduct;
use Illuminate\Database\Seeder;

class ShoppingCartProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ShoppingCartProduct::factory(1)->create();
    }
}
