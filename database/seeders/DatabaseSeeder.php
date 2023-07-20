<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            SettingSeeder::class,
            MenuSeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            ProductDetailSeeder::class,
            BodiesSeeder::class,
            ColorSeeder::class,
            AddressSeeder::class,
            //ProductImageSeeder::class,
            BaseCategorySeeder::class,
            CategorySeeder::class,
            ShoppingCartSeeder::class,
            ShoppingCartProductSeeder::class,
            OrderSeeder::class,
            SliderSeeder::class
        ]);

    }
}
