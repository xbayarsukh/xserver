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
        Schema::create('departure_records', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('arrival_id')->nullable();
            $table->timestamp('recorded_at');
            $table->timestamps();
            $table->softDeletes();

    // Define foreign key constraint
    $table->foreign('arrival_id', 'arrival_fk_9493417')->references('id')->on('arrival_records');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departure_records');
    }
};
