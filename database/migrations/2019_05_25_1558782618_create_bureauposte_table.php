<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBureauPosteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bureauposte', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->nullable();
			$table->longText("adresse")->nullable();
			$table->string("tel")->nullable();
			$table->string("email")->nullable();
			$table->string("image")->nullable();
			
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
        Schema::dropIfExists('bureauposte');
    }
}
