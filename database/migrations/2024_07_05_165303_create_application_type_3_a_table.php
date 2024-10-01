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
        Schema::create('application_type_3_a', function (Blueprint $table) {
            $table->id();
            $table->string('office')->nullable();
            $table->string('department')->nullable();
            $table->string('name')->nullable();
            $table->date('request_date1')->nullable();
            $table->date('request_date2')->nullable();
            $table->date('request_date3')->nullable();
            $table->string('spouse_furigana')->nullable();
            $table->string('spouse_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('place_furigana')->nullable();
            $table->string('place_name')->nullable();
            $table->string('place_address_furigana')->nullable();
            $table->string('place_address_name')->nullable();
            $table->string('place_phone')->nullable();
            $table->boolean('support')->nullable();
            $table->boolean('name_change')->nullable();
            $table->boolean('address_change')->nullable();
            $table->boolean('emergency_contact_change')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_type_3_a');
    }
};
