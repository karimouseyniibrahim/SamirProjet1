<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrajetLivreurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trajetlivreur', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user_id")->nullable();			
			$table->integer('zoneactivite_id')->unsigned();
            $table->foreign('zoneactivite_id')->references('id')->on('zoneactivite')->onDelete('cascade');$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trajetlivreur');
    }
}
