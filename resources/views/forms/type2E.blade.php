<x-app-layout>
    <h1>2E</h1>

    <form action="{{ route('forms.store', '2E') }}" method="POST">
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
            <h1 class="text-3xl font-bold text-center mb-6">交際費･会議費伺書</h1>



            <div class="grid grid-cols-3 gap-4 mb-6 bg-blue-100 p-4 rounded">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">営業所</label>
                    @if(Auth::check())
                    @if(Auth::user()->office)
                        <input type="text" id="department" name="department" value="{{ Auth::user()->office->office_name }}"
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
                    <input type="text" id="name" name="name" value="{{ Auth::user()->name }}"
                        class="w-full border-gray-300 rounded-md shadow-sm" readonly>
                </div>
            </div>


            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="request_date" class="block text font-medium text-gray-700 mb-1">申請書日付</label>
                    <input type="date" id="request_date" name="request_date" class="form-input w-full">
                </div>
            </div>


            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="date" class="block text font-medium text-gray-700 mb-1">日時</label>
                    <input type="date" id="date" name="date" class="form-input w-full">
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="to_pay" class="block text font-medium text-gray-700 mb-1">支払先</label>
                    <input type="text" id="to_pay" name="to_pay" class="form-input w-full">
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="to_user" class="block text font-medium text-gray-700 mb-1">相手先</label>
                    <input type="text" id="to_user" name="to_user" class="form-input w-full">
                </div>
            </div>


            <div class="mb-4 flex space-x-4">
                <div class="flex-1 relative">
                    <label for="price" class="block text font-medium text-gray-700 mb-1">使用金額</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">￥</span>
                        </div>
                        <input type="number" name="price" id="price" class="block w-full pl-7 pr-12 sm:text-sm " placeholder="金額を入れて下さい">
                    </div>
                </div>
            </div>


            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="reason" class="block text font-medium text-gray-700 mb-1">理由</label>
                  <textarea name="reason" id="reason" cols="30" rows="10" class="form-input w-full"></textarea>
                </div>
            </div>

            <div class="space-y-2">
                <label for="boss_id" class="block text-sm font-medium text-gray-700">Select Boss</label>
                <select name="boss_id" id="boss_id" class="block w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
                    <option value="">Select a boss</option>
                    @foreach($bosses as $boss)
                        <option value="{{ $boss->id }}">{{ $boss->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="px-2 py-2">
                <button type="submit" class="bg-teal-300 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-teal-400 focus:outline-none focus:ring-2 focus:ring-teal-800 focus:ring-opacity-75 transition duration-150 ease-in-out">
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
            document.getElementById('request_date').value = today;
        });
    </script>

    </form>

</x-app-layout>
