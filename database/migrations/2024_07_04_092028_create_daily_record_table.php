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
        Schema::create('daily_record', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('arrivalTime');
            $table->string('departureTime');
            $table->string('outSideWorked');
            $table->string('totalHour');
            $table->string('earlyCome');
            $table->string('overTime1');
            $table->string('overTime2');
            $table->string('late');
            $table->string('earlyLeave');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_record');
    }
};
