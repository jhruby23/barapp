<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique()->nullable();
            $table->char('pin', 4)->unique()->nullable();
            $table->string('status');
            $table->boolean('is_admin')->default(false);
            $table->boolean('dynamic_sort')->default(false);
            $table->integer('rfid_nr')->unique()->nullable();
            $table->string('rfid_hex')->unique()->nullable();
            $table->integer('team_id')->unsigned()->nullable();
            $table->integer('customer_id')->unsigned()->nullable();
            $table->string('remember_token');
            $table->timestamps();
            
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
