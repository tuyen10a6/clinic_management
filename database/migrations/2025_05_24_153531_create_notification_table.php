<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationTable extends Migration
{
    public function up()
    {
        Schema::create('notification', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->unsignedBigInteger('user_send');
            $table->foreign('user_send')->references('id')->on('users');
            $table->unsignedBigInteger('user_receiver');
            $table->foreign('user_receiver')->references('id')->on('users');
            $table->enum('user_send_permission', ['doctor', 'admin']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notification');
    }
}
