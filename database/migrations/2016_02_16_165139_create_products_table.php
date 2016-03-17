<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('logo_url');
            $table->integer('quantity');
            $table->integer('member_price');
            $table->integer('guest_price');
            $table->boolean('enabled');
            $table->integer('position');
            
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            
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
        Schema::drop('products');
    }
}
