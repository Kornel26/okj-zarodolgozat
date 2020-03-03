<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtelsTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etels', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('nev', 30);
            $table->unsignedSmallInteger('ar');
            $table->string('kep', 60)->nullable();
            $table->string('kategoria', 20);
            $table->string('feltetek', 255)->nullable();
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
        Schema::dropIfExists('etels');
    }
}
