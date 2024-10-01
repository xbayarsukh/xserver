<x-app-layout>
    <h1>Form Type 6A3</h1>

    <form action="{{ route('forms.store', '6A3') }}" method="POST">
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
            <h1 class="text-3xl font-bold text-center mb-6">得意先慶弔連絡表</h1>



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


            <div class="document-requirements mb-4">
                <h3 class="main-title font-medium">  首題の件、下記の通り報告致します。</h3>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="request_date" class="block text font-medium text-gray-700 mb-1">申出日</label>
                    <input type="date" id="request_date" name="request_date" class="form-input w-full">
                </div>
            </div>

            <div class="mb-4 flex border border-gray-500">
                <div class="flex w-full">
                    <div class="w-1/2 border-r border-gray-500">
                        <label for="1" class="block text font-bold p-2">慶弔項目</label>
                    </div>
                    <div class="w-1/2">
                        <label for="2" class="block text font-bold p-2">見舞い</label>
                    </div>
                </div>
            </div>


               <!--1-->
               <div class="mb-4 flex border border-gray-300">
                <div class="w-2/3 border-r border-gray-300 p-2">
                    <label for="customer_name" class="block font-medium text-gray-700 mb-1">得意先名</label>
                    <input type="text" id="customer_name" name="customer_name" class="form-input w-full" placeholder="○○○○電気工事㈱">
                </div>

                <div class="w-1/3 border-r border-gray-300 p-2">
                    <label for="select" class="block font-medium text-gray-700 mb-1">得意先ランク</label>
                    <select name="select" id="select" class="form-select  w-full">
                        <option value="" disabled selected>選択</option>
                        <option value="A">A</option>
                        <option value="Ｂ以下">Ｂ以下</option>
                    </select>
                </div>


                </div>
               <!--1-->
               <div class="mb-4 flex border border-gray-300">
                <div class="w-2/3 border-r border-gray-300 p-2">
                    <label for="customer_address" class="block font-medium text-gray-700 mb-1">得意先住所</label>
                    <input type="text" id="customer_address" name="customer_address" class="form-input w-full" placeholder="津市○○町○○番地">
                </div>

                <div class="w-1/3 border-r border-gray-300 p-2">
                    <label for="breakdown1" class="block font-medium text-gray-700 mb-1">内容</label>
                    <select name="select2" id="select2" class="form-select  w-full">
                        <option value="" disabled selected>選択</option>
                        <option value="病気">病気</option>
                        <option value="怪我">怪我</option>
                        <option value="事故">事故</option>

                    </select>

                </div>
               </div>


              <!--1-->
    <div class="mb-4 flex flex-wrap border border-gray-500">
        <div class="w-full text-center p-2">
            <label for="11" class="font-bold text-gray-700">該当者の内容</label>
        </div>

        <div class="w-1/3 border-r border-gray-300 p-2">
            <label for="user1" class="block font-medium text-gray-700 mb-1">フリガナ</label>
            <input type="text" id="furigana1" name="furigana1" class="form-input w-full" placeholder="マルマル サンカクオ">
        </div>

        <div class="w-1/3 border-r border-gray-300 p-2">
            <label for="breakdown1" class="block font-medium text-gray-700 mb-1">氏名</label>
            <input type="text" id="name1" name="name1" class="form-input w-full" placeholder="○○ △男">
        </div>

        <div class="w-1/3 border-r border-gray-300 p-2">
            <label for="breakdown2" class="block font-medium text-gray-700 mb-1">年齢</label>
            <input type="text" id="age1" name="age1" class="form-input w-full" placeholder="80">
        </div>

        <div class="w-full border-t border-gray-300 p-2 mt-2 flex">
            <div class="w-1/3 border-r border-gray-300 p-2">
                <label for="gender" class="block font-medium text-gray-700 mb-1">性別</label>
                <div class="flex items-center">
                    <input type="radio" id="male" name="gender" value="1" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                    <label for="male" class="ml-2 text-gray-700">男性</label>
                </div>
                <div class="flex items-center mt-2">
                    <input type="radio" id="female" name="gender" value="0" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                    <label for="female" class="ml-2 text-gray-700">女性</label>
                </div>
            </div>

            <div class="w-2/3 p-2">
                <label for="age" class="block font-medium text-gray-700 mb-1">得意先との関係（詳細に）</label>
                <input type="text" id="relationship" name="relationship" class="form-input w-full" placeholder="○○○○電気工事㈱">

            </div>
        </div>


        </div>
              <!--1-->
              <div class="px-2 py-2 mb-4 flex flex-wrap border border-gray-500">
                <div class="flex space-x-4">
                    <label class="flex items-center">
                        <input type="radio" name="address_change" value="1" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">病院</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="address_change" value="0" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">自宅療養</span>
                    </label>
                </div>

              </div>

              <div id="hospital-info" class="mb-4 flex flex-wrap border border-gray-500">
                <div class="w-full text-center p-2">
                    <label for="11" class="font-bold text-gray-700">入院先</label>
                </div>




                <div class="w-1/3 border-r border-gray-300 p-2">
                    <label for="user1" class="block font-medium text-gray-700 mb-1">病院名</label>
                    <input type="text" id="hospital_name" name="hospital_name" class="form-input w-full currency-input" placeholder="○○○○病院">
                </div>

                <div class="w-1/3 border-r border-gray-300 p-2">
                    <label for="breakdown1" class="block font-medium text-gray-700 mb-1">診療科</label>
                    <input type="text" id="shindan" name="shindan" class="form-input w-full currency-input" placeholder="整形外科">
                </div>

                <div class="w-1/3 border-r border-gray-300 p-2">
                    <label for="breakdown2" class="block font-medium text-gray-700 mb-1">病棟・病室</label>
                    <input type="text" id="room" name="room" class="form-input w-full currency-input" placeholder="北病棟 ０００号室">
                </div>
            </div>


              <div class="mb-4 flex flex-wrap border border-gray-500">
                <div class="w-full text-center p-2">
                    <label for="11" class="font-bold text-gray-700">内容</label>
                </div>

                <div class="w-1/2 border-r border-gray-300 p-2">
                    <label for="user1" class="block font-medium text-gray-700 mb-1">見舞品</label>
                    <input type="text" id="money1" name="money1" class="form-input w-full currency-input" placeholder="3000円">
                </div>

                <div class="w-1/2 border-r border-gray-300 p-2">
                    <label for="breakdown1" class="block font-medium text-gray-700 mb-1">見舞金</label>
                    <input type="text" id="money2" name="money2" class="form-input w-full currency-input" placeholder="10000円">
                </div>


            </div>




    <div class="p-2">
        <label for="age" class="block font-medium text-gray-700 mb-1">特記事項</label>
        <textarea class="form-input w-full" name="special" id="special" cols="30" rows="10" placeholder="
現在の売上金額としてはＢランクだが、古くからの付き合いで、
菱工会の役員もしてもらっているため。"></textarea>

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
    // Set today's date
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById('request_date').value = today;

    // New code for radio button functionality
    const addressChangeRadios = document.querySelectorAll('input[name="address_change"]');
    const hospitalInfoInputs = document.querySelectorAll('#hospital-info input');

    function toggleHospitalInputs() {
        const isHospital = document.querySelector('input[name="address_change"]:checked').value === "1";

        hospitalInfoInputs.forEach(input => {
            input.disabled = !isHospital;
            if (!isHospital) {
                input.value = '';
            }
        });

        document.getElementById('hospital-info').style.opacity = isHospital ? '1' : '0.5';
    }

    addressChangeRadios.forEach(radio => {
        radio.addEventListener('change', toggleHospitalInputs);
    });

    // Initial state
    toggleHospitalInputs();

    // Currency formatting
    const currencyInputs = document.querySelectorAll('.currency-input');

    function formatCurrency(event) {
        let input = event.target;
        let value = input.value.replace(/[^\d]/g, ''); // Remove all non-numeric characters
        if (value) {
            value = new Intl.NumberFormat('ja-JP').format(value); // Format number with commas
            input.value = `${value}円`; // Append "円" at the end
        }
    }

    function removeCurrencyFormatting(event) {
        let input = event.target;
        let value = input.value.replace(/[^\d]/g, ''); // Remove all non-numeric characters
        input.value = value; // Set the plain numeric value
    }

    currencyInputs.forEach(input => {
        input.addEventListener('input', formatCurrency);
        input.addEventListener('focus', removeCurrencyFormatting);
        input.addEventListener('blur', formatCurrency);
    });
});
 </script>

    </form>

</x-app-layout>
