<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCustomerAdviceTable extends Migration
{

    public function up()
    {
        Schema::table('customer_advice', function (Blueprint $table) {
           $table->string('email')->nullable();
        });
    }

    public function down()
    {
        schema::table('customer_advice', function (Blueprint $table) {
            $table->dropColumn('email');
        });
    }
}
