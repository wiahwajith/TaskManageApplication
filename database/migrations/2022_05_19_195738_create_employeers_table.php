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
            $table->string('last_name');
            $table->string('email');
            $table->string('web');
            $table->string('city');
            $table->bigInteger('NIC');
            $table->bigInteger('emp_id');
            $table->date('DOB');
            $table->date('join_date');
            $table->string('designation');
            $table->string('description');
            $table->string('address');
            $table->string('mobile_number');

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
