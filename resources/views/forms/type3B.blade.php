<x-app-layout>
    <h1>Form Type 3B</h1>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold text-center mb-6">出生届</h1>

        <form action="{{ route('forms.store', '3B') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <!-- Error messages -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- User Information -->
            <div class="bg-blue-100 p-4 rounded-lg mb-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">営業所</label>
                        <input type="text" id="department" name="department" value="{{ Auth::user()->office->office_name ?? '' }}" class="w-full border-gray-300 rounded-md shadow-sm" readonly>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">所属</label>
                        <input type="text" id="office" name="office" value="{{ Auth::user()->division->name ?? '' }}" class="w-full border-gray-300 rounded-md shadow-sm" readonly>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">氏名</label>
                        <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="w-full border-gray-300 rounded-md shadow-sm" readonly>
                    </div>
                </div>
            </div>

            <!-- Request Date -->
            <div class="mb-6">
                <label for="request_date" class="block text-sm font-medium text-gray-700 mb-1">申請書日付</label>
                <input type="date" id="request_date" name="request_date" class="form-input w-full rounded-md shadow-sm">
            </div>

            <!-- Child Information (Repeat for each child) -->
            @for ($i = 1; $i <= 3; $i++)
                <div class="bg-gray-100 p-4 rounded-lg mb-6">
                    <h2 class="text-lg font-semibold mb-4">子供 {{ $i }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label for="name_furigana_{{ $i }}" class="block text-sm font-medium text-gray-700 mb-1">フリガナ</label>
                            <input type="text" id="name_furigana_{{ $i }}" name="name_furigana_{{ $i }}" class="form-input w-full rounded-md shadow-sm">
                        </div>
                        <div>
                            <label for="child_name_{{ $i }}" class="block text-sm font-medium text-gray-700 mb-1">出生児名</label>
                            <input type="text" id="child_name_{{ $i }}" name="child_name_{{ $i }}" class="form-input w-full rounded-md shadow-sm">
                        </div>
                        <div>
                            <label for="gender_{{ $i }}" class="block text-sm font-medium text-gray-700 mb-1">性別</label>
                            <select name="gender_{{ $i }}" id="gender_{{ $i }}" class="form-select w-full rounded-md shadow-sm">
                                <option value="" disabled selected>選択</option>
                                <option value="男">男</option>
                                <option value="女">女</option>
                            </select>
                        </div>
                        <div>
                            <label for="relation_{{ $i }}" class="block text-sm font-medium text-gray-700 mb-1">続柄</label>
                            <select name="relation_{{ $i }}" id="relation_{{ $i }}" class="form-select w-full rounded-md shadow-sm">
                                <option value="" disabled selected>選択</option>
                                <option value="長男">長男</option>
                                <option value="次男">次男</option>
                                <option value="三男">三男</option>
                                <option value="四男">四男</option>
                                <option value="長女">長女</option>
                                <option value="次女">次女</option>
                                <option value="三女">三女</option>
                                <option value="四女">四女</option>
                            </select>
                        </div>
                        <div>
                            <label for="child_order_{{ $i }}" class="block text-sm font-medium text-gray-700 mb-1">第</label>
                            <select name="child_order_{{ $i }}" id="child_order_{{ $i }}" class="form-select w-full rounded-md shadow-sm">
                                <option value="" disabled selected>選択</option>
                                <option value="第１子">第１子</option>
                                <option value="第２子">第２子</option>
                                <option value="第３子">第３子</option>
                                <option value="第４子">第４子</option>
                                <option value="第５子">第５子</option>
                            </select>
                        </div>
                        <div>
                            <label for="birthdate_{{ $i }}" class="block text-sm font-medium text-gray-700 mb-1">生年月日</label>
                            <input type="date" id="birthdate_{{ $i }}" name="birthdate_{{ $i }}" class="form-input w-full rounded-md shadow-sm">
                        </div>
                        <div>
                            <label for="dependency_{{ $i }}" class="block text-sm font-medium text-gray-700 mb-1">扶養義務</label>
                            <select name="dependency_{{ $i }}" id="dependency_{{ $i }}" class="form-select w-full rounded-md shadow-sm">
                                <option value="" disabled selected>選択</option>
                                <option value="なし">なし</option>
                                <option value="有り">有り</option>
                            </select>
                        </div>
                    </div>
                </div>
            @endfor

            <!-- Childcare Leave -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">育児休業</label>
                <div class="flex space-x-4">
                    <label class="flex items-center">
                        <input type="radio" name="childcare_leave" value="1" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">取得する</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="childcare_leave" value="0" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">取得しない</span>
                    </label>
                </div>
            </div>

            <!-- Childcare Leave Period -->
            <div id="childcareLeavePeriod" class="mb-6">

                <label for="childcare_leave_start_date" class="block text-sm font-medium text-gray-700 mb-1">取得期間から</label>
                <input type="date" id="childcare_leave_start_date" name="childcare_leave_start_date" class="form-input w-full rounded-md shadow-sm">

                <label for="childcare_leave_start_date_to" class="block text-sm font-medium text-gray-700 mb-1">取得期間まで</label>
                <input type="date" id="childcare_leave_start_date_to" name="childcare_leave_start_date_to" class="form-input w-full rounded-md shadow-sm">
            </div>






            <!-- Boss Selection -->
            <div class="mb-6">
                <label for="boss_id" class="block text-sm font-medium text-gray-700 mb-1">Select Boss</label>
                <select name="boss_id" id="boss_id" class="form-select w-full rounded-md shadow-sm" required>
                    <option value="">Select a boss</option>
                    @foreach($bosses as $boss)
                        <option value="{{ $boss->id }}">{{ $boss->name }}</option>
                    @endforeach
                </select>
            </div>

                  <!-- Submit Button -->
                  <div class="flex items-center justify-end">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Submit
                    </button>
                </div>

            <div class="document-requirements mb-4">
                <h3 class="main-title font-bold">《その他添付書類》該当者のみ</h3>
                <ul class="requirement-list">
                    <li class="requirement-item mb-4">
                        <span class="requirement-type font-medium">・扶養家族変更届（社内書式）</span>
                        <p class="requirement-note">・健康保険出産手当金請求書（法定書式）</p>
                        <p class="requirement-note">・被保険者／配偶者出産一時金請求書（法定書式）</p>
                        <p class="requirement-note">・健康保険被扶養者異動届（法定書式）</p>
                    </li>

                </ul>
            </div>




        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('request_date').value = today;

            const radioButtons = document.querySelectorAll('input[name="childcare_leave"]');
            const dateInputs = document.querySelectorAll('#childcareLeavePeriod input[type="date"]');

            function toggleDateInputs() {
                const isEnabled = document.querySelector('input[name="childcare_leave"]:checked')?.value === "1";
                dateInputs.forEach(input => {
                    input.disabled = !isEnabled;
                });
            }

            radioButtons.forEach(radio => {
                radio.addEventListener('change', toggleDateInputs);
            });

            // Initial state
            toggleDateInputs();
        });
        </script>
</x-app-layout>
