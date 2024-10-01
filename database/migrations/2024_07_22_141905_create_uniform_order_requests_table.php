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
        Schema::create('uniform_order_requests', function (Blueprint $table) {
            $table->id();
            $table->string('office')->nullable();
            $table->string('department')->nullable();
            $table->string('name')->nullable();
            $table->date('request_date1')->nullable();

            $table->enum('select2',['S','M','L','XL','XXL'])->nullable();
            $table->string('color')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uniform_order_requests');
    }
};
