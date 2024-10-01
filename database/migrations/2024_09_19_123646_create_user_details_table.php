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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // $table->string('employee_number')->nullable();
            // $table->string('employee_name')->nullable();
            // $table->string('employee_furigana')->nullable();
            $table->string('previous_name')->nullable();
            // $table->string('gender')->nullable();
            // $table->date('brith_date')->nullable();
            // $table->string('post_number')->nullable();
            // $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('mobile_number')->nullable();
            // $table->string('email_address')->nullable();
            $table->string('mobile_email')->nullable();
            $table->string('driver_license')->nullable();
            $table->string('tax_table')->nullable();
            $table->string('tax_type')->nullable();
            $table->string('pay_system')->nullable();
            $table->string('bonus_system')->nullable();
            $table->string('employee_type')->nullable();
            $table->string('work_type')->nullable();
            $table->string('job_title')->nullable();
            $table->date('employed_date')->nullable();
            $table->string('disability_type')->nullable();
            $table->string('working_student')->nullable();
            $table->string('disaster_victim')->nullable();
            $table->string('foreigner')->nullable();
            $table->string('spouse_deduction')->nullable();
            $table->string('household_name')->nullable();
            $table->string('household_relation')->nullable();
            $table->string('disability_detail')->nullable();
            $table->string('salary')->nullable();
            $table->string('insurance_number')->nullable();
            $table->date('health_insurance')->nullable();
            $table->date('nursing_insurance')->nullable();
            $table->string('pension_number')->nullable();
            $table->date('pension_date')->nullable();
            $table->string('employment_insurance')->nullable();
            $table->string('employment_insurance_number')->nullable();
            $table->date('employment_insurance_date')->nullable();
            $table->string('accident_compensation')->nullable();
            $table->string('oneway_comute_distance')->nullable();
            $table->date('paid_leave_start')->nullable();
            $table->string('paid_day_time')->nullable();
            $table->string('marital_status')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
