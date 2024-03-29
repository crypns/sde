<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCommentsTable
 */
class CreateCommentsTable extends Migration
{

    /** @return void */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('email');
			$table->text('text');
			$table->integer('parent_id')->nullable(); //разрешаем null;
			$table->boolean('status')->default(config('comments.show_immediately'));
            $table->timestamps();

            $table->bigInteger('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts');

            if(config('comments.user')) {
                $table->bigInteger('user_id')->unsigned()->nullable();    //разрешаем null
                $table->foreign('user_id')->references('id')->on('users');
            }
        });
    }

    /** @return void */
    public function down()
    {
        Schema::dropIfExists('comments');
    }

}
