<x-app-layout>
    <h1>Form Type 3B</h1>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold text-center mb-6">出生届</h1>
            <!-- User Information -->

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

            <!-- Request Date -->
            <div class="mb-6">
                <label for="request_date" class="block text-sm font-medium text-gray-700 mb-1">申請書日付</label>
                <input type="date" id="request_date" name="request_date" class="form-input w-full rounded-md shadow-sm" value="{{ $form->request_date }}" readonly>
            </div>

            <!-- Child Information (Repeat for each child) -->

                <div class="bg-gray-100 p-4 rounded-lg mb-6">
                    <h2 class="text-lg font-semibold mb-4">子供 </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label for="name_furigana_1" class="block text-sm font-medium text-gray-700 mb-1">フリガナ</label>
                            <input type="text" id="name_furigana_1" name="name_furigana_1" class="form-input w-full rounded-md shadow-sm" value="{{ $form->name_furigana_1 }}" readonly>
                        </div>
                        <div>
                            <label for="child_name_1" class="block text-sm font-medium text-gray-700 mb-1">出生児名</label>
                            <input type="text" id="child_name_1" name="child_name_1" class="form-input w-full rounded-md shadow-sm" value="{{ $form->child_name_1 }}" readonly>
                        </div>
                        <div>
                            <label for="gender_1" class="block text-sm font-medium text-gray-700 mb-1">性別</label>
                            <select name="gender_1" id="gender_1" class="form-select w-full rounded-md shadow-sm" disabled>
                                <option value="" disabled selected>選択</option>
                                @foreach(['男', '女'] as $option)
                                    <option value="{{ $option }}" {{ $form->gender_1 === $option ? 'selected' : '' }}>{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="relation_1" class="block text-sm font-medium text-gray-700 mb-1">続柄</label>
                            <select name="relation_1" id="relation_1" class="form-select w-full rounded-md shadow-sm" disabled>
                                <option value="" disabled selected>選択</option>
                                @foreach (['長男','次男','三男','四男','長女','次女','三女','四女'] as $option)
                                <option value="{{ $option }}" {{ $form->relation_1 === $option ? 'selected' : ''}}>{{ $option }}</option>

                                @endforeach

                            </select>
                        </div>


                        <div>
                            <label for="child_order_1" class="block text-sm font-medium text-gray-700 mb-1">第</label>
                            <select name="child_order_1" id="child_order_1" class="form-select w-full rounded-md shadow-sm" disabled>
                                <option value="" disabled selected>選択</option>
                                @foreach(['第１子','第２子','第３子','第４子','第５子'] as $option)
                                <option value="{{ $option }}" {{ $form->child_order_1 === $option ? 'selected' : '' }}>{{ $option }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div>
                            <label for="birthdate_1" class="block text-sm font-medium text-gray-700 mb-1">生年月日</label>
                            <input type="date" id="birthdate_1" name="birthdate_1" class="form-input w-full rounded-md shadow-sm" value="{{ $form->birthdate_1 }}" readonly>
                        </div>
                        <div>
                            <label for="dependency_1" class="block text-sm font-medium text-gray-700 mb-1">扶養義務</label>
                            <select name="dependency_1" id="dependency_1" class="form-select w-full rounded-md shadow-sm" disabled>
                                <option value="" disabled selected>選択</option>
                                @foreach (['なし','有り'] as $option)
                                <option value="{{ $option}}" {{ $form->dependency_1 === $option ? 'selected' : ''}}>{{ $option }}</option>

                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>
            <!-- Child Information (Repeat for each 2child) -->



            <div class="bg-gray-100 p-4 rounded-lg mb-6">
                <h2 class="text-lg font-semibold mb-4">子供 </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <label for="name_furigana_2" class="block text-sm font-medium text-gray-700 mb-1">フリガナ</label>
                        <input type="text" id="name_furigana_2" name="name_furigana_2" class="form-input w-full rounded-md shadow-sm" value="{{ $form->name_furigana_2 }}" readonly>
                    </div>
                    <div>
                        <label for="child_name_2" class="block text-sm font-medium text-gray-700 mb-1">出生児名</label>
                        <input type="text" id="child_name_2" name="child_name_2" class="form-input w-full rounded-md shadow-sm" value="{{ $form->child_name_2 }}" readonly>
                    </div>
                    <div>
                        <label for="gender_2" class="block text-sm font-medium text-gray-700 mb-1">性別</label>
                        <select name="gender_2" id="gender_2" class="form-select w-full rounded-md shadow-sm" disabled>
                            <option value="" disabled selected>選択</option>
                            @foreach(['男', '女'] as $option)
                                <option value="{{ $option }}" {{ $form->gender_2 === $option ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="relation_2" class="block text-sm font-medium text-gray-700 mb-1">続柄</label>
                        <select name="relation_2" id="relation_2" class="form-select w-full rounded-md shadow-sm" disabled>
                            <option value="" disabled selected>選択</option>
                            @foreach (['長男','次男','三男','四男','長女','次女','三女','四女'] as $option)
                            <option value="{{ $option }}" {{ $form->relation_2 === $option ? 'selected' : ''}}>{{ $option }}</option>

                            @endforeach

                        </select>
                    </div>


                    <div>
                        <label for="child_order_2" class="block text-sm font-medium text-gray-700 mb-1">第</label>
                        <select name="child_order_2" id="child_order_2" class="form-select w-full rounded-md shadow-sm" disabled>
                            <option value="" disabled selected>選択</option>
                            @foreach(['第１子','第２子','第３子','第４子','第５子'] as $option)
                            <option value="{{ $option }}" {{ $form->child_order_2 === $option ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div>
                        <label for="birthdate_2" class="block text-sm font-medium text-gray-700 mb-1">生年月日</label>
                        <input type="date" id="birthdate_2" name="birthdate_2" class="form-input w-full rounded-md shadow-sm" value="{{ $form->birthdate_2 }}" readonly>
                    </div>
                    <div>
                        <label for="dependency_2" class="block text-sm font-medium text-gray-700 mb-1">扶養義務</label>
                        <select name="dependency_2" id="dependency_2" class="form-select w-full rounded-md shadow-sm" disabled>
                            <option value="" disabled selected>選択</option>
                            @foreach (['なし','有り'] as $option)
                            <option value="{{ $option}}" {{ $form->dependency_2 === $option ? 'selected' : ''}}>{{ $option }}</option>

                            @endforeach

                        </select>
                    </div>
                </div>
            </div>
            <!-- Child Information (Repeat for each child) -->

            <div class="bg-gray-100 p-4 rounded-lg mb-6">
                <h2 class="text-lg font-semibold mb-4">子供 </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <label for="name_furigana_3" class="block text-sm font-medium text-gray-700 mb-1">フリガナ</label>
                        <input type="text" id="name_furigana_3" name="name_furigana_3" class="form-input w-full rounded-md shadow-sm" value="{{ $form->name_furigana_3 }}" readonly>
                    </div>
                    <div>
                        <label for="child_name_3" class="block text-sm font-medium text-gray-700 mb-1">出生児名</label>
                        <input type="text" id="child_name_3" name="child_name_3" class="form-input w-full rounded-md shadow-sm" value="{{ $form->child_name_3 }}" readonly>
                    </div>
                    <div>
                        <label for="gender_3" class="block text-sm font-medium text-gray-700 mb-1">性別</label>
                        <select name="gender_3" id="gender_3" class="form-select w-full rounded-md shadow-sm" disabled>
                            <option value="" disabled selected>選択</option>
                            @foreach(['男', '女'] as $option)
                                <option value="{{ $option }}" {{ $form->gender_3 === $option ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="relation_3" class="block text-sm font-medium text-gray-700 mb-1">続柄</label>
                        <select name="relation_3" id="relation_3" class="form-select w-full rounded-md shadow-sm" disabled>
                            <option value="" disabled selected>選択</option>
                            @foreach (['長男','次男','三男','四男','長女','次女','三女','四女'] as $option)
                            <option value="{{ $option }}" {{ $form->relation_3 === $option ? 'selected' : ''}}>{{ $option }}</option>

                            @endforeach

                        </select>
                    </div>


                    <div>
                        <label for="child_order_3" class="block text-sm font-medium text-gray-700 mb-1">第</label>
                        <select name="child_order_3" id="child_order_3" class="form-select w-full rounded-md shadow-sm" disabled>
                            <option value="" disabled selected>選択</option>
                            @foreach(['第１子','第２子','第３子','第４子','第５子'] as $option)
                            <option value="{{ $option }}" {{ $form->child_order_3 === $option ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div>
                        <label for="birthdate_3" class="block text-sm font-medium text-gray-700 mb-1">生年月日</label>
                        <input type="date" id="birthdate_3" name="birthdate_3" class="form-input w-full rounded-md shadow-sm" value="{{ $form->birthdate_3 }}" readonly>
                    </div>
                    <div>
                        <label for="dependency_3" class="block text-sm font-medium text-gray-700 mb-1">扶養義務</label>
                        <select name="dependency_3" id="dependency_3" class="form-select w-full rounded-md shadow-sm" disabled>
                            <option value="" disabled selected>選択</option>
                            @foreach (['なし','有り'] as $option)
                            <option value="{{ $option}}" {{ $form->dependency_3 === $option ? 'selected' : ''}}>{{ $option }}</option>

                            @endforeach

                        </select>
                    </div>
                </div>
            </div>

            <!-- Childcare Leave -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">育児休業</label>
                <div class="flex space-x-4">
                    <label class="flex items-center">
                        <input type="radio" name="childcare_leave" value="1" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300"{{ $form->childcare_leave =='1' ? 'checked' : '' }} disabled>
                        <span class="ml-2 text-sm text-gray-700">取得する</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="childcare_leave" value="0" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300" {{ $form->childcare_leave =='2' ? 'checked' : '' }} disabled>
                        <span class="ml-2 text-sm text-gray-700">取得しない</span>
                    </label>
                </div>
            </div>

            <!-- Childcare Leave Period -->
            <div class="mb-6">
                <label for="childcare_leave_start_date" class="block text-sm font-medium text-gray-700 mb-1">取得期間</label>
                <input type="date" id="childcare_leave_start_date" name="childcare_leave_start_date" class="form-input w-full rounded-md shadow-sm" value="{{ $form->childcare_leave_start_date }}" readonly>
            </div>
            <div class="mb-6">
                <label for="childcare_leave_start_date_to" class="block text-sm font-medium text-gray-700 mb-1">取得期間</label>
                <input type="date" id="childcare_leave_start_date_to" name="childcare_leave_start_date_to" class="form-input w-full rounded-md shadow-sm" value="{{ $form->childcare_leave_start_date_to }}" readonly>
            </div>

            <!-- Boss Selection -->
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

            <!-- Submit Button -->

        </form>
    </div>


</x-app-layout>
