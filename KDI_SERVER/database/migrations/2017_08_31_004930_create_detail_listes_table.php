<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailListesTable extends Migration
{
    public function up()
    {
        Schema::create('details_listes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('liste_code');
            $table->string('produit_code');
            $table->integer('quantite');

            $table->foreign('liste_code')->references('code')->on('listes');
            $table->foreign('produit_code')->references('code')->on('produits');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('details_listes');
    }
}
