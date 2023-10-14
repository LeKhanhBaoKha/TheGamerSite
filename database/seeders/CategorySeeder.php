<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        category::create(['name'=>'Beverage']);
        category::create(['name'=>'Food']);
    }
}
