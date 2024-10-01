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
        Schema::create('application_type_6_a_3', function (Blueprint $table) {
            $table->id();
            $table->string('office')->nullable();
            $table->string('department')->nullable();
            $table->string('name')->nullable();

            $table->date('request_date')->nullable();
            $table->string('customer_name')->nullable();
            $table->enum('select',['A','Ｂ以下'])->nullable();

            $table->string('customer_address')->nullable();
            $table->enum('select2',['病気','怪我','事故'])->nullable();
            $table->string('furigana1')->nullable();
            $table->string('name1')->nullable();
            $table->string('age1')->nullable();
            $table->boolean('gender')->nullable();

            $table->string('relationship')->nullable();
            $table->boolean('address_change')->nullable();
            $table->string('hospital_name')->nullable();
            $table->string('shindan')->nullable();
            $table->string('room')->nullable();
            $table->string('money1')->nullable();
            $table->string('money2')->nullable();

            $table->longText('special')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_type_6_a_3');
    }
};
