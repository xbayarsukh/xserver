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
        Schema::create('application_type_2_c', function (Blueprint $table) {
            $table->id();

            $table->string('office')->nullable();
            $table->string('department')->nullable();
            $table->string('name')->nullable();
            $table->date('request_date')->nullable();
            $table->enum('select',['雑費','事務用品費','販売促進費','厚生費','建物等補修費','社員教育費','消耗油脂費','仮払金'])->nullable();
            $table->string('sent_to')->nullable();
            $table->string('product_name')->nullable();
            $table->string('number')->nullable();
            $table->string('price')->nullable();

            $table->string('memo1')->nullable();
            $table->string('memo2')->nullable();
            $table->string('memo3')->nullable();
            $table->string('memo4')->nullable();
            $table->string('memo5')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_type_2_c');
    }
};
