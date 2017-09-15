<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurfacesTable extends Migration
{
    public function up()
    {
        Schema::create('surfaces', function (Blueprint $table)
        {
            $table->string('code');
            $table->string('nom');
            $table->binary('image');
            $table->string('user_code');
            $table->foreign("user_code")->references('code')->on('users');

            $table->timestamps();
            $table->primary('code');
        });
    }


    public function down()
    {
        Schema::drop('surfaces');
    }
}
