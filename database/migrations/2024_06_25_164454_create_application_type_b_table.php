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
        Schema::create('application_type_b', function (Blueprint $table) {
            $table->id();
            $table->string('list')->nullable();
            $table->string('customer')->nullable();
            $table->string('produc_name')->nullable();
            $table->string('pieces')->nullable();
            $table->string('payment')->nullable();
            $table->longText('description')->nullable();
            $table->string('accountant')->nullable();
            $table->string('manager')->nullable();
            $table->string('person')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_type_b');
    }
};
