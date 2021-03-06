<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('c_name', 20);
            $table->integer('c_telephone');
            $table->string('c_address', 50);
            $table->boolean('mtn');
            $table->boolean('cardservices');
            $table->boolean('airtel');
            $table->boolean('zoona');
            $table->boolean('xapit');
            $table->integer('userID')->unsigned()->unique();
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::drop('company_informations');
    }
}
