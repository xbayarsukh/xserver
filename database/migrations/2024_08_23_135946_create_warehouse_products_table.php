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
        Schema::create('warehouse_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('office_id'); // Office foreign key
            $table->string('product_code')->unique();
            $table->string('product_name');
            $table->string('image_path')->nullable(); // Add this line
            $table->string('product_type');
            $table->string('product_maker')->nullable();
            $table->integer('quantity');
            $table->string('price')->nullable();
            $table->date('date')->nullable();
            $table->string('product_detail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_products');
    }
};
