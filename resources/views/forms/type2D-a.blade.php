<x-app-layout>
    <h1>2D-a</h1>

    <form action="{{ route('forms.store', '2Da') }}" method="POST">
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
            <h1 class="text-3xl font-bold text-center mb-6">旅費交通費伺書</h1>



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
                    <label for="destination" class="block text font-medium text-gray-700 mb-1">行き先</label>
                    <input type="text" id="destination" name="destination" class="form-input w-full">
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="destination_to" class="block text font-medium text-gray-700 mb-1">目的地</label>
                    <input type="text" id="destination_to" name="destination_to" class="form-input w-full">
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="schedule" class="block text font-medium text-gray-700 mb-1">日程</label>
                    <input type="text" id="schedule" name="schedule" class="form-input w-full">
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="days" class="block text font-medium text-gray-700 mb-1">出張手当</label>
                    <input type="number" id="days" name="days" class="form-input">

                    <input type="text" id="allowance" name="allowance" class="form-input" placeholder="1日5000円" readonly>
                </div>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1 relative">
                    <label for="money" class="block text font-medium text-gray-700 mb-1">使用金額</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">￥</span>
                        </div>
                        <input type="text" name="money" id="money" class="block w-full pl-7 pr-12 sm:text-sm " placeholder="0">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-center mt-4">
                <div class="content-center mb-4">
                    <h1 class="text-3xl">明 細</h1>
                </div>
            </div>

            <!--1-->
            <div class="mb-4 flex border border-gray-300">
                <div class="w-1/3 border-r border-gray-300 p-2">
                    <label for="user1" class="block font-medium text-gray-700 mb-1">利用先</label>
                    <input type="text" id="user1" name="user1" class="form-input w-full">
                </div>

                <div class="w-1/3 border-r border-gray-300 p-2">
                    <label for="breakdown1" class="block font-medium text-gray-700 mb-1">内訳</label>
                    <input type="text" id="breakdown1" name="breakdown1" class="form-input w-full">
                </div>

                <div class="w-1/3 p-2">
                    <label for="price1" class="block font-medium text-gray-700 mb-1">金額</label>
                    <input type="number" id="price1" name="price1" class="form-input w-full">
                </div>
            </div>
            <!--2-->

            <div class="mb-4 flex border border-gray-300">
                <div class="w-1/3 border-r border-gray-300 p-2">
                    <label for="user2" class="block font-medium text-gray-700 mb-1">利用先</label>
                    <input type="text" id="user2" name="user2" class="form-input w-full">
                </div>

                <div class="w-1/3 border-r border-gray-300 p-2">
                    <label for="breakdown2" class="block font-medium text-gray-700 mb-1">内訳</label>
                    <input type="text" id="breakdown2" name="breakdown2" class="form-input w-full">
                </div>

                <div class="w-1/3 p-2">
                    <label for="price2" class="block font-medium text-gray-700 mb-1">金額</label>
                    <input type="number" id="price2" name="price2" class="form-input w-full">
                </div>
            </div>
            <!--3-->


            <div class="mb-4 flex border border-gray-300">
                <div class="w-1/3 border-r border-gray-300 p-2">
                    <label for="user3" class="block font-medium text-gray-700 mb-1">利用先</label>
                    <input type="text" id="user3" name="user3" class="form-input w-full">
                </div>

                <div class="w-1/3 border-r border-gray-300 p-2">
                    <label for="breakdown3" class="block font-medium text-gray-700 mb-1">内訳</label>
                    <input type="text" id="breakdown3" name="breakdown3" class="form-input w-full">
                </div>

                <div class="w-1/3 p-2">
                    <label for="price3" class="block font-medium text-gray-700 mb-1">金額</label>
                    <input type="number" id="price3" name="price3" class="form-input w-full">
                </div>
            </div>

            <!--4-->

            <div class="mb-4 flex border border-gray-300">
                <div class="w-1/3 border-r border-gray-300 p-2">
                    <label for="user4" class="block font-medium text-gray-700 mb-1">利用先</label>
                    <input type="text" id="user4" name="user4" class="form-input w-full">
                </div>

                <div class="w-1/3 border-r border-gray-300 p-2">
                    <label for="breakdown4" class="block font-medium text-gray-700 mb-1">内訳</label>
                    <input type="text" id="breakdown4" name="breakdown4" class="form-input w-full">
                </div>

                <div class="w-1/3 p-2">
                    <label for="price4" class="block font-medium text-gray-700 mb-1">金額</label>
                    <input type="number" id="price4" name="price4" class="form-input w-full">
                </div>
            </div>

            <!--5-->

            <div class="mb-4 flex border border-gray-300">
                <div class="w-1/3 border-r border-gray-300 p-2">
                    <label for="user5" class="block font-medium text-gray-700 mb-1">利用先</label>
                    <input type="text" id="user5" name="user5" class="form-input w-full">
                </div>

                <div class="w-1/3 border-r border-gray-300 p-2">
                    <label for="breakdown5" class="block font-medium text-gray-700 mb-1">内訳</label>
                    <input type="text" id="breakdown5" name="breakdown5" class="form-input w-full">
                </div>

                <div class="w-1/3 p-2">
                    <label for="price5" class="block font-medium text-gray-700 mb-1">金額</label>
                    <input type="number" id="price5" name="price5" class="form-input w-full">
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

        document.addEventListener('DOMContentLoaded', function()
    {
        const daysInput = document.getElementById('days');
        const allowanceInput = document.getElementById('allowance');

        daysInput.addEventListener('input', function()
    {
        const days = parseInt(this.value) || 0;
        const allowance = days* 5000 ;
        allowanceInput.value ='￥' +allowance.toLocaleString() + '(1日5000円)';
    });
        var today = new Date();
        var dd=String(today.getDate()).padStart(2,'0');
        var mm =String(today.getMonth()+1).padStart(2,'0');
        var yyyy =today.getFullYear();

        today= yyyy + '-' +mm+'-'+dd;
        document.getElementById('request_date').value=today;
    });


    document.addEventListener('DOMContentLoaded', function() {
    const moneyInput = document.getElementById('money');

    moneyInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value) {
            value = parseInt(value, 10).toLocaleString();
        }
        e.target.value = value;
    });
});
    </script>

    </form>

</x-app-layout>
