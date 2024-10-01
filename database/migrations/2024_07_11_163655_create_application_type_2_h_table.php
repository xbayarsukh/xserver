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
        Schema::create('application_type_2_h', function (Blueprint $table) {
            $table->id();

            $table->string('office')->nullable();
            $table->string('department')->nullable();
            $table->string('name')->nullable();

            $table->date('request_date')->nullable();
            $table->date('etc')->nullable();
            $table->string('destination')->nullable();
            $table->string('to_user')->nullable();
            $table->string('price')->nullable();
            $table->enum('select',['客先の現場納品が遠方のため','商品引き取りのため','研修参加のため','会議出席のため','セミナー参加のため','メーカー内覧会（展示会）参加のため'])->nullable();
            $table->string('list')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_type_2_h');
    }
};
