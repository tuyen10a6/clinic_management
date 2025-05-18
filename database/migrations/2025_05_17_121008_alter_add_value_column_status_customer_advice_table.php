<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterAddValueColumnStatusCustomerAdviceTable extends Migration
{
    public function up()
    {
        DB::statement("ALTER TABLE customer_advice MODIFY status ENUM('called', 'pending', 'done', 'canceled') DEFAULT 'pending'");
    }

    public function down()
    {
        DB::statement("ALTER TABLE customer_advice MODIFY status ENUM('called', 'pending', 'done') DEFAULT 'pending'");
    }
}
