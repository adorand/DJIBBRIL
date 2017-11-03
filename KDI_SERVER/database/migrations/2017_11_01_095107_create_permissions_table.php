<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('action');
            $table->string('resource');
            $table->string('user_code');
            $table->timestamps();
            $table->index('user_code');
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::drop('permissions');
    }
}
