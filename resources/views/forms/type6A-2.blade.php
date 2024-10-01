<x-app-layout>
    <h1>Form Type 6A2</h1>

    <form action="{{ route('forms.store', '6A2') }}" method="POST">
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
                        <label for="2" class="block text font-bold p-2">開店</label>
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
                        <option value="事務所新築">事務所新築</option>
                        <option value="事務所移転">事務所移転</option>
                        <option value="リニューアル">リニューアル</option>
                        <option value="独立">独立</option>
                        <option value="新規立上げ">新規立上げ</option>
                    </select>

                </div>


                </div>
                <div class="mb-4 flex border border-gray-300">
                    <div class="w-2/3 border-r border-gray-300 p-2">
                        <label for="customer_address" class="block font-medium text-gray-700 mb-1">代表者氏名</label>
                        <input type="text" id="president_name" name="president_name" class="form-input w-full" placeholder="○○山 ○夫">
                    </div>

                    <div class="w-1/3 border-r border-gray-300 p-2">
                        <label for="breakdown1" class="block font-medium text-gray-700 mb-1">電話番号</label>
                        <input type="text" id="phone" name="phone" class="form-input w-full" placeholder="059-000-0000">



                    </div>


                    </div>


              <!--1-->
              <div class="mb-4 flex flex-wrap border border-gray-500">
                <div class="w-full text-center p-2">
                    <label for="11" class="font-bold text-gray-700">祝儀内容</label>
                </div>

                <div class="w-1/3 border-r border-gray-300 p-2">
                    <label for="user1" class="block font-medium text-gray-700 mb-1">ご祝儀</label>
                    <input type="text" id="money1" name="money1" class="form-input w-full currency-input" placeholder="1000">
                </div>

                <div class="w-1/3 border-r border-gray-300 p-2">
                    <label for="breakdown1" class="block font-medium text-gray-700 mb-1">お祝い品</label>
                    <input type="text" id="money2" name="money2" class="form-input w-full currency-input" placeholder="1000">
                </div>

                <div class="w-1/3 border-r border-gray-300 p-2">
                    <label for="breakdown2" class="block font-medium text-gray-700 mb-1">祝電</label>
                    <input type="text" id="money3" name="money3" class="form-input w-full currency-input" placeholder="1000">
                </div>
            </div>

    <div class="p-2">
        <label for="age" class="block font-medium text-gray-700 mb-1">特記事項</label>
        <textarea class="form-input w-full" name="special" id="special" cols="30" rows="10"></textarea>

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

                // Currency formatting
                const currencyInputs = document.querySelectorAll('.currency-input');

                currencyInputs.forEach(input => {
                    input.addEventListener('input', formatCurrency);
                    input.addEventListener('focus', removeCurrencyFormatting);
                    input.addEventListener('blur', formatCurrency);
                });

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
            });
        </script>

    </form>

</x-app-layout>
