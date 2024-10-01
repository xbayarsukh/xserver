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
        Schema::create('arrival_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key column
            $table->timestamp('recorded_at');
            $table->timestamps();
            $table->softDeletes();

             // Define foreign key constraint
             $table->foreign('user_id', 'user_fk_9493409')->references('id')->on('users');



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arrival_records');
    }
};
