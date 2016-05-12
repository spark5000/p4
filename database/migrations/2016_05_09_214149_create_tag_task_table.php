<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTaskTable extends Migration
{
    public function up()
    {
        Schema::create('tag_task', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('task_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    public function down()
    {
        Schema::drop('tag_task');
    }
}
