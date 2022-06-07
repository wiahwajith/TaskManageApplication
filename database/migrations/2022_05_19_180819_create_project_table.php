<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->foreignId('creator_id');
            $table->foreign('creator_id')->on('users')->references('id')->cascadeOnDelete();

            $table->foreignId('assigner_id');
            $table->foreign('assigner_id')->on('users')->references('id')->cascadeOnDelete();

            $table->foreignId('customer_id');
            $table->foreign('customer_id')->on('users')->references('id')->cascadeOnDelete();

            $table->foreignId('project_status_id');
            $table->foreign('project_status_id')->on('project_status')->references('id')->cascadeOnDelete();
            $table->float('progress')->nullable();
            $table->date('project_start_date');
            $table->date('project_end_date');
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
        Schema::dropIfExists('project');
    }
}
