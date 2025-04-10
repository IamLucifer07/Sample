<?php

namespace Database\Seeders;

use \Illuminate\Database\Seeder;
use \App\Models\Data;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Data::factory(10)->create();
    }
}
