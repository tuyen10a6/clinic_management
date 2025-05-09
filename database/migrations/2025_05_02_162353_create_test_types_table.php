<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestTypesTable extends Migration
{
    public function up()
    {
        Schema::create('test_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 15, 3);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('test_types');
    }
}
