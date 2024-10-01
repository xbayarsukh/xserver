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
        Schema::create('application_type_3_i', function (Blueprint $table) {
            $table->id();
            $table->string('office')->nullable();
            $table->string('department')->nullable();
            $table->string('name')->nullable();

            $table->date('request_date')->nullable();
            $table->date('change_date')->nullable();
            $table->string('address_furigana')->nullable();
            $table->string('address_name')->nullable();
            $table->string('phone_changed')->nullable();
            $table->string('before_address_furigana')->nullable();
            $table->string('before_address')->nullable();
            $table->string('phone_before')->nullable();
            $table->boolean('support')->nullable();
            $table->string('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_type_3_i');
    }
};
