@extends('admin.dashboard')

@section('admin')


            <div class="max-w-6xl mx-auto p-8 bg-white shadow-lg rounded-xl mt-10">
                <h1 class="text-3xl font-bold text-center text-gray-700 mb-8">社員データ</h1>
                @if (session('success'))
                <div class="bg-green-400 alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-200 alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <form action="{{ route('admin.user-details.show-update', $user->id) }}" method="POST">
                    @csrf


                            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">





                                <div>
                                    <label for="employee_number" class="block text-sm font-medium text-gray-700 mb-1 py-2">社員番号</label>
                                    <div class="block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm bg-gray-100">
                                        {{ $user->employer_id }}
                                    </div>
                                </div>

                                <div>
                                    <label for="employee_name" class="block text-sm font-medium text-gray-700 mb-1 py-2">社員氏名</label>
                                    <div class="block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm bg-gray-100">
                                        {{ $user->name }}
                                    </div>
                                </div>

                                <div>
                                    <label for="employee_furigana" class="block text-sm font-medium text-gray-700 mb-1 py-2">氏名フリガナ</label>
                                    <div class="block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm bg-gray-100">
                                        {{ $user->furigana }}
                                    </div>
                                </div>

                                <div>
                                    <label for="previous_name" class="block text-sm font-medium text-gray-700 mb-1 py-2">旧姓</label>
                                    <input type="text" id="previous_name" name="previous_name" placeholder="漢字（該当者のみ）" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                                    value="{{ old('previous_name', $user->userDetail->previous_name ?? '') }}">
                                </div>



                                <div>
                                    <label for="gender" class="block text-sm font-medium text-gray-700 mb-1 py-2">性別</label>
                                    <div class="block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm bg-gray-100">
                                        {{ $user->gender }}
                                    </div>
                                </div>



                                <div>
                                    <label for="brith_date" class="block text-sm font-medium text-gray-700 mb-1 py-2">生年月日</label>
                                    <div class="block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm bg-gray-100">
                                        {{ $user->birthdate }}
                                    </div>
                                </div>

                                <div>
                                    <label for="post_number" class="block text-sm font-medium text-gray-700 mb-1 py-2">郵便番号</label>
                                    <div class="block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm bg-gray-100">
                                        {{ $user->post_number }}
                                    </div>
                                </div>

                                <div>
                                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1 py-2">住所</label>
                                    <div class="block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm bg-gray-100">
                                        {{ $user->address }}
                                    </div>
                                </div>

                                <div>
                                    <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1 py-2">電話番号</label>
                                    <input type="number" id="phone_number" name="phone_number" placeholder="0596-55-3098" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                                    value="{{ old('phone_number', $user->userDetail->phone_number ?? '') }}">
                                </div>

                                <div>
                                    <label for="mobile_number" class="block text-sm font-medium text-gray-700 mb-1 py-2">携帯電話</label>
                                    <input
                                     value="{{ old('mobile_number', $user->userDetail->mobile_number ?? '') }}"
                                    type="number" id="mobile_number" name="mobile_number" placeholder="090-2946-5123" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>

                                <div>
                                    <label for="email_address" class="block text-sm font-medium text-gray-700 mb-1 py-2">Ｅメール</label>
                                    <div class="block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm bg-gray-100">
                                        {{ $user->email }}
                                    </div>
                                </div>


                                <div>
                                    <label for="mobile_email" class="block text-sm font-medium text-gray-700 mb-1 py-2">携帯メール</label>
                                    <input
                                      value="{{ old('mobile_email', $user->userDetail->mobile_email ?? '') }}"
                                    type="email" id="mobile_email" name="mobile_email" placeholder="会社メールを入れる" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>

                                <div>
                                    <label for="driver_license" class="block text-sm font-medium text-gray-700 mb-1 py-2">運転免許の有無</label>
                                    <select name="driver_license" id="driver_license" required
                                    class="form-select block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out appearance-none">
                                        <option value="">選択</option>
                                        <option value="有" {{ (old('driver_license', $user->userDetail->driver_license ?? '') == '有') ? 'selected' : '' }}>有</option>
                                        <option value="無" {{ (old('driver_license', $user->userDetail->driver_license ?? '') == '無') ? 'selected' : '' }}>無</option>
                                    </select>
                                </div>
                                    <!--ene 2rt database hiihgui-->
                                <div>
                                    <label for="corp_name" class="block text-sm font-medium text-gray-700 mb-1 py-2">会社</label>
                                    <div class="block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm bg-gray-100">
                                        {{ $user->corp->corp_name }}
                                    </div>
                                </div>



                                <div>
                                    <label for="office_name" class="block text-sm font-medium text-gray-700 mb-1 py-2">所属</label>
                                    <div class="block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm bg-gray-100">
                                        {{ $user->office->office_name }}
                                    </div>
                                </div>
                                  <!--ene 2rt database hiihgui-->

                                <div>
                                    <label for="tax_table" class="block text-sm font-medium text-gray-700 mb-1 py-2">税額表</label>
                                    <select name="tax_table" id="tax_table" required class="form-select block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out appearance-none">
                                        <option value="">選択</option>
                                        <option value="月額表" {{ (old('tax_table', $user->userDetail->tax_table ?? '') == '月額表') ? 'selected' : '' }}>月額表</option>
                                        <option value="日額表" {{ (old('tax_table', $user->userDetail->tax_table ?? '') == '日額表') ? 'selected' : '' }}>日額表</option>

                                    </select>
                                </div>

                                <div>
                                    <label for="tax_type" class="block text-sm font-medium text-gray-700 mb-1 py-2">税表区分</label>
                                    <select name="tax_type" id="tax_type" required class="form-select block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out appearance-none">
                                        <option value="">選択</option>
                                        <option value="甲欄" {{ (old('tax_type', $user->userDetail->tax_type ?? '') == '甲欄') ? 'selected' : '' }}>甲欄</option>
                                        <option value="乙欄" {{ (old('tax_type', $user->userDetail->tax_type ?? '') == '乙欄') ? 'selected' : '' }}>乙欄</option>
                                        <option value="課税なし" {{ (old('tax_type', $user->userDetail->tax_type ?? '') == '月課税なし額表') ? 'selected' : '' }}>課税なし</option>

                                    </select>
                                </div>

                                <div>
                                    <label for="pay_system" class="block text-sm font-medium text-gray-700 mb-1 py-2">給与体系</label>
                                    <input
                                     value="{{ old('pay_system', $user->userDetail->pay_system ?? '') }}"
                                    type="text" id="pay_system" name="pay_system" placeholder="100:月給(役員)" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>


                                <div>
                                    <label for="bonus_system" class="block text-sm font-medium text-gray-700 mb-1 py-2">賞与体系</label>
                                    <input
                                    value="{{ old('bonus_system', $user->userDetail->bonus_system ?? '') }}"

                                    type="text" id="bonus_system" name="bonus_system" placeholder="100:役員報酬" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>

                                <div>
                                    <label for="employee_type" class="block text-sm font-medium text-gray-700 mb-1 py-2">役社員区分</label>
                                    <input
                                    value="{{ old('employee_type', $user->userDetail->employee_type ?? '') }}"

                                    type="text" id="employee_type" name="employee_type" placeholder="役員" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>

                                <div>
                                    <label for="work_type" class="block text-sm font-medium text-gray-700 mb-1 py-2">常勤・非常勤の別</label>
                                    <select name="work_type" id="work_type" required class="form-select block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out appearance-none">
                                        <option value="">選択</option>
                                        <option value="常勤" {{ (old('work_type', $user->userDetail->work_type ?? '') == '常勤') ? 'selected' : '' }}>常勤</option>
                                        <option value="非常勤" {{ (old('work_type', $user->userDetail->work_type ?? '') == '非常勤') ? 'selected' : '' }}>非常勤</option>


                                    </select>
                                </div>
                                <div>
                                    <label for="job_title" class="block text-sm font-medium text-gray-700 mb-1 py-2">役職名</label>
                                    <input
                                      value="{{ old('job_title', $user->userDetail->job_title ?? '') }}"
                                    type="text" id="job_title" name="job_title" placeholder="" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>

                                <div>
                                    <label for="employed_date" class="block text-sm font-medium text-gray-700 mb-1 py-2">入社日</label>
                                    <input
                                    value="{{ old('employed_date', $user->userDetail->employed_date ?? '') }}"

                                    type="date" id="employed_date" name="employed_date" placeholder="" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>

                                <div>
                                    <label for="disability_type" class="block text-sm font-medium text-gray-700 mb-1 py-2">本人：障害者区分</label>
                                    <select name="disability_type" id="disability_type" required class="form-select block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out appearance-none">
                                        <option value="">選択</option>
                                        <option value="対象外" {{ (old('disability_type', $user->userDetail->disability_type ?? '') == '対象外') ? 'selected' : '' }}>対象外</option>
                                        <option value="対象" {{ (old('disability_type', $user->userDetail->disability_type ?? '') == '対象') ? 'selected' : '' }}>対象</option>


                                    </select>
                                </div>

                                <div>
                                    <label for="working_student" class="block text-sm font-medium text-gray-700 mb-1 py-2">本人：勤労学生区分</label>
                                    <select name="working_student" id="working_student" required class="form-select block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out appearance-none">
                                        <option value="">選択</option>
                                        <option value="対象外" {{ (old('working_student', $user->userDetail->working_student ?? '') == '対象外') ? 'selected' : '' }}>対象外</option>
                                        <option value="対象" {{ (old('working_student', $user->userDetail->working_student ?? '') == '対象') ? 'selected' : '' }}>対象</option>



                                    </select>
                                </div>

                                <div>
                                    <label for="disaster_victim" class="block text-sm font-medium text-gray-700 mb-1 py-2">本人：災害者</label>
                                    <select name="disaster_victim" id="disaster_victim" required class="form-select block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out appearance-none">
                                        <option value="">選択</option>
                                        <option value="対象外" {{ (old('disaster_victim', $user->userDetail->disaster_victim ?? '') == '対象外') ? 'selected' : '' }}>対象外</option>
                                        <option value="対象" {{ (old('disaster_victim', $user->userDetail->disaster_victim ?? '') == '対象') ? 'selected' : '' }}>対象</option>


                                    </select>
                                </div>

                                <div>
                                    <label for="foreigner" class="block text-sm font-medium text-gray-700 mb-1 py-2">本人：外国人</label>
                                    <select name="foreigner" id="foreigner" required class="form-select block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out appearance-none">
                                        <option value="">選択</option>
                                        <option value="対象外" {{ (old('foreigner', $user->userDetail->foreigner ?? '') == '対象外') ? 'selected' : '' }}>対象外</option>
                                        <option value="対象" {{ (old('foreigner', $user->userDetail->foreigner ?? '') == '対象') ? 'selected' : '' }}>対象</option>


                                    </select>
                                </div>

                                <div>
                                    <label for="spouse_deduction" class="block text-sm font-medium text-gray-700 mb-1 py-2">配偶者控除区分</label>
                                    <select name="spouse_deduction" id="spouse_deduction" required class="form-select block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out appearance-none">
                                        <option value="">選択</option>
                                        <option value="配偶者なし" {{ (old('spouse_deduction', $user->userDetail->spouse_deduction ?? '') == '配偶者なし') ? 'selected' : '' }}>配偶者なし</option>
                                        <option value="源泉控除対象配偶者" {{ (old('spouse_deduction', $user->userDetail->spouse_deduction ?? '') == '源泉控除対象配偶者') ? 'selected' : '' }}>源泉控除対象配偶者</option>
                                        <option value="源泉控除対象配偶者以外の配偶者" {{ (old('spouse_deduction', $user->userDetail->spouse_deduction ?? '') == '源泉控除対象配偶者以外の配偶者') ? 'selected' : '' }}>源泉控除対象配偶者以外の配偶者</option>


                                    </select>
                                </div>

                                <div>
                                    <label for="household_name" class="block text-sm font-medium text-gray-700 mb-1 py-2">世帯主：氏名</label>
                                    <input
                                        value="{{ old('household_name', $user->userDetail->household_name ?? '') }}"
                                    type="text" id="household_name" name="household_name" placeholder="名前を入力してください" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>
                                <div>
                                    <label for="household_relation" class="block text-sm font-medium text-gray-700 mb-1 py-2">世帯主：続柄</label>
                                    <input
                                    value="{{ old('household_relation', $user->userDetail->household_relation ?? '') }}"

                                    type="text" id="household_relation" name="household_relation" placeholder="本人，配偶者，父" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>
                                <div>
                                    <label for="disability_detail" class="block text-sm font-medium text-gray-700 mb-1 py-2">障害等の内容</label>
                                    <input
                                    value="{{ old('disability_detail', $user->userDetail->disability_detail ?? '') }}"

                                    type="text" id="disability_detail" name="disability_detail" placeholder="" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>

                                <div>
                                    <label for="salary" class="block text-sm font-medium text-gray-700 mb-1 py-2">報酬月額</label>
                                    <input
                                    value="{{ old('salary', $user->userDetail->salary ?? '') }}"

                                    type="number" id="salary" name="salary" placeholder="" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>

                                <div>
                                    <label for="insurance_number" class="block text-sm font-medium text-gray-700 mb-1 py-2">被保険者整理番号</label>
                                    <input
                                    value="{{ old('insurance_number', $user->userDetail->insurance_number ?? '') }}"

                                    type="text" id="insurance_number" name="insurance_number" placeholder="被保険者整理番号" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>

                                <div>
                                    <label for="health_insurance" class="block text-sm font-medium text-gray-700 mb-1 py-2">健保：資格取得日</label>
                                    <input
                                    value="{{ old('health_insurance', $user->userDetail->health_insurance ?? '') }}"

                                    type="date" id="health_insurance" name="health_insurance" placeholder="被保険者整理番号" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>

                                <div>
                                    <label for="nursing_insurance" class="block text-sm font-medium text-gray-700 mb-1 py-2">介護：資格取得日</label>
                                    <input
                                    value="{{ old('nursing_insurance', $user->userDetail->nursing_insurance ?? '') }}"

                                    type="date" id="nursing_insurance" name="nursing_insurance" placeholder="被保険者整理番号" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>


                                <div>
                                    <label for="pension_number" class="block text-sm font-medium text-gray-700 mb-1 py-2">基礎年金番号</label>
                                    <input
                                    value="{{ old('pension_number', $user->userDetail->pension_number ?? '') }}"

                                    type="number" id="pension_number" name="pension_number" placeholder="基礎年金番号:50000000" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>

                                <div>
                                    <label for="pension_date" class="block text-sm font-medium text-gray-700 mb-1 py-2">厚生年金：資格取得日</label>
                                    <input
                                    value="{{ old('pension_date', $user->userDetail->pension_date ?? '') }}"

                                    type="date" id="pension_date" name="pension_date" placeholder="" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>


                                <div>
                                    <label for="employment_insurance" class="block text-sm font-medium text-gray-700 mb-1 py-2">雇用：被保険者</label>
                                    <select name="employment_insurance" id="employment_insurance" required class="form-select block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out appearance-none">
                                        <option value="">選択</option>
                                        <option value="対象としない" {{ (old('employment_insurance', $user->userDetail->employment_insurance ?? '') == '対象としない') ? 'selected' : '' }}>対象としない</option>
                                        <option value="被保険者" {{ (old('employment_insurance', $user->userDetail->employment_insurance ?? '') == '被保険者') ? 'selected' : '' }}>被保険者</option>


                                    </select>
                                </div>



                                <div>
                                    <label for="employment_insurance_number" class="block text-sm font-medium text-gray-700 mb-1 py-2">雇用：被保険者番号</label>
                                    <input
                                      value="{{ old('employment_insurance_number', $user->userDetail->employment_insurance_number ?? '') }}"
                                    type="number" id="employment_insurance_number" name="employment_insurance_number" placeholder="5030-0000-0" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>
                                <div>
                                    <label for="employment_insurance_date" class="block text-sm font-medium text-gray-700 mb-1 py-2">雇用：資格取得日</label>
                                    <input
                                    value="{{ old('employment_insurance_date', $user->userDetail->employment_insurance_date ?? '') }}"

                                    type="date" id="employment_insurance_date" name="employment_insurance_date" placeholder="5030-376198-0" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>
                                <div>
                                    <label for="accident_compensation" class="block text-sm font-medium text-gray-700 mb-1 py-2">労災：被保険者</label>
                                    <select name="accident_compensation" id="accident_compensation" required class="form-select block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out appearance-none">
                                        <option value="">選択</option>
                                        <option value="対象としない" {{ (old('accident_compensation', $user->userDetail->accident_compensation ?? '') == '対象としない') ? 'selected' : '' }}>対象としない</option>
                                        <option value="適用労働者" {{ (old('accident_compensation', $user->userDetail->accident_compensation ?? '') == '適用労働者') ? 'selected' : '' }}>適用労働者</option>


                                    </select>
                                </div>

                                <div>
                                    <label for="oneway_comute_distance" class="block text-sm font-medium text-gray-700 mb-1 py-2">片道通勤距離</label>
                                    <input
                                    value="{{ old('oneway_comute_distance', $user->userDetail->oneway_comute_distance ?? '') }}"

                                    type="text" id="oneway_comute_distance" name="oneway_comute_distance" placeholder="42" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>

                                <div>
                                    <label for="paid_leave_start" class="block text-sm font-medium text-gray-700 mb-1 py-2">有休付与起算日</label>
                                    <input
                                    value="{{ old('paid_leave_start', $user->userDetail->paid_leave_start ?? '') }}"

                                    type="date" id="paid_leave_start" name="paid_leave_start" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>
                                <div>
                                    <label for="paid_day_time" class="block text-sm font-medium text-gray-700 mb-1 py-2">有休１日の時間数</label>
                                    <input
                                    value="{{ old('paid_day_time', $user->userDetail->paid_day_time ?? '') }}"

                                    type="number" id="paid_day_time" name="paid_day_time" placeholder="8" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                </div>

                                <div>
                                    <label for="marital_status" class="block text-sm font-medium text-gray-700 mb-1 py-2">配偶者の有無</label>
                                    <select name="marital_status" id="marital_status" required class="form-select block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out appearance-none">
                                        <option value="">選択</option>
                                        <option value="無" {{ (old('marital_status', $user->userDetail->marital_status ?? '') == '無') ? 'selected' : '' }}>無</option>
                                        <option value="有" {{ (old('marital_status', $user->userDetail->marital_status ?? '') == '有') ? 'selected' : '' }}>有</option>


                                    </select>
                                </div>

                            </div>
                            <x-button purpose="search" type="submit" class="mt-3">
                                保存
                            </x-button>
                </form>
            </div>















@endsection

