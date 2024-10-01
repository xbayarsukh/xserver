<x-app-layout>
    <h1>Form Type 3G</h1>

    <form action="{{ route('forms.store', '3G') }}" method="POST">
        @csrf
        <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1 class="text-3xl font-bold text-center mb-6">扶養家族変更届</h1>



            <div class="grid grid-cols-3 gap-4 mb-6 bg-blue-100 p-4 rounded">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">営業所</label>
                    @if (Auth::check())
                        @if (Auth::user()->office)
                            <input type="text" id="department" name="department"
                                value="{{ Auth::user()->office->office_name }}"
                                class="w-full border-gray-300 rounded-md shadow-sm" readonly>
                        @else
                            <p>User has no associated office</p>
                        @endif
                    @else
                        <p>User is not authenticated</p>
                    @endif

                </div>

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-1">所属</label>
                    <input type="text" id="office" name="office"
                    value="{{ Auth::user()->division->name ?? ''}}"
                        class="w-full border-gray-300 rounded-md shadow-sm" readonly>

                </div>


                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">氏名</label>
                    <input type="text" id="name" name="name" value="{{ Auth::user()->name ?? ''}}"
                        class="w-full border-gray-300 rounded-md shadow-sm" readonly>
                </div>
            </div>




            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="apply_date" class="block text font-medium text-gray-700 mb-1">申出日</label>
                    <input type="date" id="apply_date" name="apply_date" class="form-input w-full">
                </div>

                <div class="flex-1">
                    <label for="edit_date" class="block text font-medium text-gray-700 mb-1">変更日</label>
                    <input type="date" id="edit_date" name="edit_date" class="form-input w-full">
                </div>
            </div>

            @for ($i = 1; $i <= 3; $i++)

            <div class="px-2 py-2 bg-gray-100 p-4 rounded-lg mb-6">

                <select name="select_{{ $i }}" id="select_{{ $i }}" class="form-select w-full rounded-md shadow-sm">
                    <option value="" disabled selected>選択</option>
                    <option value="編入">編入</option>
                    <option value="除外">除外</option>
                </select>
                <div class="px-2 py-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <label for="family_name_furigana_{{ $i }}" class="block text-sm font-medium text-gray-700 mb-1">家族氏名フリガナ</label>
                        <input type="text" id="family_name_furigana_{{ $i }}" name="family_name_furigana_{{ $i }}" class="form-input w-full rounded-md shadow-sm">
                    </div>
                    <div>
                        <label for="family_name_{{ $i }}" class="block text-sm font-medium text-gray-700 mb-1">家族氏名</label>
                        <input type="text" id="family_name_{{ $i }}" name="family_name_{{ $i }}" class="form-input w-full rounded-md shadow-sm">
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
                        <label for="relationship_{{ $i }}" class="block text-sm font-medium text-gray-700 mb-1">続柄</label>
                        <input type="text" id="relationship_{{ $i }}" name="relationship_{{ $i }}" class="form-input w-full rounded-md shadow-sm">
                    </div>
                    <div>
                        <label for="birth_{{ $i }}" class="block text-sm font-medium text-gray-700 mb-1">生年月日</label>
                        <input type="date" id="birth_{{ $i }}" name="birth_{{ $i }}" class="form-input w-full rounded-md shadow-sm">
                    </div>


                    <div>
                        <label for="occupation_{{ $i }}" class="block text-sm font-medium text-gray-700 mb-1">職業</label>
                        <select name="occupation_{{ $i }}" id="occupation_{{ $i }}" class="form-select w-full rounded-md shadow-sm">
                            <option value="" disabled selected>選択</option>
                            <option value="無職">無職</option>

                        </select>
                    </div>

                    <div>
                        <label for="income_{{ $i }}" class="block text-sm font-medium text-gray-700 mb-1">収入</label>
                        <div class="relative">
                            <input type="text" id="income_{{ $i }}" name="income_{{ $i }}" class="form-input w-full rounded-md shadow-sm pr-12">
                            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">万円</span>
                        </div>
                    </div>


                    <div>
                        <label for="live_{{ $i }}" class="block text-sm font-medium text-gray-700 mb-1">住まい</label>
                        <select name="live_{{ $i }}" id="live_{{ $i }}" class="form-select w-full rounded-md shadow-sm">
                            <option value="" disabled selected>選択</option>
                            <option value="同居">同居</option>
                            <option value="別居">別居</option>
                        </select>
                    </div>
                </div>

                <div class="px-2 py-2 mt-4">
                        <label for="reason_{{ $i }}" class="block text-sm font-medium text-gray-700 mb-1">理由</label>
                        <input type="text" id="reason_{{ $i }}" name="reason_{{ $i }}" class="form-input w-full rounded-md shadow-sm">
                    </div>

            </div>
        @endfor

        <div class="document-requirements mb-4">
            <h3 class="main-title font-bold">《その他添付書類》</h3>
            <ul class="requirement-list">
                <li class="requirement-item mb-4">
                    <span class="requirement-type font-bold">◇編入:</span>
                    <span class="font-bold">従業員本人と扶養対象者が記載された住民票</span>
                    <p class="requirement-note">（個人番号と続柄が記載されているもの）</p>
                </li>
                <li class="requirement-item mt-2 mb-4">
                    <span class="requirement-type font-bold">◇除外:</span>
                    <span class="font-bold">対象者の健康保険証</span>
                </li>
            </ul>
            <p class="special-note">※子が就職した場合、変更年月日は"子の就職日"を記入。</p>
        </div>









            <div class="space-y-2">
                <label for="boss_id" class="block text-sm font-medium text-gray-700">Select Boss</label>
                <select name="boss_id" id="boss_id"
                    class="block w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                    required>
                    <option value="">Select a boss</option>
                    @foreach ($bosses as $boss)
                        <option value="{{ $boss->id }}">{{ $boss->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="px-2 py-2">
                <button type="submit"
                    class="bg-teal-300 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-teal-400 focus:outline-none focus:ring-2 focus:ring-teal-800 focus:ring-opacity-75 transition duration-150 ease-in-out">
                    Submit
                </button>

            </div>





        </div>
    </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0');
                var yyyy = today.getFullYear();

                today = yyyy + '-' + mm + '-' + dd;
                document.getElementById('apply_date').value = today;
            });
        </script>


    </form>

</x-app-layout>
