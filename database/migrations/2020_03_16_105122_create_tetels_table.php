<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTetelsTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tetels', function (Blueprint $table) {
            $table->unsignedMediumInteger('rendeles_id');
            $table->unsignedMediumInteger('etel_id');
            $table->unsignedTinyInteger('mennyiseg');
            $table->string('pizza_meret')->nullable();
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
        Schema::dropIfExists('tetels');
    }
}
