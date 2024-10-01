<x-app-layout>
    <h1>2E</h1>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
            <h1 class="text-3xl font-bold text-center mb-6">交際費･会議費伺書</h1>

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
                    <label for="date" class="block text font-medium text-gray-700 mb-1">日時</label>
                    <input type="date" id="date" name="date" class="form-input w-full" value="{{ $form->date }}" readonly>
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="to_pay" class="block text font-medium text-gray-700 mb-1">支払先</label>
                    <input type="text" id="to_pay" name="to_pay" class="form-input w-full" value="{{ $form->to_pay }}" readonly>
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="to_user" class="block text font-medium text-gray-700 mb-1">相手先</label>
                    <input type="text" id="to_user" name="to_user" class="form-input w-full" value="{{ $form->to_user }}" readonly>
                </div>
            </div>


            <div class="mb-4 flex space-x-4">
                <div class="flex-1 relative">
                    <label for="price" class="block text font-medium text-gray-700 mb-1">使用金額</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">￥</span>
                        </div>
                        <input type="number" name="price" id="price" class="block w-full pl-7 pr-12 sm:text-sm " placeholder="金額を入れて下さい" value="{{ $form->price }}" readonly>
                    </div>
                </div>
            </div>


            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="reason" class="block text font-medium text-gray-700 mb-1">理由</label>
                  <textarea name="reason" id="reason" cols="30" rows="10" class="form-input w-full" readonly>{{ $form->reason }}</textarea>
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
