<x-app-layout>
    <h1>Form Type 3D</h1>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
            <h1 class="text-3xl font-bold text-center mb-6">休職届</h1>



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
                    <label for="request_date" class="block text font-medium text-gray-700 mb-1">申出日</label>
                    <input type="date" id="request_date" name="request_date" class="form-input w-full" value="{{ $form->request_date }}" readonly>
                </div>
            </div>


            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="rest_date_from" class="block text font-medium text-gray-700 mb-1">休職期間から</label>
                    <input type="date" id="rest_date_from" name="rest_date_from" class="form-input w-full" value="{{ $form->rest_date_from }}" readonly>
                </div>

            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="rest_date_to" class="block text font-medium text-gray-700 mb-1">休職期間まで</label>
                    <input type="date" id="rest_date_to" name="rest_date_to" class="form-input w-full" value="{{ $form->rest_date_to }}" readonly>
                </div>

            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="reason" class="block text font-medium text-gray-700 mb-1">休職の事由</label>
                    <textarea id="reason" name="reason"
                    class="mt-4 px-2 py-3 form-textarea w-full h-40 border border-gray-300 rounded-md" readonly>{{ $form->reason }}</textarea>
                </div>

            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="address_furigana" class="block text font-medium text-gray-700 mb-1">休職中の連絡先(フリガナ)</label>
                    <input type="text" id="address_furigana" name="address_furigana" class="form-input w-full" value="{{ $form->address_furigana }}" readonly>
                </div>

            </div>



            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="address" class="block text font-medium text-gray-700 mb-1">休職中の連絡先</label>
                    <input type="text" id="address" name="address" class="form-input w-full" value="{{ $form->address }}" readonly>
                </div>
            </div>
            <div class="flex-1">
                <label for="phone_number" class="block text font-medium text-gray-700 mb-1">電話番号</label>
                <input type="text" id="phone_number" name="phone_number" class="form-input w-full" value="{{$form->phone_number  }}" readonly>
            </div>


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



    </form>

</x-app-layout>
