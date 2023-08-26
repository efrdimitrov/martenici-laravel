<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->integer('size');
            $table->integer('code');
            $table->decimal('price', 5, 2);
            $table->decimal('price_old', 5, 2);
            $table->integer('width');
            $table->integer('height');
            $table->text('info');
            $table->integer('quantity');
            $table->text('category');
            $table->integer('box');
            $table->boolean('type');
            $table->text('sorting');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
