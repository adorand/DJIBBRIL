<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->string('code');
            $table->string('nom');
            $table->text('description')->nullable();
            $table->string('code_parent')->nullable();
            $table->string('surface_code');
            $table->foreign('surface_code')->references('code')->on('surfaces');
            $table->foreign('code_parent')->references('code')->on('categories');
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
        Schema::dropIfExists('categories');
    }
}
