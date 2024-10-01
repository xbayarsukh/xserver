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
        Schema::create('car', function (Blueprint $table) {
            $table->id();
            $table->string('car_id')->nullable();
            $table->string('number_plate')->nullable();
            $table->string('car_type')->nullable();
            $table->string('car_made_year')->nullable();
            $table->string('car_insurance_company')->nullable();
            $table->date('car_insurance_start')->nullable();
            $table->date('car_insurance_end')->nullable();
            $table->string('etc')->nullable();
            $table->string('image_path')->nullable(); // Add this line
            $table->longText('car_detail')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car');
    }
};
