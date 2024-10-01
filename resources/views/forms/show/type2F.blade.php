<x-app-layout>
    <h1>2F</h1>

         <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
            <h1 class="text-3xl font-bold text-center mb-6">社内備品私的利用許可申請書</h1>

            <h2 class="text-xl font-medium text-left mb-4"> 菱工産業株式会社 経理課 御中</h2>

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

            <div>
                <h1 class="text-xl font-medium text-center mb-4">社内備品の私的利用許可を申請致します。</h1>
            </div>


            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="date_from" class="block text font-medium text-gray-700 mb-1">使用開始日</label>
                    <input type="date" id="date_from" name="date_from" class="form-input w-full" value="{{ $form->date_from }}" readonly>
                </div>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="date_to" class="block text font-medium text-gray-700 mb-1">使用終了日</label>
                    <input type="date" id="date_to" name="date_to" class="form-input w-full" value="{{ $form->date_to }}" readonly>
                </div>
            </div>


            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="rent_name" class="block text font-medium text-gray-700 mb-1">備品名</label>
                    <input type="text" id="rent_name" name="rent_name" class="form-input w-full" value="{{ $form->rent_name }}" readonly>
                </div>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="reason" class="block text font-medium text-gray-700 mb-1">社内備品を私的利用する 理由と目的</label>
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
