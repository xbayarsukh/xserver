<x-app-layout>
    <h1>2G</h1>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
            <h1 class="text-3xl font-bold text-center mb-6">起案・稟議書</h1>




            <div class="grid grid-cols-3 gap-4 mb-6 bg-blue-100 p-4 rounded">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">営業所</label>
                    <input type="text" value="{{ $form->department }}" readonly
                        class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">所属</label>
                    <input type="text" value="{{ $form->office }}" readonly
                        class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">氏名</label>
                    <input type="text" value="{{ $form->name }}" readonly
                        class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>



            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="request_date" class="block text font-medium text-gray-700 mb-1">起案日</label>
                    <input type="date" id="request_date" name="request_date" class="form-input w-full" value="{{ $form->request_date }}" readonly>
                </div>
            </div>




            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="subject" class="block text font-medium text-gray-700 mb-1">件名</label>
                    <input type="text" id="subject" name="subject" class="form-input w-full" placeholder="〇〇営業所 玄関看板工事" value="{{ $form->subject }}" readonly>
                </div>
            </div>




            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="reason" class="block text font-medium text-gray-700 mb-1">【起案理由・詳細】</label>
                  <textarea name="reason" id="reason" cols="20" rows="10" class="form-input w-full" placeholder="
営業所正面玄関の看板が経年劣化により変色。
新しい看板の作成を考えております。
看板につきましては、二案見積もりましたのでご検討をお願い致します。


                  " readonly>{{ $form->reason }}</textarea>
                </div>

            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="reason2" class="block text font-medium text-gray-700 mb-1">【時期（購入・新設等の採用希望時期）】</label>
                  <textarea name="reason2" id="reason2" cols="20" rows="10" class="form-input w-full" placeholder="
決裁され次第、発注したいと思っております。
                  " readonly> {{ $form->reason2 }}</textarea>
                </div>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="reason3" class="block text font-medium text-gray-700 mb-1">【購入・委託先】</label>
                  <textarea name="reason3" id="reason3" cols="20" rows="10" class="form-input w-full" placeholder="
〇〇電気工事㈱（弊社得意先）
                  " readonly>{{ $form->reason3 }}</textarea>
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="reason4" class="block text font-medium text-gray-700 mb-1">【必要金額】</label>
                  <textarea name="reason4" id="reason4" cols="20" rows="10" class="form-input w-full" placeholder="
第一案   看板作成                          ・・・・ １５０，０００円（税抜）
第二案   看板作成＋取り付け工事              ・・・・２００，０００円（税抜）
                  " readonly>{{ $form->reason4 }}</textarea>
                </div>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="reason5" class="block text font-medium text-gray-700 mb-1">【添付書類】</label>
                  <textarea name="reason5" id="reason5" cols="20" rows="10" class="form-input w-full" placeholder="
第一案・第二案の見積書２枚
                  " readonly>{{ $form->reason5 }}</textarea>
                </div>
            </div>
            <div class="flex space-x-4">


                <select name="boss_id" id="boss_id" class="mb-4 block w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" {{ isset($application) && $application->boss_id ? 'disabled' : 'required' }}>
                    <option value="">Select a boss</option>
                    @foreach($bosses as $boss)
                        <option value="{{ $boss->id }}" {{ (isset($application) && $application->boss_id==$boss->id) ? 'selected' : ''}}>
                            {{ $boss->name }}
                        </option>
                    @endforeach
                </select>
            </div>









        </div>
    </div>


    </form>

</x-app-layout>
