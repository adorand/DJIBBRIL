<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandesTable extends Migration
{
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->string('code');
            $table->integer("etat");
            $table->string('membre_code')->nullable();
            $table->foreign("membre_code")->references('code')->on('membres');
            $table->timestamps();

            $table->primary('code');
        });
    }


    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
