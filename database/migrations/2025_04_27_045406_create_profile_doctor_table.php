<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileDoctorTable extends Migration
{
    public function up()
    {
        Schema::create('profile_doctor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('chuyen_khoa_id');
            $table->foreign('chuyen_khoa_id')->references('id')->on('chuyen_khoa');
            $table->string('bio')->nullable();
            $table->text('gioi_thieu_chung')->nullable();
            $table->text('hoc_van')->nullable();
            $table->text('qua_trinh_cong_tac')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profile_doctor');
    }
}
