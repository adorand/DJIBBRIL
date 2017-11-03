<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->string('code');
            $table->string('nom');
            $table->text('description')->nullable();
            $table->string('code_parent')->nullable();
            $table->string('surface_code');
            $table->foreign('surface_code')->references('code')->on('surfaces')->onDelete('cascade');
            $table->foreign('code_parent')->references('code')->on('categories')->onDelete('cascade');
            $table->timestamps();
            $table->primary('code');
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
