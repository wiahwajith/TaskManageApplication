<?php

namespace Database\Seeders;

use App\Models\ProjectStatus;
use Illuminate\Database\Seeder;

class ProjectStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectStatus::insert([
            [
                'name' => 'Start',
                'code' => 'ST',
                'value' => 1,
                'description' => 'project in start stage' ,
            ],
            [
                'name' => 'Initiation',
                'code' => 'IN',
                'value' => 1,
                'description' => 'project in initiation stage' ,
            ],
            [
                'name' => 'Planning',
                'code' => 'PL',
                'value' => 1,
                'description' => 'project in planning stage' ,
            ],
            [
                'name' => 'Following',
                'code' => 'FT',
                'value' => 1,
                'description' => 'project in following stage' ,
            ],
            [
                'name' => 'Hold',
                'code' => 'FT',
                'value' => 1,
                'description' => 'project in hold stage' ,
            ],
            [
                'name' => 'Finalize',
                'code' => 'FZ',
                'value' => 1,
                'description' => 'project in finalize stage' ,
            ],
            [
                'name' => 'Done',
                'code' => 'DN',
                'value' => 1,
                'description' => 'project is done' ,
            ],
            [
                'name' => 'Maintenance',
                'code' => 'MT',
                'value' => 1,
                'description' => 'project on maintenance' ,
            ],
            [
                'name' => 'Close',
                'code' => 'CL',
                'value' => 1,
                'description' => 'project is Closed' ,
            ],
        ]);
    }
}
