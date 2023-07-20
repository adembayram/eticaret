<?php

namespace Database\Seeders;

use App\Models\Bodies;
use Illuminate\Database\Seeder;

class BodiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Bodies::factory(1)->create();
    }
}
