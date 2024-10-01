<x-app-layout>
    <h1>Form Type 3H</h1>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
            <h1 class="text-3xl font-bold text-center mb-6">氏名変更届</h1>



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
                    <label for="change_date" class="block text font-medium text-gray-700 mb-1">変更年月日</label>
                    <input type="date" id="change_date" name="change_date" class="form-input w-full" value="{{ $form->change_date }}" readonly>
                </div>

            </div>


            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="changed_name_furigana" class="block text font-medium text-gray-700 mb-1">変更後氏名(フリガナ)</label>
                    <input type="text" id="changed_name_furigana" name="changed_name_furigana" class="form-input w-full" value="{{ $form->changed_name_furigana }}" readonly>
                </div>

            </div>



            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="changed_name" class="block text font-medium text-gray-700 mb-1">変更後氏名</label>
                    <input type="text" id="changed_name" name="changed_name" class="form-input w-full" value="{{ $form->changed_name }}" readonly>
                </div>
            </div>


            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="before_name_furigana" class="block text font-medium text-gray-700 mb-1">変更前氏名(フリガナ)</label>
                    <input type="text" id="before_name_furigana" name="before_name_furigana" class="form-input w-full" value="{{ $form->before_name_furigana }}" readonly>
                </div>

            </div>



            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="before_name" class="block text font-medium text-gray-700 mb-1">変更前氏名</label>
                    <input type="text" id="before_name" name="before_name" class="form-input w-full" value="{{ $form->before_name }}" readonly>
                </div>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="reason" class="block text font-medium text-gray-700 mb-1">変更理由</label>
                    <textarea id="reason" name="reason"
                    class="mt-4 px-2 py-3 form-textarea w-full h-40 border border-gray-300 rounded-md"  readonly>{{ $form->reason }}</textarea>
                </div>

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
