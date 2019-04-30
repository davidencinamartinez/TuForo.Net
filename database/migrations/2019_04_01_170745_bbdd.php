<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bbdd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('last_activity')->nullable();
            $table->integer('msg_count')->default(0);
            $table->integer('thread_count')->default(0);
            $table->string('user_pic')->nullable();
            $table->string('user_title')->nullable();
            $table->string('user_bg_style')->nullable();
            $table->boolean('banned')->default(0);
        });

        Schema::create('threads', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('category');
            $table->string('thread');
            $table->string('url')->unique();
            $table->timestamps();
            $table->string('creator');
            $table->integer('view_count')->default(0);
            $table->integer('reply_count')->default(0);
            $table->timestamp('last_reply_time')->nullable();
            $table->string('last_reply_user')->nullable();
            $table->boolean('closed')->default(0);
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('thread_id');
            $table->foreign('thread_id')->references('id')->on('threads');
            $table->unsignedInteger('creator');
            $table->foreign('creator')->references('id')->on('users');
            $table->longtext('content');
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('threads');
        Schema::dropIfExists('messages');
    }
}