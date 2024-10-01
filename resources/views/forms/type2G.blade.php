<x-app-layout>
    <h1>2G</h1>

    <form action="{{ route('forms.store', '2G') }}" method="POST">
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
            <h1 class="text-3xl font-bold text-center mb-6">起案・稟議書</h1>




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
                    <label for="request_date" class="block text font-medium text-gray-700 mb-1">起案日</label>
                    <input type="date" id="request_date" name="request_date" class="form-input w-full">
                </div>
            </div>




            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="subject" class="block text font-medium text-gray-700 mb-1">件名</label>
                    <input type="text" id="subject" name="subject" class="form-input w-full" placeholder="〇〇営業所 玄関看板工事">
                </div>
            </div>




            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="reason" class="block text font-medium text-gray-700 mb-1">【起案理由・詳細】</label>
                  <textarea name="reason" id="reason" cols="20" rows="10" class="form-input w-full" placeholder="
営業所正面玄関の看板が経年劣化により変色。
新しい看板の作成を考えております。
看板につきましては、二案見積もりましたのでご検討をお願い致します。


                  "></textarea>
                </div>

            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="reason2" class="block text font-medium text-gray-700 mb-1">【時期（購入・新設等の採用希望時期）】</label>
                  <textarea name="reason2" id="reason2" cols="20" rows="10" class="form-input w-full" placeholder="
決裁され次第、発注したいと思っております。
                  "></textarea>
                </div>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="reason3" class="block text font-medium text-gray-700 mb-1">【購入・委託先】</label>
                  <textarea name="reason3" id="reason3" cols="20" rows="10" class="form-input w-full" placeholder="
〇〇電気工事㈱（弊社得意先）
                  "></textarea>
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="reason4" class="block text font-medium text-gray-700 mb-1">【必要金額】</label>
                  <textarea name="reason4" id="reason4" cols="20" rows="10" class="form-input w-full" placeholder="
第一案   看板作成                          ・・・・ １５０，０００円（税抜）
第二案   看板作成＋取り付け工事              ・・・・２００，０００円（税抜）
                  "></textarea>
                </div>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="reason5" class="block text font-medium text-gray-700 mb-1">【添付書類】</label>
                  <textarea name="reason5" id="reason5" cols="20" rows="10" class="form-input w-full" placeholder="
第一案・第二案の見積書２枚
                  "></textarea>
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
