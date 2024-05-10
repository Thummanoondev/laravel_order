<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_tables', function (Blueprint $table) {
            $table->id();
            $table->string('name_c');
            $table->string('id_code');
            $table->string('name_car');
            $table->string('wide');
            $table->string('thick');
            $table->string('color');
            $table->string('screen');
            $table->string('type');
            $table->string('side');
            $table->integer('cnt_order');
            $table->string('long_side');
            $table->text('note');
            $table->text('date_get');
            $table->string('K_N');
            $table->integer('mk05');
            $table->string('stm');
            $table->integer('c_get');
            $table->string('uname');
            $table->string('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_tables');
    }
};