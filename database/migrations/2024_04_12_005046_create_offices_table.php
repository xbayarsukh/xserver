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
        Schema::create('offices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('corp_id');
            $table->string('office_name');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('corp_id')->references('id')->on('corps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offices');
    }
};
