<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('description');
            $table->float('cost')->nullable();

            $table->foreignId('quotation_id');
            $table->foreign('quotation_id')->on('quotation')->references('id')->cascadeOnDelete();

            $table->foreignId('assigner_id');
            $table->foreign('assigner_id')->on('users')->references('id')->cascadeOnDelete();

            $table->foreignId('product_type_id');
            $table->foreign('product_type_id')->on('product_type')->references('id')->cascadeOnDelete();

            $table->date('valid_date');
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
        Schema::dropIfExists('product');
    }
}
