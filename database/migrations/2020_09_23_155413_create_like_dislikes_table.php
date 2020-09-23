<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeDislikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_dislikes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movie_id')->unsigned()->nullable();
            $table->foreign('movie_id')
            ->references('id')
            ->on('movies')
            ->onDelete('cascade');
            $table->bigInteger('likes')->nullable();
            $table->bigInteger('dislikes')->nullable();
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
        Schema::dropIfExists('like_dislikes');
    }
}
