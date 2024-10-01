<x-app-layout>
    <h1>2A</h1>
    <h2>car option dutuu bas switch loop ni bas dutuu ehleed excel sheetee zadlaj bvh listee olchood hii</h2>
    <h3>folderuudiig vvsgeh</h3>

    <form action="{{ route('forms.store', '2A') }}" method="POST">
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
            <h1 class="text-3xl font-bold text-center mb-6">ＥＴＣ利用許可申請書</h1>

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

            <div class="flex space-x-4">
                <div class="flex-1">
                    <label for="car_number" class="block text-sm font-medium text-gray-700 mb-1">登録番号（車のナンバー）</label>
                    <select name="car_number" id="car_number" class="form-select rounded-md shadow-sm w-full">
                        <option value="" disabled selected>選択</option>
                        <option value="鈴鹿400さ8270">鈴鹿400さ8270</option>
                        <option value="鈴鹿400さ8271">鈴鹿400さ8271</option>
                        <option value="三重581ぬ3270">三重581ぬ3270</option>
                        <option value="鈴鹿400さ8462">鈴鹿400さ8462</option>
                        <option value="三重480に8982">三重480に8982</option>
                        <option value="伊勢志摩400さ 126">伊勢志摩400さ 126</option>
                        <option value="四日市400さ2316">四日市400さ2316</option>
                        <option value="四日市400さ3205">四日市400さ3205</option>
                        <option value="四日市400さ757">四日市400さ757</option>
                        <option value="三重480な7077">三重480な7077</option>
                        <option value="三重400に4525">三重400に4525</option>
                        <option value="三重400に8152">三重400に8152</option>
                        <option value="鈴鹿400さ6187">鈴鹿400さ6187</option>
                        <option value="四日市400さ1347">四日市400さ1347</option>
                        <option value="三重400に3015">三重400に3015</option>
                        <option value="鈴鹿580そ668">鈴鹿580そ668</option>
                        <option value="鈴鹿400さ8133">鈴鹿400さ8133</option>
                        <option value="鈴鹿400さ7136">鈴鹿400さ7136</option>
                        <option value="鈴鹿400さ7081">鈴鹿400さ7081</option>
                        <option value="鈴鹿400さ7560">鈴鹿400さ7560</option>
                        <option value="鈴鹿580け8192">鈴鹿580け8192</option>
                        <option value="三重400ぬ3979">三重400ぬ3979</option>
                        <option value="三重400ぬ6004">三重400ぬ6004</option>
                        <option value="三重400ぬ6003">三重400ぬ6003</option>
                        <option value="三重400ぬ5455">三重400ぬ5455</option>
                        <option value="三重400に5855">三重400に5855</option>
                        <option value="三重400ぬ3436">三重400ぬ3436</option>
                        <option value="三重400ぬ5455">三重400ぬ5455</option>
                        <option value="三重400に5855">三重400に5855</option>
                        <option value="三重400ぬ3436">三重400ぬ3436</option>
                        <option value="三重400ぬ5455">三重400ぬ5455</option>





















                    </select>
                </div>
                <div class="flex-1">
                    <label for="car_type" class="block text-sm font-medium text-gray-700 mb-1">車種</label>
                    <input type="text" id="car_type" name="car_type" class="form-input w-full">
                </div>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="destination" class="block text font-medium text-gray-700 mb-1">目的地</label>
                    <input type="text" id="destination" name="destination" class="form-input w-full">
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="customer" class="block text font-medium text-gray-700 mb-1">客先</label>
                    <input type="text" id="customer" name="customer" class="form-input w-full">
                </div>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="reason" class="block text font-medium text-gray-700 mb-1">客先</label>
                    <select name="reason" id="reason" class="form-select rounded-md shadow-sm w-full">
                        <option value="" disabled selected>選択</option>
                        <option value="客先の現場納品が遠方のため">客先の現場納品が遠方のため</option>
                        <option value="商品引き取りのため">商品引き取りのため</option>
                        <option value="研修参加のため">研修参加のため</option>
                        <option value="会議出席のため">会議出席のため</option>
                        <option value="セミナー参加のため">セミナー参加のため</option>
                        <option value="メーカー内覧会（展示会）参加のため">メーカー内覧会（展示会）参加のため</option>
                    </select>
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="used_money" class="block text font-medium text-gray-700 mb-1">合計利用料</label>
                    <input type="text" id="used_money" name="used_money" class="form-input w-full">
                </div>
            </div>
            <div class="text-bold items-center">
                <h1>利用明細</h1>
            </div>

            <div class="mb-4">
                <table class="w-full border-collapse border border-gray-300">
                    <tr>
                        <td class="border border-gray-300 p-2 w-1/5">
                            <label for="usage_area_1" class="block text-sm font-medium text-gray-700">利用区間１</label>
                        </td>
                        <td class="border border-gray-300 p-2 w-2/5">
                            <div class="flex items-center">
                                <input type="text" id="from" name="from" class="form-input w-full" placeholder="から">
                                <span class="mx-2">～</span>
                                <input type="text" id="to" name="to" class="form-input w-full" placeholder="まで">
                            </div>
                        </td>
                        <td class="border border-gray-300 p-2 w-1/5">
                            <label for="fee" class="block text-sm font-medium text-gray-700">料金</label>
                        </td>
                        <td class="border border-gray-300 p-2 w-1/5">
                            <input type="text" id="fee" name="fee" class="form-input w-full">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="mb-4">
                <table class="w-full border-collapse border border-gray-300">
                    <tr>
                        <td class="border border-gray-300 p-2 w-1/5">
                            <label for="usage_area_1" class="block text-sm font-medium text-gray-700">利用区間２</label>
                        </td>
                        <td class="border border-gray-300 p-2 w-2/5">
                            <div class="flex items-center">
                                <input type="text" id="from" name="from" class="form-input w-full" placeholder="から">
                                <span class="mx-2">～</span>
                                <input type="text" id="to" name="to" class="form-input w-full" placeholder="まで">
                            </div>
                        </td>
                        <td class="border border-gray-300 p-2 w-1/5">
                            <label for="fee" class="block text-sm font-medium text-gray-700">料金</label>
                        </td>
                        <td class="border border-gray-300 p-2 w-1/5">
                            <input type="text" id="fee" name="fee" class="form-input w-full">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="mb-4">
                <table class="w-full border-collapse border border-gray-300">
                    <tr>
                        <td class="border border-gray-300 p-2 w-1/5">
                            <label for="usage_area_1" class="block text-sm font-medium text-gray-700">利用区間３</label>
                        </td>
                        <td class="border border-gray-300 p-2 w-2/5">
                            <div class="flex items-center">
                                <input type="text" id="from" name="from" class="form-input w-full" placeholder="から">
                                <span class="mx-2">～</span>
                                <input type="text" id="to" name="to" class="form-input w-full" placeholder="まで">
                            </div>
                        </td>
                        <td class="border border-gray-300 p-2 w-1/5">
                            <label for="fee" class="block text-sm font-medium text-gray-700">料金</label>
                        </td>
                        <td class="border border-gray-300 p-2 w-1/5">
                            <input type="text" id="fee" name="fee" class="form-input w-full">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="mb-4">
                <table class="w-full border-collapse border border-gray-300">
                    <tr>
                        <td class="border border-gray-300 p-2 w-1/5">
                            <label for="usage_area_1" class="block text-sm font-medium text-gray-700">利用区間４</label>
                        </td>
                        <td class="border border-gray-300 p-2 w-2/5">
                            <div class="flex items-center">
                                <input type="text" id="from" name="from" class="form-input w-full" placeholder="から">
                                <span class="mx-2">～</span>
                                <input type="text" id="to" name="to" class="form-input w-full" placeholder="まで">
                            </div>
                        </td>
                        <td class="border border-gray-300 p-2 w-1/5">
                            <label for="fee" class="block text-sm font-medium text-gray-700">料金</label>
                        </td>
                        <td class="border border-gray-300 p-2 w-1/5">
                            <input type="text" id="fee" name="fee" class="form-input w-full">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="mb-4">
                <table class="w-full border-collapse border border-gray-300">
                    <tr>
                        <td class="border border-gray-300 p-2 w-1/5">
                            <label for="usage_area_1" class="block text-sm font-medium text-gray-700">利用区間５</label>
                        </td>
                        <td class="border border-gray-300 p-2 w-2/5">
                            <div class="flex items-center">
                                <input type="text" id="from" name="from" class="form-input w-full" placeholder="から">
                                <span class="mx-2">～</span>
                                <input type="text" id="to" name="to" class="form-input w-full" placeholder="まで">
                            </div>
                        </td>
                        <td class="border border-gray-300 p-2 w-1/5">
                            <label for="fee" class="block text-sm font-medium text-gray-700">料金</label>
                        </td>
                        <td class="border border-gray-300 p-2 w-1/5">
                            <input type="text" id="fee" name="fee" class="form-input w-full">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="mb-4">
                <table class="w-full border-collapse border border-gray-300">
                    <tr>
                        <td class="border border-gray-300 p-2 w-1/5">
                            <label for="usage_area_1" class="block text-sm font-medium text-gray-700">利用区間６</label>
                        </td>
                        <td class="border border-gray-300 p-2 w-2/5">
                            <div class="flex items-center">
                                <input type="text" id="from" name="from" class="form-input w-full" placeholder="から">
                                <span class="mx-2">～</span>
                                <input type="text" id="to" name="to" class="form-input w-full" placeholder="まで">
                            </div>
                        </td>
                        <td class="border border-gray-300 p-2 w-1/5">
                            <label for="fee" class="block text-sm font-medium text-gray-700">料金</label>
                        </td>
                        <td class="border border-gray-300 p-2 w-1/5">
                            <input type="text" id="fee" name="fee" class="form-input w-full">
                        </td>
                    </tr>
                </table>
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
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();

            today = yyyy + '-' + mm + '-' + dd;
            document.getElementById('request_date').value = today;
        });

        document.getElementById('car_number').addEventListener('change', function() {
            var carTypeInput = document.getElementById('car_type');
            var selectedValue = this.value;

            switch(selectedValue) {
                case '鈴鹿400さ8270':
                    carTypeInput.value = 'プロボックスバンHV';
                    break;
                case '鈴鹿400さ8271':
                    carTypeInput.value = 'プロボックスバンHV';
                    break;
                case '三重581ぬ3270':
                    carTypeInput.value = 'N-WGN';
                    break;
                case '鈴鹿400さ8462':
                    carTypeInput.value = 'ハイエースバン';
                    break;
                case '三重480に8982':
                    carTypeInput.value = 'N-VAN';
                    break;
                case '伊勢志摩400さ 126':
                    carTypeInput.value = 'ボンゴトラック・ロング';
                    break;
                case '四日市400さ2316':
                    carTypeInput.value = 'ダイナ・パワーポイントゲート';
                    break;
                case '四日市400さ3205':
                    carTypeInput.value = 'ダイナトラック';
                    break;
                case '四日市400さ757':
                    carTypeInput.value = 'タウンエーストラック';
                    break;
                case '三重480な7077':
                    carTypeInput.value = 'アクティバン';
                    break;
                case '三重400に4525':
                    carTypeInput.value = 'ボンゴトラック・ロング';
                    break;
                case '三重400に8152':
                    carTypeInput.value = 'ダイナ・パワーゲート';
                    break;
                case '鈴鹿400さ6187':
                    carTypeInput.value = 'ボンゴトラック・ロング';
                    break;
                case '四日市400さ1347':
                    carTypeInput.value = 'ボンゴトラック・ロング';
                    break;
                case '三重400に3015':
                    carTypeInput.value = 'ボンゴバン';
                    break;
                case '鈴鹿580そ668':
                    carTypeInput.value = 'N-WGN';
                    break;
                case '鈴鹿400さ8133':
                    carTypeInput.value = 'ダイナトラック';
                    break;
                case '鈴鹿400さ7136':
                    carTypeInput.value = 'ボンゴトラック・ロング';
                    break;
                case '鈴鹿400さ7081':
                    carTypeInput.value = 'ボンゴトラック・ロング';
                    break;
                case '鈴鹿400さ7560':
                    carTypeInput.value = 'ダイナ・パワーゲート';
                    break;
                case '鈴鹿580け8192':
                    carTypeInput.value = 'N-WGN';
                    break;
                case '三重400ぬ3979':
                    carTypeInput.value = 'ボンゴトラック・ロング';
                    break;
                case '三重400ぬ6004':
                    carTypeInput.value = 'ボンゴトラック・ロング';
                    break;
                case '三重400ぬ6003':
                    carTypeInput.value = 'ボンゴトラック・ロング';
                    break;
                case '三重400ぬ5455':
                    carTypeInput.value = 'ボンゴトラック・ロング';
                    break;
                case '三重400に5855':
                    carTypeInput.value = 'ダイナ・パワーゲート';
                    break;
                case '三重400ぬ3436':
                    carTypeInput.value = 'ボンゴトラック・ロング';
                    break;
                case '三重400ぬ5455':
                    carTypeInput.value = 'ボンゴトラック・ロング';
                    break;
                case '三重400に5855':
                    carTypeInput.value = 'ダイナ・パワーゲート';
                    break;
                case '三重400ぬ3436':
                    carTypeInput.value = 'ボンゴトラック・ロング';
                    break;
                case '三重400ぬ5455':
                    carTypeInput.value = 'ボンゴトラック・ロング';
                    break;
                case '三重400に5855':
                    carTypeInput.value = 'ボンゴトラック・ロング';
                    break;
                case '三重400に8996':
                    carTypeInput.value = 'ボンゴトラック・ロング';
                    break;






































                default:
                    carTypeInput.value = '';
            }
        });
    </script>
</x-app-layout>
