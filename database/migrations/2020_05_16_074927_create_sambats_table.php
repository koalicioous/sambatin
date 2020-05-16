<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSambatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sambats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('konten');
            $table->string('inisial');

            $table->unsignedBigInteger('id_tema');
            $table->foreign('id_tema')->references('id')->on('temas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sambats');
    }
}
