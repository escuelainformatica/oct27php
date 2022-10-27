<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('stock');
            $table->timestamps();
        });
        Schema::create('sales', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('idproduct');
            $table->foreign('idproduct')->references('id')->on('products');
            $table->string('customer');
            $table->integer('quantity');
            $table->timestamps();
        });
        Schema::create('purchases', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('idproduct');
            $table->foreign('idproduct')->references('id')->on('products');
            $table->string('provider');
            $table->integer('quantity');
            $table->timestamps();
        });
        Schema::create('logs', function (Blueprint $table) {

            $table->id();
            $table->string('event',2000);
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
        //
    }
};
