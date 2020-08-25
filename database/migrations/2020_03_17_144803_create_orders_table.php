<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /*
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedSmallInteger('user_id')->nullable();
            $table->string('fizetes_modja', 10);
            $table->string('megjegyzes', 255)->nullable();
            $table->string('allapot', 20);
            $table->unsignedMediumInteger('fizetendo_osszeg');
            $table->string('rendelo_adatai', 255);
            $table->timestamps();
        });
    }

    /*
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
