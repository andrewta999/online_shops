<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VpComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_comment', function (Blueprint $table) {
            $table->increments('comt_id');
            $table->string('comt_email');
            $table->string('comt_name');
            $table->string('comt_comment');
            $table->integer('comt_product')->unsigned();
            $table->foreign('comt_product')
                  ->references('pro_id')
                  ->on('vp_product')
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
        Schema::dropIfExists('vp_comment');
    }
}
