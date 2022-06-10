<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\QuotationSeeder;
use Database\Seeders\ProjectTypeSeeder;
use Database\Seeders\RoleAndPermission;
use Database\Seeders\ProjectStatusSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        RoleAndPermission::run();
        ProjectStatusSeeder::run();
        QuotationSeeder::run();
        ProjectTypeSeeder::run();
    }
}
