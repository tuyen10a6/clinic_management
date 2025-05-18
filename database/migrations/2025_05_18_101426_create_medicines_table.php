<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên thuốc
            $table->string('unit')->nullable(); // Đơn vị (viên, ống, lọ...)
            $table->string('dosage_form')->nullable(); // Dạng thuốc (viên, dung dịch...)
            $table->string('strength')->nullable(); // Hàm lượng (500mg, 5mg/ml...)
            $table->text('usage')->nullable(); // Cách dùng (Uống sau ăn, 2 lần/ngày...)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medicines');
    }
}
