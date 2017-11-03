<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListesTable extends Migration
{
    public function up()
    {
        Schema::create('listes', function (Blueprint $table) {
            $table->string('code');
            $table->string('libelle');
            $table->integer('etat');
            $table->string('client_code')->nullable();
            $table->foreign("client_code")->references('code')->on('clients');
            $table->timestamps();
            $table->primary('code');
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('listes');
    }
}
