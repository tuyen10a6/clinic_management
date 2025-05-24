<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddColumnAddDataDoctorCustomerAdviceTable extends Migration
{
    public function up()
    {
        Schema::table('customer_advice', function (Blueprint $table) {
            $table->unsignedBigInteger('doctor_id')->nullable()->after('status');
            $table->foreign('doctor_id')->references('id')->on('users');
            $table->enum('doctor_status', ['arrived', 'not_come'])->default('not_come')->after('doctor_id');
            $table->string('note_doctor')->nullable()->after('doctor_id');
            $table->string('date')->nullable()->after('note_doctor');
        });
    }

    public function down()
    {
        Schema::table('customer_advice', function (Blueprint $table) {
            $table->dropForeign('customer_advice_doctor_id_foreign');
            $table->dropColumn('doctor_id');
            $table->dropColumn('note_doctor');
            $table->dropColumn('doctor_status');
            $table->dropColumn('date');
        });
    }
}
