<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\User::find(1)->update(['is_admin'=>true]);
        $this->call([
            categorySeeder::class,
            ProductSeeder::class
        ]);
    }
}
