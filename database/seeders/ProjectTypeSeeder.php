<?php

namespace Database\Seeders;

use App\Models\Admin\ProductType;
use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductType::insert([
            [
                'name' => 'Managed Network Services',
                'code' => 'ST',
                'value' => 2,
                'description' => 'project in start stage' ,
            ],
            [
                'name' => 'Data Backup Services',
                'code' => 'ST',
                'value' => 3,
                'description' => 'project in start stage' ,
            ],
            [
                'name' => 'Data Storage and Management Services',
                'code' => 'ST',
                'value' => 4,
                'description' => 'project in start stage' ,
            ],
            [
                'name' => 'Public Cloud Hosting Services',
                'code' => 'ST',
                'value' => 5,
                'description' => 'project in start stage' ,
            ],
            [
                'name' => 'Private Cloud Hosting Services',
                'code' => 'ST',
                'value' => 6,
                'description' => 'project in start stage' ,
            ],
            [
                'name' => 'Network Cybersecurity Services',
                'code' => 'ST',
                'value' => 7,
                'description' => 'project in start stage' ,
            ],
            [
                'name' => 'IT Consulting Services',
                'code' => 'ST',
                'value' => 8,
                'description' => 'project in start stage' ,
            ],
            [
                'name' => 'Software Support Services',
                'code' => 'ST',
                'value' => 9,
                'description' => 'project in start stage' ,
            ],
            [
                'name' => 'IT Help Desk Services',
                'code' => 'ST',
                'value' => 1,
                'description' => 'project in start stage' ,
            ],
            [
                'name' => 'Hardware Support Services',
                'code' => 'ST',
                'value' => 10,
                'description' => 'project in start stage' ,
            ],
            [
                'name' => 'Project Management Services',
                'code' => 'ST',
                'value' => 11,
                'description' => 'project in start stage' ,
            ],
            [
                'name' => 'Product Development Services',
                'code' => 'ST',
                'value' => 12,
                'description' => 'project in start stage' ,
            ],
        ]);
    }
}
