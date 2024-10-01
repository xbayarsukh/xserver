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
        Schema::create('application_type_3_g', function (Blueprint $table) {
            $table->id();
            $table->string('office')->nullable();
            $table->string('department')->nullable();
            $table->string('name')->nullable();
            $table->date('apply_date')->nullable();
            $table->date('edit_date')->nullable();
            //loop1
            $table->enum('select_1',['編入','除外'])->nullable();
            $table->string('family_name_furigana_1')->nullable();
            $table->string('family_name_1')->nullable();
            $table->enum('gender_1',['男','女'])->nullable();
            $table->string('relationship_1')->nullable();
            $table->date('birth_1')->nullable();
            $table->enum('occupation_1',['無職'])->nullable();
            $table->string('income_1')->nullable();
            $table->enum('live_1',['同居','別居'])->nullable();
            $table->string('reason_1')->nullable();
             //loop2
            $table->enum('select_2',['編入','除外'])->nullable();
            $table->string('family_name_furigana_2')->nullable();
            $table->string('family_name_2')->nullable();
            $table->enum('gender_2',['男','女'])->nullable();
            $table->string('relationship_2')->nullable();
            $table->date('birth_2')->nullable();
            $table->enum('occupation_2',['無職'])->nullable();
            $table->string('income_2')->nullable();
            $table->enum('live_2',['同居','別居'])->nullable();
            $table->string('reason_2')->nullable();
             //loop3
            $table->enum('select_3',['編入','除外'])->nullable();
            $table->string('family_name_furigana_3')->nullable();
            $table->string('family_name_3')->nullable();
            $table->enum('gender_3',['男','女'])->nullable();
            $table->string('relationship_3')->nullable();
            $table->date('birth_3')->nullable();
            $table->enum('occupation_3',['無職'])->nullable();
            $table->string('income_3')->nullable();
            $table->enum('live_3',['同居','別居'])->nullable();
            $table->string('reason_3')->nullable();




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_type_3_g');
    }
};
