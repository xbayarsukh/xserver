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
        Schema::create('user_bank_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            //salary1
            $table->string('salary_bank_order_1')->nullable();
            $table->string('salary_payment_method_1')->nullable();
            $table->string('salary_payment_type1')->nullable();
            $table->string('salary_payment_amount1')->nullable();
            $table->string('salary_bank1')->nullable();
            $table->string('salary_bank_branch1')->nullable();
            $table->string('salary_account_type1')->nullable();
            $table->string('salary_account_address1')->nullable();
            //salary2
            $table->string('salary_bank_order_2')->nullable();
            $table->string('salary_payment_method_2')->nullable();
            $table->string('salary_payment_type2')->nullable();
            $table->string('salary_payment_amount2')->nullable();
            $table->string('salary_bank2')->nullable();
            $table->string('salary_bank_branch2')->nullable();
            $table->string('salary_account_type2')->nullable();
            $table->string('salary_account_address2')->nullable();
            //salary3
            $table->string('salary_bank_order_3')->nullable();
            $table->string('salary_payment_method_3')->nullable();
            $table->string('salary_payment_type3')->nullable();
            $table->string('salary_payment_amount3')->nullable();
            $table->string('salary_bank3')->nullable();
            $table->string('salary_bank_branch3')->nullable();
            $table->string('salary_account_type3')->nullable();
            $table->string('salary_account_address3')->nullable();

              //bonus1
              $table->string('bonus_bank_order_1')->nullable();
              $table->string('bonus_payment_method_1')->nullable();
              $table->string('bonus_payment_type1')->nullable();
              $table->string('bonus_payment_amount1')->nullable();
              $table->string('bonus_bank1')->nullable();
              $table->string('bonus_bank_branch1')->nullable();
              $table->string('bonus_account_type1')->nullable();
              $table->string('bonus_account_address1')->nullable();
              //bonus2
              $table->string('bonus_bank_order_2')->nullable();
              $table->string('bonus_payment_method_2')->nullable();
              $table->string('bonus_payment_type2')->nullable();
              $table->string('bonus_payment_amount2')->nullable();
              $table->string('bonus_bank2')->nullable();
              $table->string('bonus_bank_branch2')->nullable();
              $table->string('bonus_account_type2')->nullable();
              $table->string('bonus_account_address2')->nullable();
              //bonus3
              $table->string('bonus_bank_order_3')->nullable();
              $table->string('bonus_payment_method_3')->nullable();
              $table->string('bonus_payment_type3')->nullable();
              $table->string('bonus_payment_amount3')->nullable();
              $table->string('bonus_bank3')->nullable();
              $table->string('bonus_bank_branch3')->nullable();
              $table->string('bonus_account_type3')->nullable();
              $table->string('bonus_account_address3')->nullable();




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_bank_details');
    }
};
