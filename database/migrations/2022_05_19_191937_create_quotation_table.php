<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('number');
            $table->string('code');
            $table->string('method');
            $table->string('description');
            $table->boolean('is_paid');
            $table->boolean('is_approved');
            $table->boolean('is_open');
            $table->integer('total_amount');
            
            $table->foreignId('quotation_status_id');
            $table->foreign('quotation_status_id')->on('quotation_status')->references('id')->cascadeOnDelete();

            $table->foreignId('customer_id');
            $table->foreign('customer_id')->on('users')->references('id')->cascadeOnDelete();


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
        Schema::dropIfExists('quotation');
    }
}
