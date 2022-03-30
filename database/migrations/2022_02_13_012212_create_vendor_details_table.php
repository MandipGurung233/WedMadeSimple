<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_details', function (Blueprint $table) {
            $table->id();
            $table->string('experience');
            $table->string('service');
            $table->string('payment'); 
            $table->integer('price'); 
            $table->integer('price1')->nullable(); 
            $table->string('date');
            $table->string('location');
            $table->string('email')->unique(); 
            $table->string('txt');  
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
        Schema::dropIfExists('vendor_details');
    }
}
