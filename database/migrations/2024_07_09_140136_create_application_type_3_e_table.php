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
        Schema::create('application_type_3_e', function (Blueprint $table) {
            $table->id();

            $table->string('office')->nullable();
            $table->string('department')->nullable();
            $table->string('name')->nullable();

            $table->date('request_date')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('hospital_name')->nullable();
             $table->string('address_furigana')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();

            $table->date('hospital_date_from')->nullable();
            $table->date('hospital_date_to')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_type_3_e');
    }
};
