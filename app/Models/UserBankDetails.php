<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBankDetails extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'salary_bank_order_1',
        'salary_payment_method_1',
        'salary_payment_type1',
        'salary_payment_amount1',
        'salary_bank1',
        'salary_bank_branch1',
        'salary_account_type1',
        'salary_account_address1',

        'salary_bank_order_2',
        'salary_payment_method_2',
        'salary_payment_type2',
        'salary_payment_amount2',
        'salary_bank2',
        'salary_bank_branch2',
        'salary_account_type2',
        'salary_account_address2',

        'salary_bank_order_3',
        'salary_payment_method_3',
        'salary_payment_type3',
        'salary_payment_amount3',
        'salary_bank3',
        'salary_bank_branch3',
        'salary_account_type3',
        'salary_account_address3',

        'bonus_bank_order_1',
        'bonus_payment_method_1',
        'bonus_payment_type1',
        'bonus_payment_amount1',
        'bonus_bank1',
        'bonus_bank_branch1',
        'bonus_account_type1',
        'bonus_account_address1',

        'bonus_bank_order_2',
        'bonus_payment_method_2',
        'bonus_payment_type2',
        'bonus_payment_amount2',
        'bonus_bank2',
        'bonus_bank_branch2',
        'bonus_account_type2',
        'bonus_account_address2',

        'bonus_bank_order_3',
        'bonus_payment_method_3',
        'bonus_payment_type3',
        'bonus_payment_amount3',
        'bonus_bank3',
        'bonus_bank_branch3',
        'bonus_account_type3',
        'bonus_account_address3',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
