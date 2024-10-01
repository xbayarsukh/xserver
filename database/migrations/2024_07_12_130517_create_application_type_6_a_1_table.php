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
        Schema::create('application_type_6_a_1', function (Blueprint $table) {
            $table->id();

            $table->string('office')->nullable();
            $table->string('department')->nullable();
            $table->string('name')->nullable();

            $table->date('request_date')->nullable();
            $table->string('customer_name')->nullable();
            $table->enum('select',['A','Ｂ以下'])->nullable();
            $table->string('customer_address')->nullable();
            $table->string('reason')->nullable();
            $table->string('furigana1')->nullable();
            $table->string('name1')->nullable();
            $table->string('age1')->nullable();
            $table->boolean('gender')->nullable();
            $table->string('relationship')->nullable();
            $table->string('furigana2')->nullable();
            $table->string('name2')->nullable();
            $table->string('idea')->nullable();
            $table->date('date2')->nullable();
            $table->time('time2')->nullable();
            $table->time('time2_to')->nullable();
            $table->string('funeral_place')->nullable();
            $table->string('funeral_address')->nullable();
            $table->string('funeral_post')->nullable();
            $table->string('funeral_phone')->nullable();
            $table->date('date3')->nullable();
            $table->time('time3')->nullable();
            $table->time('time3_to')->nullable();
            $table->string('funeral_place_2')->nullable();
            $table->string('funeral_address_2')->nullable();
            $table->string('funeral_post_2')->nullable();
            $table->string('funeral_phone_2')->nullable();

            //table
            $table->string('president_telegram')->nullable();
            $table->string('president_condolence')->nullable();
            $table->string('president_wake')->nullable();
            $table->string('chairman_flowers_1')->nullable();
            $table->enum('relation',['基','対'])->nullable();
            $table->string('chairman_flowers_2')->nullable();
            $table->string('president_gift')->nullable();
            $table->string('other_telegram')->nullable();
            $table->string('other_condolence')->nullable();
            $table->string('other_wake')->nullable();
            $table->string('chairman_flowers_3')->nullable();
            $table->enum('relation2',['基','対'])->nullable();
            $table->string('chairman_flowers_4')->nullable();
            $table->string('other_gift')->nullable();
            $table->longText('special')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_type_6_a_1');
    }
};
