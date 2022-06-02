<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('web')->nullable();
            $table->string('city')->nullable();
            $table->bigInteger('NIC')->nullable();
            $table->bigInteger('emp_id')->nullable();
            $table->date('DOB')->nullable();
            $table->date('join_date')->nullable();
            $table->string('designation')->nullable();
            $table->string('description')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile_number')->nullable();

            $table->foreignId('employees_id');
            $table->foreign('employees_id')->on('users')->references('id')->cascadeOnDelete();
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
        Schema::dropIfExists('employees');
    }
}
