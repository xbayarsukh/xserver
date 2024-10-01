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
        Schema::table('arrival_records', function (Blueprint $table) {
            $table->timestamp('second_recorded_at')->nullable()->after('recorded_at');

        });




        Schema::table('departure_records', function (Blueprint $table) {
            $table->timestamp('second_recorded_at')->nullable()->after('recorded_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('records_tables', function (Blueprint $table) {
            //
        });
    }
};
