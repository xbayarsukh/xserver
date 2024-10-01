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
        Schema::create('application_type_6_a_4', function (Blueprint $table) {
            $table->id();

            $table->string('office')->nullable();
            $table->string('department')->nullable();
            $table->string('name')->nullable();

            $table->date('request_date')->nullable();
            $table->string('customer_name')->nullable();
            $table->enum('select',['A','Ｂ以下'])->nullable();

            $table->string('customer_address')->nullable();
            $table->enum('select2',['火災','風水害','雷','地震'])->nullable();
            $table->string('president_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('money1')->nullable();
            $table->string('money2')->nullable();
            $table->longText('special1')->nullable();
            $table->longText('special2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_type_6_a_4');
    }
};
