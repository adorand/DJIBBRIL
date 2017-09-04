<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->string('code');
            $table->string('designation');
            $table->text('description');
            $table->integer('quantite');
            $table->double('prix');
            $table->binary('image');
            $table->string('categorie_code');
            $table->foreign('categorie_code')->references('code')->on('categories');
            $table->timestamps();

            $table->primary('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}