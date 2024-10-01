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
        Schema::create('application_type_3_b', function (Blueprint $table) {
            $table->id();
            $table->string('office')->nullable();
            $table->string('department')->nullable();
            $table->string('name')->nullable();
            $table->date('request_date')->nullable();
            //Child1
            $table->string('name_furigana_1')->nullable();
            $table->string('child_name_1')->nullable();
            $table->enum('gender_1',['男','女'])->nullable();
            $table->string('relation_1')->nullable();
            $table->string('child_order_1')->nullable();
            $table->date('birthdate_1')->nullable();
            $table->enum('dependency_1',['有り','なし'])->nullable();
            //Child2
            $table->string('name_furigana_2')->nullable();
            $table->string('child_name_2')->nullable();
            $table->enum('gender_2',['男','女'])->nullable();
            $table->string('relation_2')->nullable();
            $table->string('child_order_2')->nullable();
            $table->date('birthdate_2')->nullable();
            $table->enum('dependency_2',['有り','なし'])->nullable();
            //Child3
            $table->string('name_furigana_3')->nullable();
            $table->string('child_name_3')->nullable();
            $table->enum('gender_3',['男','女'])->nullable();
            $table->string('relation_3')->nullable();
            $table->string('child_order_3')->nullable();
            $table->date('birthdate_3')->nullable();
            $table->enum('dependency_3',['有り','なし'])->nullable();


            //general
            $table->boolean('childcare_leave')->nullable();
            $table->date('childcare_leave_start_date')->nullable();


             $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_type_3_b');
    }
};
