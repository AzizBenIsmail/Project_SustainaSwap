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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->string('image_url')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
                });




                Schema::create('post_likes', function (Blueprint $table) {
                    $table->id();
                    $table->unsignedBigInteger('post_id');
                    $table->unsignedBigInteger('user_id');
                    $table->timestamps();
        
                    $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
                    $table->foreign('user_id')->references('id')->on('users');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_likes');
    }
};
