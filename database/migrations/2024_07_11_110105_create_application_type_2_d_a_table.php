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
        Schema::create('application_type_2_d_a', function (Blueprint $table) {
            $table->id();

            $table->string('office')->nullable();
            $table->string('department')->nullable();
            $table->string('name')->nullable();
            $table->date('request_date')->nullable();
            $table->string('destination')->nullable();
            $table->string('destination_to')->nullable();
            $table->string('schedule')->nullable();

            $table->integer('days')->nullable();
            $table->string('allowance')->nullable();
            $table->string('money')->nullable();

            //user1
            $table->string('user1')->nullable();
            $table->string('breakdown1')->nullable();
            $table->string('price1')->nullable();
            //user2
            $table->string('user2')->nullable();
            $table->string('breakdown2')->nullable();
            $table->string('price2')->nullable();
            //user3
            $table->string('user3')->nullable();
            $table->string('breakdown3')->nullable();
            $table->string('price3')->nullable();
            //user4
            $table->string('user4')->nullable();
            $table->string('breakdown4')->nullable();
            $table->string('price4')->nullable();
            //user5
            $table->string('user5')->nullable();
            $table->string('breakdown5')->nullable();
            $table->string('price5')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_type_2_d_a');
    }
};
