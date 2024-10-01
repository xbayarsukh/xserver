<x-app-layout>
    <h1>Form Type 3G</h1>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
            <h1 class="text-3xl font-bold text-center mb-6">扶養家族変更届</h1>

            <div class="grid grid-cols-3 gap-4 mb-6 bg-blue-100 p-4 rounded">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">営業所</label>
                    <input type="text" value="{{ $form->department }}" readonly
                        class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">所属</label>
                    <input type="text" value="{{ $form->office }}" readonly
                        class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">氏名</label>
                    <input type="text" value="{{ $form->name }}" readonly
                        class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>



            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="apply_date" class="block text font-medium text-gray-700 mb-1">申出日</label>
                    <input type="date" id="apply_date" name="apply_date" class="form-input w-full" value="{{ $form->apply_date }}" readonly>
                </div>

                <div class="flex-1">
                    <label for="edit_date" class="block text font-medium text-gray-700 mb-1">変更日</label>
                    <input type="date" id="edit_date" name="edit_date" class="form-input w-full" value="{{ $form->edit_date }}" readonly>
                </div>
            </div>



            <div class="px-2 py-2 bg-gray-100 p-4 rounded-lg mb-6">

                <select name="select_1" id="select_1" class="form-select w-full rounded-md shadow-sm" disabled>
                    <option value="" disabled selected>選択</option>
                    @foreach (['編入','除外'] as $option)
                    <option value="{{ $option }}" {{ $form->select_1 ===$option ? 'selected' : '' }}>{{ $option }}</option>

                    @endforeach

                </select>
                <div class="px-2 py-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <label for="family_name_furigana_1" class="block text-sm font-medium text-gray-700 mb-1">家族氏名フリガナ</label>
                        <input type="text" id="family_name_furigana_1" name="family_name_furigana_1" class="form-input w-full rounded-md shadow-sm" value="{{ $form->family_name_furigana_1 }}" readonly>
                    </div>
                    <div>
                        <label for="family_name_1" class="block text-sm font-medium text-gray-700 mb-1">家族氏名</label>
                        <input type="text" id="family_name_1" name="family_name_1" class="form-input w-full rounded-md shadow-sm" value="{{ $form->family_name_1 }}" readonly>
                    </div>
                    <div>
                        <label for="gender_1" class="block text-sm font-medium text-gray-700 mb-1">性別</label>
                        <select name="gender_1" id="gender_1" class="form-select w-full rounded-md shadow-sm" disabled>
                            <option value="" disabled selected>選択</option>
                            @foreach (['男','女'] as $option )
                            <option value="{{ $option }}" {{ $form->gender_1 === $option ? 'selected' : '' }}>{{ $option }}</option>

                            @endforeach

                        </select>
                    </div>

                    <div>
                        <label for="relationship_1" class="block text-sm font-medium text-gray-700 mb-1">続柄</label>
                        <input type="text" id="relationship_1" name="relationship_1" class="form-input w-full rounded-md shadow-sm" value="{{ $form->relationship_1 }}" readonly>
                    </div>
                    <div>
                        <label for="birth_1" class="block text-sm font-medium text-gray-700 mb-1">生年月日</label>
                        <input type="date" id="birth_1" name="birth_1" class="form-input w-full rounded-md shadow-sm" value="{{ $form->birth_1 }}" readonly>
                    </div>


                    <div>
                        <label for="occupation_1" class="block text-sm font-medium text-gray-700 mb-1">職業</label>
                        <select name="occupation_1" id="occupation_1" class="form-select w-full rounded-md shadow-sm" disabled>
                            <option value="" disabled selected>選択</option>
                            @foreach(['無職'] as $option)
                            <option value="{{ $option }}" {{ $form->occupation_1 ===$option ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div>
                        <label for="income_1" class="block text-sm font-medium text-gray-700 mb-1">収入</label>
                        <div class="relative">
                            <input type="text" id="income_1" name="income_1" class="form-input w-full rounded-md shadow-sm pr-12" value="{{ $form->income_1 }}" readonly>
                            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">万円</span>
                        </div>
                    </div>


                    <div>
                        <label for="live_1" class="block text-sm font-medium text-gray-700 mb-1">住まい</label>
                        <select name="live_1" id="live_1" class="form-select w-full rounded-md shadow-sm" disabled>
                            <option value="" disabled selected>選択</option>
                            @foreach(['同居','別居'] as $option)
                            <option value="{{ $option }}" {{ $form->live_1 ===$option ? 'selected' : ''}}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="px-2 py-2 mt-4">
                        <label for="reason_1" class="block text-sm font-medium text-gray-700 mb-1">理由</label>
                        <input type="text" id="reason_1" name="reason_1" class="form-input w-full rounded-md shadow-sm" value="{{ $form->reason_1 }}" readonly>
                    </div>

            </div>
            <!--2nd loop-->
            <div class="px-2 py-2 bg-gray-100 p-4 rounded-lg mb-6">

                <select name="select_2" id="select_2" class="form-select w-full rounded-md shadow-sm" disabled>
                    <option value="" disabled selected>選択</option>
                    @foreach (['編入','除外'] as $option)
                    <option value="{{ $option }}" {{ $form->select_2 ===$option ? 'selected' : '' }}>{{ $option }}</option>

                    @endforeach

                </select>
                <div class="px-2 py-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <label for="family_name_furigana_2" class="block text-sm font-medium text-gray-700 mb-1">家族氏名フリガナ</label>
                        <input type="text" id="family_name_furigana_2" name="family_name_furigana_2" class="form-input w-full rounded-md shadow-sm" value="{{ $form->family_name_furigana_2 }}" readonly>
                    </div>
                    <div>
                        <label for="family_name_2" class="block text-sm font-medium text-gray-700 mb-1">家族氏名</label>
                        <input type="text" id="family_name_2" name="family_name_2" class="form-input w-full rounded-md shadow-sm" value="{{ $form->family_name_2 }}" readonly>
                    </div>
                    <div>
                        <label for="gender_2" class="block text-sm font-medium text-gray-700 mb-1">性別</label>
                        <select name="gender_2" id="gender_2" class="form-select w-full rounded-md shadow-sm" disabled>
                            <option value="" disabled selected>選択</option>
                            @foreach (['男','女'] as $option )
                            <option value="{{ $option }}" {{ $form->gender_2 === $option ? 'selected' : '' }}>{{ $option }}</option>

                            @endforeach

                        </select>
                    </div>

                    <div>
                        <label for="relationship_2" class="block text-sm font-medium text-gray-700 mb-1">続柄</label>
                        <input type="text" id="relationship_2" name="relationship_2" class="form-input w-full rounded-md shadow-sm" value="{{ $form->relationship_2 }}" readonly>
                    </div>
                    <div>
                        <label for="birth_2" class="block text-sm font-medium text-gray-700 mb-1">生年月日</label>
                        <input type="date" id="birth_2" name="birth_2" class="form-input w-full rounded-md shadow-sm" value="{{ $form->birth_2 }}" readonly>
                    </div>


                    <div>
                        <label for="occupation_2" class="block text-sm font-medium text-gray-700 mb-1">職業</label>
                        <select name="occupation_2" id="occupation_2" class="form-select w-full rounded-md shadow-sm" disabled>
                            <option value="" disabled selected>選択</option>
                            @foreach(['無職'] as $option)
                            <option value="{{ $option }}" {{ $form->occupation_2 ===$option ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div>
                        <label for="income_2" class="block text-sm font-medium text-gray-700 mb-1">収入</label>
                        <div class="relative">
                            <input type="text" id="income_2" name="income_2" class="form-input w-full rounded-md shadow-sm pr-12" value="{{ $form->income_2 }}" readonly>
                            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">万円</span>
                        </div>
                    </div>


                    <div>
                        <label for="live_2" class="block text-sm font-medium text-gray-700 mb-1">住まい</label>
                        <select name="live_2" id="live_2" class="form-select w-full rounded-md shadow-sm" disabled>
                            <option value="" disabled selected>選択</option>
                            @foreach(['同居','別居'] as $option)
                            <option value="{{ $option }}" {{ $form->live_2 ===$option ? 'selected' : ''}}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="px-2 py-2 mt-4">
                        <label for="reason_2" class="block text-sm font-medium text-gray-700 mb-1">理由</label>
                        <input type="text" id="reason_2" name="reason_2" class="form-input w-full rounded-md shadow-sm" value="{{ $form->reason_2 }}" readonly>
                    </div>

            </div>

            <!--loop3-->
            <div class="px-2 py-2 bg-gray-100 p-4 rounded-lg mb-6">

                <select name="select_3" id="select_3" class="form-select w-full rounded-md shadow-sm" disabled>
                    <option value="" disabled selected>選択</option>
                    @foreach (['編入','除外'] as $option)
                    <option value="{{ $option }}" {{ $form->select_3 ===$option ? 'selected' : '' }}>{{ $option }}</option>

                    @endforeach

                </select>
                <div class="px-2 py-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <label for="family_name_furigana_3" class="block text-sm font-medium text-gray-700 mb-1">家族氏名フリガナ</label>
                        <input type="text" id="family_name_furigana_3" name="family_name_furigana_3" class="form-input w-full rounded-md shadow-sm" value="{{ $form->family_name_furigana_3 }}" readonly>
                    </div>
                    <div>
                        <label for="family_name_3" class="block text-sm font-medium text-gray-700 mb-1">家族氏名</label>
                        <input type="text" id="family_name_3" name="family_name_3" class="form-input w-full rounded-md shadow-sm" value="{{ $form->family_name_3 }}" readonly>
                    </div>
                    <div>
                        <label for="gender_3" class="block text-sm font-medium text-gray-700 mb-1">性別</label>
                        <select name="gender_3" id="gender_3" class="form-select w-full rounded-md shadow-sm" disabled>
                            <option value="" disabled selected>選択</option>
                            @foreach (['男','女'] as $option )
                            <option value="{{ $option }}" {{ $form->gender_3 === $option ? 'selected' : '' }}>{{ $option }}</option>

                            @endforeach

                        </select>
                    </div>

                    <div>
                        <label for="relationship_3" class="block text-sm font-medium text-gray-700 mb-1">続柄</label>
                        <input type="text" id="relationship_3" name="relationship_3" class="form-input w-full rounded-md shadow-sm" value="{{ $form->relationship_3 }}" readonly>
                    </div>
                    <div>
                        <label for="birth_3" class="block text-sm font-medium text-gray-700 mb-1">生年月日</label>
                        <input type="date" id="birth_3" name="birth_3" class="form-input w-full rounded-md shadow-sm" value="{{ $form->birth_3 }}" readonly>
                    </div>


                    <div>
                        <label for="occupation_3" class="block text-sm font-medium text-gray-700 mb-1">職業</label>
                        <select name="occupation_3" id="occupation_1" class="form-select w-full rounded-md shadow-sm" disabled>
                            <option value="" disabled selected>選択</option>
                            @foreach(['無職'] as $option)
                            <option value="{{ $option }}" {{ $form->occupation_3 ===$option ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div>
                        <label for="income_3" class="block text-sm font-medium text-gray-700 mb-1">収入</label>
                        <div class="relative">
                            <input type="text" id="income_3" name="income_3" class="form-input w-full rounded-md shadow-sm pr-12" value="{{ $form->income_3 }}" readonly>
                            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">万円</span>
                        </div>
                    </div>


                    <div>
                        <label for="live_3" class="block text-sm font-medium text-gray-700 mb-1">住まい</label>
                        <select name="live_3" id="live_3" class="form-select w-full rounded-md shadow-sm" disabled>
                            <option value="" disabled selected>選択</option>
                            @foreach(['同居','別居'] as $option)
                            <option value="{{ $option }}" {{ $form->live_3 ===$option ? 'selected' : ''}}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="px-2 py-2 mt-4">
                        <label for="reason_3" class="block text-sm font-medium text-gray-700 mb-1">理由</label>
                        <input type="text" id="reason_3" name="reason_3" class="form-input w-full rounded-md shadow-sm" value="{{ $form->reason_3 }}" readonly>
                    </div>

            </div>


            <div class="flex space-x-4">


                <select name="boss_id" id="boss_id" class="block w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" {{ isset($application) && $application->boss_id ? 'disabled' : 'required' }}>
                    <option value="">Select a boss</option>
                    @foreach($bosses as $boss)
                        <option value="{{ $boss->id }}" {{ (isset($application) && $application->boss_id==$boss->id) ? 'selected' : ''}}>
                            {{ $boss->name }}
                        </option>
                    @endforeach
                </select>
            </div>












        </div>
    </div>



    </form>

</x-app-layout>
