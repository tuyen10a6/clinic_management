<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChuyenKhoaTable extends Migration
{
    public function up()
    {
        Schema::create('chuyen_khoa', function (Blueprint $table) {
            $table->id();
            $table->string('ten_chuyen_khoa');
            $table->text('gioi_thieu_chung')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chuyen_khoa');
    }
}
