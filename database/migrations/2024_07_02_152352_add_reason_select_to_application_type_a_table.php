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
        Schema::table('application_type_a', function (Blueprint $table) {
            if (!Schema::hasColumn('application_type_a', 'reason_select')) {
                $table->string('reason_select')->nullable()->after('reason');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('application_type_a', function (Blueprint $table) {
            //
        });
    }
};
