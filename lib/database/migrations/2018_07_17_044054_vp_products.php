<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VpProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_product', function (Blueprint $table) {
            $table->increments('pro_id');
            $table->string('name');
            $table->string('slug');
            $table->integer('price');
            $table->string('img');
            $table->string('warranty');
            $table->string('accessories');
            $table->string('condition');
            $table->string('promotion');
            $table->tinyInteger('status');
            $table->text('description');
            $table->tinyInteger('featured');
            $table->integer('category')->unsigned();
            $table->foreign('category')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vp_product');
    }
}
