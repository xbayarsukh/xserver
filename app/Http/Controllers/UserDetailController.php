<?php

namespace App\Http\Controllers;

use App\Models\Corp;
use App\Models\User;

use App\Models\Office;
use App\Models\UserDetail;
use App\Models\UserFamily;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\UserBankDetails;
use Illuminate\Support\Facades\Validator;

class UserDetailController extends Controller
{



    public function showAndUpdate($id, Request $request)
    {
        $user = User::with('userDetail')->findOrFail($id);
        $corps = Corp::all();
        $roles = Role::pluck('name', 'name')->all();
        $offices = Office::all();

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [

                // 'employee_number' => 'nullable|string|max:255',
                // 'employee_name' => 'required|string|max:255',
                // 'employee_furigana' => 'nullable|string|max:255',
                'previous_name' => 'nullable|string|max:255',
                // 'gender' => 'nullable|string|max:255',
                // 'brith_date' => 'nullable|date',
                // 'post_number' => 'nullable|string|max:255',
                // 'address' => 'nullable|string|max:255',
                'phone_number' => 'nullable|string|max:255',
                'mobile_number' => 'nullable|string|max:255',
                // 'email_address' => 'nullable|email|max:255',
                'mobile_email' => 'nullable|email|max:255',
               'driver_license' => 'required|string|in:有,無', // Ensure it's either '有' or '無'


                'tax_table' => 'required|string|in:月額表,日額表',

                'tax_type' => 'required|string|in:甲欄,乙欄,課税なし',
                'pay_system' => 'nullable|string|max:255',
                'bonus_system' => 'nullable|string|max:255',
                'employee_type' => 'nullable|string|max:255',
                'work_type' => 'required|string|in:常勤,非常勤,',
                'job_title' => 'nullable|string|max:255',
                'employed_date' => 'nullable|date',
                'disability_type' => 'required|string|in:対象外,対象',
                'working_student' => 'required|string|in:対象外,対象',
                'disaster_victim' => 'required|string|in:対象外,対象',
                'foreigner' => 'required|string|in:対象外,対象',
                'spouse_deduction' => 'required|string|in:配偶者なし,源泉控除対象配偶者,源泉控除対象配偶者以外の配偶者',
                'household_name' => 'nullable|string|max:255',
                'household_relation' => 'nullable|string|max:255',
                'disability_detail' => 'nullable|string|max:255',
                'salary' => 'nullable|string|max:255',
                'insurance_number' => 'nullable|string|max:255',
                'health_insurance' => 'nullable|date',
                'nursing_insurance' => 'nullable|date',
                'pension_number' => 'nullable|string|max:255',
                'pension_date' => 'nullable|date',
                'employment_insurance' => 'required|string|in:対象としない,被保険者',
                'employment_insurance_number' => 'nullable|string|max:255',
                'employment_insurance_date' => 'nullable|date',
                'accident_compensation' => 'required|string|in:対象としない,適用労働者',
                'oneway_comute_distance' => 'nullable|string|max:255',
                'paid_leave_start' => 'nullable|date',
                'paid_day_time' => 'nullable|string|max:255',
                'marital_status' => 'required|string|in:無,有',


            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $validatedData = $validator->validated();

            $user->userDetail()->updateOrCreate(
                ['user_id' => $user->id],
                $validatedData
            );

            return redirect()->route('admin.user-details.show-update', $user->id)
                ->with('success', 'User details updated successfully');
        }

        return view('admin.user-details.show-update', compact('user', 'corps', 'offices', 'roles'));
    }


    // public function bankShowAndUpdate($id)
    // {
    //     $user = User::with('userDetail')->findOrFail($id);
    //     $corps = Corp::all();
    //     $roles = Role::pluck('name', 'name')->all();
    //     $offices = Office::all();




    //     return view('admin.user-details.bank-show-update', compact('user', 'corps','roles','offices'));
    // }

    public function bankShowAndUpdate($id, Request $request)
    {
        $user = User::with('userBankDetail')->findOrFail($id);
        $corps = Corp::all();
        $roles = Role::pluck('name', 'name')->all();
        $offices = Office::all();

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [

                'salary_bank_order_1'=>'nullable|string|max:255',
                'salary_payment_method_1'=>'required|string|in:銀行振込',
                'salary_payment_type1'=>'required|string|in:全額,定額,残額',
                'salary_payment_amount1'=>'nullable|string|max:255',
                'salary_bank1'=>'nullable|string|max:255',
                'salary_bank_branch1'=>'nullable|string|max:255',
                'salary_account_type1'=>'required|string|in:普通',
                'salary_account_address1'=>'nullable|string|max:255',
                //2 salary
                'salary_bank_order_2'=>'nullable|string|max:255',
                'salary_payment_method_2'=>'nullable|string|in:銀行振込',
                'salary_payment_type2'=>'nullable|string|in:全額,定額,残額',
                'salary_payment_amount2'=>'nullable|string|max:255',
                'salary_bank2'=>'nullable|string|max:255',
                'salary_bank_branch2'=>'nullable|string|max:255',
                'salary_account_type2'=>'nullable|string|in:普通',
                'salary_account_address2'=>'nullable|string|max:255',


                //3 salary
                'salary_bank_order_3'=>'nullable|string|max:255',
                'salary_payment_method_3'=>'nullable|string|in:銀行振込',
                'salary_payment_type3'=>'nullable|string|in:全額,定額,残額',
                'salary_payment_amount3'=>'nullable|string|max:255',
                'salary_bank3'=>'nullable|string|max:255',
                'salary_bank_branch3'=>'nullable|string|max:255',
                'salary_account_type3'=>'nullable|string|in:普通',
                'salary_account_address3'=>'nullable|string|max:255',
                //1 bonus
                'bonus_bank_order_1'=>'nullable|string|max:255',
                'bonus_payment_method_1'=>'nullable|string|in:銀行振込',
                'bonus_payment_type1'=>'nullable|string|in:全額,定額,残額',
                'bonus_payment_amount1'=>'nullable|string|max:255',
                'bonus_bank1'=>'nullable|string|max:255',
                'bonus_bank_branch1'=>'nullable|string|max:255',
                'bonus_account_type1'=>'nullable|string|in:普通',
                'bonus_account_address1'=>'nullable|string|max:255',
                //2 bonus
                'bonus_bank_order_2'=>'nullable|string|max:255',
                'bonus_payment_method_2'=>'nullable|string|in:銀行振込',
                'bonus_payment_type2'=>'nullable|string|in:全額,定額,残額',
                'bonus_payment_amount2'=>'nullable|string|max:255',
                'bonus_bank2'=>'nullable|string|max:255',
                'bonus_bank_branch2'=>'nullable|string|max:255',
                'bonus_account_type2'=>'nullable|string|in:普通',
                'bonus_account_address2'=>'nullable|string|max:255',
                //3 bonus
                'bonus_bank_order_3'=>'nullable|string|max:255',
                'bonus_payment_method_3'=>'nullable|string|in:銀行振込',
                'bonus_payment_type3'=>'nullable|string|in:全額,定額,残額',
                'bonus_payment_amount3'=>'nullable|string|max:255',
                'bonus_bank3'=>'nullable|string|max:255',
                'bonus_bank_branch3'=>'nullable|string|max:255',
                'bonus_account_type3'=>'nullable|string|in:普通',
                'bonus_account_address3'=>'nullable|string|max:255',






            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $validatedData = $validator->validated();

            $user->userBankDetail()->updateOrCreate(
                ['user_id' => $user->id],
                $validatedData
            );

            // return redirect()->route('admin.user-details.bank-show-update', $user->id)
            //     ->with('success', 'User details updated successfully');
            return redirect()->back()->with('success', 'successful');
        }

        return view('admin.user-details.bank-show-update', compact('user', 'corps','roles','offices'));
    }





    public function index($id, Request $request)
    {
        $users = User::with('userFamily')->findOrFail($id);
        $corps = Corp::all();
        $roles = Role::pluck('name', 'name')->all();
        $offices = Office::all();


        return view('admin.user-details.family-index', compact('users', 'corps','roles','offices'));
    }

    public function create($id)
    {
        $user=User::findOrFail($id);
        return view('admin.user-details.family-create', compact('user'));
    }


    public function familyStore($id, Request $request)
{
    $user = User::findOrFail($id);

    if ($request->isMethod('post')) {
        $validator = Validator::make($request->all(), [
            'family_name' => 'nullable|string|max:255',
            'family_relationship' => 'nullable|string|max:255',
            'family_birthdate' => 'nullable|date',
            'family_dependent_status' => 'nullable|string|in:源泉控除対象配偶者,源泉控除対象配偶者以外の配偶者,対象(主たる給与の扶養)',
            'family_cohabiting_parent' => 'nullable|string|in:対象,対象外,障害者',
            'family_disability_status' => 'nullable|string|in:対象,対象外,同居特別障害者,障害者',
            'family_address_type' => 'nullable|string|in:社員と同一,別居',
            'family_address' => 'nullable|string|max:255',
            'family_estimated_income' => 'nullable|string|max:255',
            'family_insurance_status' => 'nullable|string|in:被扶養者,対象外',
            'family_name_furigana' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new UserFamily record
        $user->userFamily()->create($validator->validated());

        return redirect()->back()->with('success', 'Family member added successfully');
    }

    // If it's not a POST request, you might want to return a view
    return view('users.family', compact('user'));
}

public function edit($userId, $familyId)
{
    $user = User::findOrFail($userId);
    $familyMember = UserFamily::findOrFail($familyId);
    return view('admin.user-details.family-edit', compact('user', 'familyMember'));
}

public function update($userId, $familyId, Request $request)
{
    $user = User::findOrFail($userId);
    $familyMember = UserFamily::findOrFail($familyId);

    $validator = Validator::make($request->all(), [
        'family_name' => 'nullable|string|max:255',
        'family_relationship' => 'nullable|string|max:255',
        'family_birthdate' => 'nullable|date',
        'family_dependent_status' => 'nullable|string|in:源泉控除対象配偶者,源泉控除対象配偶者以外の配偶者,対象(主たる給与の扶養)',
        'family_cohabiting_parent' => 'nullable|string|in:対象,対象外,障害者',
        'family_disability_status' => 'nullable|string|in:対象,対象外,同居特別障害者,障害者',
        'family_address_type' => 'nullable|string|in:社員と同一,別居',
        'family_address' => 'nullable|string|max:255',
        'family_estimated_income' => 'nullable|string|max:255',
        'family_insurance_status' => 'nullable|string|in:被扶養者,対象外',
        'family_name_furigana' => 'nullable|string|max:255',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    $familyMember->update($validator->validated());

    return redirect()->route('admin.user-details.family-index', $userId)->with('success', '家族メンバーが正常に更新されました');
}





public function destroy($userId, $familyId)
{
    $familyMember = UserFamily::findOrFail($familyId);
    $familyMember->delete();

    return redirect()->route('admin.user-details.family-index', $userId)
        ->with('success', '家族メンバーが正常に削除されました');
}









}
