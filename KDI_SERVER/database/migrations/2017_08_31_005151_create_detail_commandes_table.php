<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_commandes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('commande_code')->unsigned();
            $table->string('produit_code')->unsigned();
            $table->integer('quantite')->unsigned();

            $table->foreign('commande_code')->references('code')->on('commandes');
            $table->foreign('produit_code')->references('code')->on('produits');
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
        Schema::dropIfExists('details_commandes');
    }
}
