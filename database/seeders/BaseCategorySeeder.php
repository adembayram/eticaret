<?php

namespace Database\Seeders;

use App\Models\BaseCategory;
use Illuminate\Database\Seeder;

class BaseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        BaseCategory::factory(50)->create();
    }
}
