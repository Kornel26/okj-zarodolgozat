<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->mediumIncrements('id');
            $table->string('email', 50);
            $table->string('vezeteknev', 15);
            $table->string('keresztnev', 15);
            $table->string('password', 60);
            $table->string('telefonszam', 15)->nullable();
            $table->string('iranyitoszam', 4)->nullable();
            $table->string('telepules', 30)->nullable();
            $table->string('utca', 20)->nullable();
            $table->string('hazszam', 5)->nullable();
            $table->string('egyeb', 20)->nullable();
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
        Schema::dropIfExists('users');
    }
}
