<x-app-layout>
    <h1>2C</h1>

    <form action="{{ route('forms.store', '2C') }}" method="POST">
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
            <h1 class="text-3xl font-bold text-center mb-6">営業費使用伺書</h1>



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

            <div>

            <select name="select" id="select" class="form-select rounded-md shadow-sm">
                <option value="" disabled selected>選択</option>
                <option value="雑費">雑費</option>
                <option value="事務用品費">事務用品費</option>
                <option value="販売促進費">販売促進費</option>
                <option value="厚生費">厚生費</option>
                <option value="建物等補修費">建物等補修費</option>
                <option value="社員教育費">社員教育費</option>
                <option value="消耗油脂費">消耗油脂費</option>
                <option value="仮払金">仮払金</option>
            </select>

            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="sent_to" class="block text font-medium text-gray-700 mb-1">相手先</label>
                    <input type="text" id="sent_to" name="sent_to" class="form-input w-full">
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="product_name" class="block text font-medium text-gray-700 mb-1">品名</label>
                    <input type="text" id="product_name" name="product_name" class="form-input w-full">
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="number" class="block text font-medium text-gray-700 mb-1">数量</label>
                    <input type="number" id="number" name="number" class="form-input w-full">
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="price" class="block text font-medium text-gray-700 mb-1">金額</label>
                    <input type="number" id="price" name="price" class="form-input w-full">
                </div>
            </div>


                <input type="text" id="memo1" name="memo1" class="mb-4 form=input w-full">
                <input type="text" id="memo2" name="memo2" class="mb-4 form=input w-full">
                <input type="text" id="memo3" name="memo3" class="mb-4 form=input w-full">
                <input type="text" id="memo4" name="memo4" class="mb-4 form=input w-full">
                <input type="text" id="memo5" name="memo5" class="mb-4 form=input w-full">







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


            <div class="document-requirements mb-4">
                <h3 class="main-title border-2 border-solid border-yellow-400 p-2">
                    高速料金、タクシー代、電車代は「旅費交通費伺書」を。
                    手土産代、取引先との食事、会食代等は「交際費・会議費伺書」を。
                </h3>
                <ul class="requirement-list">

                    <li class="requirement-item mt-2 mb-4">
                        <table class="w-full border-collapse border border-gray-300">
                            <tr>
                                <td class="border border-gray-300 p-2">雑費</td>
                                <td class="border border-gray-300 p-2">飲食物、台所用品、年会費等</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">事務用品費</td>
                                <td class="border border-gray-300 p-2">専用伝票代、筆記用具等</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">販売促進費</td>
                                <td class="border border-gray-300 p-2">商談会費用、チラシ作成等</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">厚生費</td>
                                <td class="border border-gray-300 p-2">常備薬、浄化槽点検等</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">建物等補修費</td>
                                <td class="border border-gray-300 p-2">シャッター修理、看板修理等</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">社員教育費</td>
                                <td class="border border-gray-300 p-2">研修費用、教材代等</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">消耗油脂費</td>
                                <td class="border border-gray-300 p-2">ガソリン代</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">仮払金</td>
                                <td class="border border-gray-300 p-2">立替等</td>
                            </tr>
                        </table>
                    </li>
                </ul>

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
