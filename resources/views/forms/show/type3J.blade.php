<x-app-layout>
    <h1>Form Type 3J</h1>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">

            <h1 class="text-3xl font-bold text-center mb-6">通勤手段変更届</h1>

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



            <div class="py-2 px-1 border">
                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700 mb-2">変更後通勤手段（いずれかに） </label>
                        <div class="flex flex-col space-y-2">
                            <div class="flex space-x-4">
                                <label class="flex items-center">
                                    <input type="radio" name="support1" value="1" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300"{{ $form->support1 == '1' ? 'checked' : '' }} disabled>
                                    <span class="ml-2 text-sm text-gray-700">1.自家用車（バイク等含む）</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="support1" value="0" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300" {{ $form->support1 == '0' ? 'checked' : '' }} disabled>
                                    <span class="ml-2 text-sm text-gray-700">2.公共交通機関</span>

                                </label>
                            </div>


                        </div>
                </div>

                <div class="mb-4 flex space-x-4">
                    <div class="flex-1">
                        <label for="other1" class="block text font-bold text-gray-700 mb-1">公共交通機関の場合は利用機関と駅名も記入してください</label>
                        <input type="text" id="other1" name="other1" class="form-input w-full" placeholder="例：（近鉄）松阪駅～津駅" value="{{ $form->other1 }}" readonly>
                    </div>

                </div>
            </div>

            <div class="py-2 px-1 border">
                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700 mb-2">変更後通勤手段（いずれかに） </label>
                        <div class="flex flex-col space-y-2">
                            <div class="flex space-x-4">
                                <label class="flex items-center">
                                    <input type="radio" name="support2" value="1" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300" {{ $form->support2=='1' ? 'checked' : ''}} disabled>
                                    <span class="ml-2 text-sm text-gray-700">1.自家用車（バイク等含む）</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="support2" value="0" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300" {{ $form->support2 =='0' ? 'checked' : ''}} disabled>
                                    <span class="ml-2 text-sm text-gray-700">2.公共交通機関</span>

                                </label>
                            </div>


                        </div>
                </div>

                <div class="mb-4 flex space-x-4">
                    <div class="flex-1">
                        <label for="other2" class="block text font-bold text-gray-700 mb-1">公共交通機関の場合は利用機関と駅名も記入してください</label>
                        <input type="text" id="other2" name="other2" class="form-input w-full"  placeholder="例：（近鉄）松阪駅～津駅" value="{{ $form->other2 }}" readonly>
                    </div>

                </div>
            </div>




            <div class="py-2 mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="reason" class="block text font-medium text-gray-700 mb-1">変更理由</label>
                    <textarea id="reason" name="reason"
                    class="mt-4 px-2 py-3 form-textarea w-full h-40 border border-gray-300 rounded-md" readonly>{{ $form->reason }}</textarea>
                </div>
            </div>


            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="special" class="block text font-medium text-gray-700 mb-1">特記事項</label>
                    <input type="text" id="special" name="special" class="form-input w-full" value="{{ $form->special }}" readonly>
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
