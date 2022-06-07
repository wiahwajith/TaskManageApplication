<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->date('task_start_date')->nullable();
            $table->date('task_end_date')->nullable();
            $table->dateTime('worker_task_start_date')->nullable();
            $table->dateTime('worker_task_end_date')->nullable();

            $table->foreignId('project_id');
            $table->foreign('project_id')->on('project')->references('id')->cascadeOnDelete();

            $table->foreignId('task_status_id');
            $table->foreign('task_status_id')->on('task_status')->references('id')->cascadeOnDelete();

            $table->foreignId('creator_id');
            $table->foreign('creator_id')->on('users')->references('id')->cascadeOnDelete();

            $table->foreignId('assigner_id');
            $table->foreign('assigner_id')->on('users')->references('id')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
}
