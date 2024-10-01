<x-app-layout>
    <h1>2C</h1>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
            <h1 class="text-3xl font-bold text-center mb-6">営業費使用伺書</h1>

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

            <select name="select" id="select" class="form-select rounded-md shadow-sm" disabled>
                <option value="" disabled selected>選択</option>
                @foreach (['雑費','事務用品費','販売促進費','厚生費','建物等補修費','社員教育費','消耗油脂費','仮払金'] as $option)
                    <option value="{{ $option }}" {{ $form->select === $option ? 'selected' : ''}}>{{ $option }}</option>
                @endforeach

            </select>

            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="sent_to" class="block text font-medium text-gray-700 mb-1">相手先</label>
                    <input type="text" id="sent_to" name="sent_to" class="form-input w-full" value="{{ $form->sent_to }}" readonly>
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="product_name" class="block text font-medium text-gray-700 mb-1">品名</label>
                    <input type="text" id="product_name" name="product_name" class="form-input w-full" value="{{ $form->product_name }}" readonly>
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="number" class="block text font-medium text-gray-700 mb-1">数量</label>
                    <input type="number" id="number" name="number" class="form-input w-full" value="{{ $form->number }}" readonly>
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="price" class="block text font-medium text-gray-700 mb-1">金額</label>
                    <input type="number" id="price" name="price" class="form-input w-full" value="{{ $form->price }}" readonly>
                </div>
            </div>


                <input type="text" id="memo1" name="memo1" class="mb-4 form=input w-full" value="{{ $form->memo1 }}" readonly>
                <input type="text" id="memo2" name="memo2" class="mb-4 form=input w-full" value="{{ $form->memo2 }}" readonly>
                <input type="text" id="memo3" name="memo3" class="mb-4 form=input w-full" value="{{ $form->memo3 }}" readonly>
                <input type="text" id="memo4" name="memo4" class="mb-4 form=input w-full" value="{{ $form->memo4 }}" readonly>
                <input type="text" id="memo5" name="memo5" class="mb-4 form=input w-full" value="{{ $form->memo5 }}" readonly>







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


    </form>

</x-app-layout>
