<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListImageChuyenKhoaTable extends Migration
{
    public function up()
    {
        Schema::create('list_image_chuyen_khoa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chuyen_khoa_id');
            $table->foreign('chuyen_khoa_id')->references('id')->on('chuyen_khoa');
            $table->string('image');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('list_image_chuyen_khoa');
    }
}
