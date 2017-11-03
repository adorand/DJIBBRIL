<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table)
        {
            $table->string('code');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->binary('image')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->primary('code');
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('users');
    }
}
