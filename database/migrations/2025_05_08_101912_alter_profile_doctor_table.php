<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProfileDoctorTable extends Migration
{
    public function up()
    {
        Schema::table('profile_doctor', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive'])->default('active');
        });
    }

    public function down()
    {
        Schema::table('profile_doctor', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
