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
        Schema::table('breaks', function (Blueprint $table) {


            $table->dateTime('start_time2')->nullable();
            $table->dateTime('end_time2')->nullable();
            $table->dateTime('start_time3')->nullable();
            $table->dateTime('end_time3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('breaks', function (Blueprint $table) {
            //
        });
    }
};
