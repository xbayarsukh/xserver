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
        Schema::create('application_type_6_a_5', function (Blueprint $table) {
            $table->id();
            $table->string('office')->nullable();
            $table->string('department')->nullable();
            $table->string('name')->nullable();

            $table->date('request_date')->nullable();
            $table->string('customer_name')->nullable();
            $table->enum('select',['A','Ｂ以下'])->nullable();

            $table->string('customer_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('furigana1')->nullable();
            $table->string('name1')->nullable();
            $table->string('age1')->nullable();

            $table->boolean('gender')->nullable();
            $table->string('relationship')->nullable();
            $table->date('date2')->nullable();
            $table->time('time2')->nullable();
            $table->time('time2_to')->nullable();
            $table->string('wedding_place')->nullable();
            $table->string('wedding_address')->nullable();
            $table->string('wedding_post')->nullable();
            $table->string('wedding_phone')->nullable();
            $table->string('money1')->nullable();
            $table->string('money2')->nullable();
            $table->string('money3')->nullable();
            $table->longText('special')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_type_6_a_5');
    }
};
