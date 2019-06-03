<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandeProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandeproduit', function (Blueprint $table) {
            $table->increments('id');
            $table->string("modeEnvoi")->nullable();
			$table->string("devis")->nullable();
			$table->string("typecommande")->nullable();
			$table->string("fraistransport")->nullable();
			$table->string("paye")->nullable();
			$table->string("dateacheminer")->nullable();
			$table->string("delaislivraison")->nullable();
			$table->string("datedebutacheminement")->nullable();
			
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
        Schema::dropIfExists('commandeproduit');
    }
}
