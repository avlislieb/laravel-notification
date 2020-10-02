<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('title');

            $table->text('body');

            $table->unsignedBigInteger('user_id'); // user commented
            $table->unsignedBigInteger('post_id');

            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->foreign('post_id')
                ->references('id')->on('posts');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
