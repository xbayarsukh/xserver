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
        Schema::create('application_type_2_d_b', function (Blueprint $table) {
            $table->id();
            $table->string('office')->nullable();
            $table->string('department')->nullable();
            $table->string('name')->nullable();
            $table->date('request_date')->nullable();
            $table->string('destination')->nullable();
            $table->string('destination_to')->nullable();
            $table->string('price')->nullable();
            $table->string('distance_from')->nullable();
            $table->string('distance_to')->nullable();
            $table->string('moving_distance')->nullable();
            $table->string('moving_price')->nullable();
            $table->longText('long')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_type_2_d_b');
    }
};
