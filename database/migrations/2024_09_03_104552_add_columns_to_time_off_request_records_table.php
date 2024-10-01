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
        // Schema::table('time_off_request_records', function (Blueprint $table) {
        //     $table->string('reason')->nullable();
        //     $table->string('reason_select')->nullable()->after('reason');
        //     $table->string('status')->nullable();
        //     $table->unsignedBigInteger('boss_id')->nullable()->after('user_id');
        //     $table->boolean('is_checked')->default(false);
        //     $table->unsignedBigInteger('checked_by')->nullable();
        //     $table->timestamp('checked_at')->nullable();
        //     $table->unsignedBigInteger('division_id')->nullable();
        //     $table->boolean('is_first_approval')->default(false);
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('time_off_request_records', function (Blueprint $table) {
            //
        });
    }
};
