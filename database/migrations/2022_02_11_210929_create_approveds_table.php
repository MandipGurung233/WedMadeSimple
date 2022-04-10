<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approveds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('password'); 
            $table->string('vendorType');
            $table->string('file')->nullable(); 
            $table->string('description')->nullable(); 
            $table->string('view')->nullable();
            $table->string('bookNo')->nullable();
            $table->string('value')->nullable(); 
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
        Schema::dropIfExists('approveds');
    }
}
