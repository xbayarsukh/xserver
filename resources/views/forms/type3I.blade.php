<x-app-layout>
    <h1>Form Type 3I</h1>

    <form action="{{ route('forms.store', '3I') }}" method="POST">
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
            <h1 class="text-3xl font-bold text-center mb-6">住所変更届</h1>



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
                    <label for="request_date" class="block text font-medium text-gray-700 mb-1">申出日</label>
                    <input type="date" id="request_date" name="request_date" class="form-input w-full">
                </div>
            </div>


            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="change_date" class="block text font-medium text-gray-700 mb-1">変更年月日</label>
                    <input type="date" id="change_date" name="change_date" class="form-input w-full">
                </div>

            </div>


          <div class="bg-gray-200">
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="address_furigana" class="block text font-medium text-gray-700 mb-1">変更後住所(フリガナ)</label>
                    <input type="text" id="address_furigana" name="address_furigana" class="form-input w-full">
                </div>

            </div>



            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="address_name" class="block text font-medium text-gray-700 mb-1">変更後住所</label>
                    <input type="text" id="address_name" name="address_name" class="form-input w-full">
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="phone_changed" class="block text font-medium text-gray-700 mb-1">電話番号</label>
                    <input type="number" id="phone_changed" name="phone_changed" class="form-input w-full">
                </div>
            </div>
          </div>


            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="before_address_furigana" class="block text font-medium text-gray-700 mb-1">変更前住所(フリガナ)</label>
                    <input type="text" id="before_address_furigana" name="before_address_furigana" class="form-input w-full">
                </div>

            </div>



            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="before_address" class="block text font-medium text-gray-700 mb-1">変更前住所</label>
                    <input type="text" id="before_address" name="before_address" class="form-input w-full">
                </div>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="phone_before" class="block text font-medium text-gray-700 mb-1">電話番号</label>
                    <input type="number" id="phone_before" name="phone_before" class="form-input w-full">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">住民票異動手続き </label>
                    <div class="flex flex-col space-y-2">
                        <div class="flex space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="support" value="1" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                                <span class="ml-2 text-sm text-gray-700">異動済み</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="support" value="0" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                                <span class="ml-2 text-sm text-gray-700">役所へ届がまだ</span>

                            </label>
                        </div>


                    </div>
                </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="reason" class="block text font-medium text-gray-700 mb-1">変更理由</label>
                    <textarea id="reason" name="reason"
                    class="mt-4 px-2 py-3 form-textarea w-full h-40 border border-gray-300 rounded-md"></textarea>
                </div>
            </div>

            <div class="document-requirements mb-4">
                <h3 class="main-title font-bold">※住所変更をされた方は、必要に応じてマイカー通勤許可願、通勤手段変更届もご提出下さい。</h3>
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
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0');
                var yyyy = today.getFullYear();

                today = yyyy + '-' + mm + '-' + dd;
                document.getElementById('request_date').value = today;
            });
        </script>


    </form>

</x-app-layout>
