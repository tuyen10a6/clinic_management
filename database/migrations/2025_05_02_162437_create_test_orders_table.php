<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('test_orders', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('patient_id');
                $table->unsignedBigInteger('doctor_id');
                $table->unsignedBigInteger('test_type_id');
                $table->timestamp('ordered_at')->useCurrent();
                $table->enum('status', ['ordered','completed','cancelled'])->default('ordered');
                $table->text('notes')->nullable();
                $table->timestamps();

                $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
                $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('test_type_id')->references('id')->on('test_types')->onDelete('cascade');
            });
    }


    public function down()
    {
        Schema::dropIfExists('test_orders');
    }
}
