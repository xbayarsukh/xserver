<x-app-layout>
    <h1>2H</h1>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">

            <h1 class="text-3xl font-bold text-center mb-6">ＥＴＣ利用許可申請書</h1>
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
                    <label for="request_date" class="block text font-medium text-gray-700 mb-1">申請書日付</label>
                    <input type="date" id="request_date" name="request_date" class="form-input w-full" value="{{ $form->request_date }}" readonly>
                </div>
            </div>


            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="etc" class="block text font-medium text-gray-700 mb-1">ETCカード使用日</label>
                    <input type="date" id="etc" name="etc" class="form-input w-full" value="{{ $form->etc }}" readonly>
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="destination" class="block text font-medium text-gray-700 mb-1">目的地</label>
                    <input type="text" id="destination" name="destination" class="form-input w-full" value="{{ $form->destination }}" readonly>
                </div>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="to_user" class="block text font-medium text-gray-700 mb-1">客先（仕入先）</label>
                    <input type="text" id="to_user" name="to_user" class="form-input w-full" value="{{ $form->to_user }}" readonly>
                </div>
            </div>



            <div class="mb-4 flex space-x-4">
                <div class="flex-1 relative">
                    <label for="price" class="block text font-medium text-gray-700 mb-1">売上予定金額（概算）</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">￥</span>
                        </div>
                        <input type="number" name="price" id="price" class="block w-full pl-7 pr-12 sm:text-sm " placeholder="金額を入れて下さい" value="{{ $form->price }}" readonly>
                    </div>
                </div>
            </div>


            <div>
                <label for="select" class="block text-sm font-medium text-gray-700 mb-1">理由</label>
                <select name="select" id="select" class="form-select w-full rounded-md shadow-sm" disabled>
                    <option value="" disabled selected>選択</option>

                    @foreach (['客先の現場納品が遠方のため','商品引き取りのため','研修参加のため','会議出席のため','セミナー参加のため','メーカー内覧会（展示会）参加のため'] as $option)
                    <option value="{{ $option }}" {{ $form->select === $option ? 'selected' : '' }}>{{ $option }}</option>

                    @endforeach
                </select>

            </div>
            <input type="text" name="list" id="list" class="mt-4 mb-2 block w-full pl-7 pr-12 sm:text-sm " placeholder="リストにない場合は手入力" value="{{ $form->list }}" readonly>

            <div class="flex space-x-4">


                <select name="boss_id" id="boss_id" class="block w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" {{ isset($application) && $application->boss_id ? 'disabled' : 'required' }}>
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
