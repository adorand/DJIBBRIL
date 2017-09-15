<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembresTable extends Migration
{
    public function up()
    {
        Schema::create('membres', function (Blueprint $table)
        {
            $table->string('code');
            $table->string('nom')->unique();
            $table->string('email')->unique();
            $table->string('telephone')->unique();
            $table->string('password');
            $table->binary('image')->nullable();
            $table->timestamps();
            $table->primary('code');
        });
    }

    public function down()
    {
        Schema::dropIfExists('membres');
    }
}
