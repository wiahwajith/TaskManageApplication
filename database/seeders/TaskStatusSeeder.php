<?php

namespace Database\Seeders;


use App\Models\TaskStatus;
use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskStatus::insert([
            [
                'name' => 'Todo',
                'code' => 'TD',
                'value' => 1,
                'description' => 'task in to do' ,
            ],
            [
                'name' => 'Progress',
                'code' => 'PG',
                'value' => 2,
                'description' => 'task in progress' ,
            ],
            [
                'name' => 'Done',
                'code' => 'DN',
                'value' => 3,
                'description' => 'task in done' ,
            ]
        ]);
    }
}
