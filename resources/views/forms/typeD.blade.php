<x-app-layout>
    <h1>Form Type D</h1>

    <form action="{{ route('forms.store', '3A') }}" method="POST">
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
            <h1 class="text-3xl font-bold text-center mb-6">（月実績分）長時間労働者 問診票</h1>



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



            <div class="flex-1 py-4">
                <label for="age" class="block text font-medium text-gray-700 mb-1">年齢</label>
                <input type="text" id="age" name="age" class="form-input  p-2">
                </div>

                <div class="mb-4 flex space-x-4 items-center">
                    <div class="flex-1">
                        <select name="" id="" class="form-input w-full p-2">
                            <option value="" class=>month(default-aar latest month)</option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center space-x-2">
                            <label for="start_time" class="block text font-medium text-gray-700">労働時間超過分</label>
                            <input type="text" id="age" name="age" class="form-input w-full p-2">
                        </div>
                    </div>
                </div>


            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                <label for="start_time" class="block text font-medium text-gray-700 mb-1">早出</label>
                <input type="string" id="age" name="age" class="form-input ">
                </div>

                <div class="flex-1">
                <label for="start_time" class="block text font-medium text-gray-700 mb-1">定時超①</label>
                <input type="string" id="age" name="age" class="form-input ">
                </div>
                <div class="flex-1">
                <label for="start_time" class="block text font-medium text-gray-700 mb-1">定時超②</label>
                <input type="string" id="age" name="age" class="form-input ">
                </div>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                <label for="start_time" class="block text font-medium text-gray-700 mb-1">記入日</label>
                <input type="date" id="date" name="date" class="form-input w-full">
                </div>
            </div>


            <div class="px-2 py-2">
                <label for=""class="text font-lg">最近２週間の体調・状況についてあてはまるものに、☑をつけて下さい。</label>
            <p>radiobuttonoor ali negiin songdog bolgoh</p>
            </div>


            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">1.食欲がない</label>
                <div class="flex space-x-4">
                    <label class="flex items-center">
                        <input type="radio" name="appetite1" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">いつも</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="appetite1" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">ときどき</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="appetite1" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">重度</span>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">2.胃腸の調子が悪い</label>
                <div class="flex space-x-4">
                    <label class="flex items-center">
                        <input type="radio" name="appetite2" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">いつも</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="appetite2" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">ときどき</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="appetite2" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">重度</span>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">3.肩または首、腰などが凝る</label>
                <div class="flex space-x-4">
                    <label class="flex items-center">
                        <input type="radio" name="appetite3" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">いつも</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="appetite3" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">ときどき</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="appetite3" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">重度</span>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">4.体がだるい</label>
                <div class="flex space-x-4">
                    <label class="flex items-center">
                        <input type="radio" name="appetite4" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">いつも</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="appetite4" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">ときどき</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="appetite4" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">重度</span>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">5.頭痛がする</label>
                <div class="flex space-x-4">
                    <label class="flex items-center">
                        <input type="radio" name="appetite5" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">いつも</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="appetite5" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">ときどき</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="appetite5" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">重度</span>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">6.寝付けない、またはぐっすり眠れない</label>
                <div class="flex space-x-4">
                    <label class="flex items-center">
                        <input type="radio" name="appetite6" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">いつも</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="appetite6" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">ときどき</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="appetite6" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">重度</span>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">7.憂うつだ</label>
                <div class="flex space-x-4">
                    <label class="flex items-center">
                        <input type="radio" name="appetite7" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">いつも</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="appetite7" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">ときどき</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="appetite7" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">重度</span>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">8.不安だ、またはイライラする</label>
                <div class="flex space-x-4">
                    <label class="flex items-center">
                        <input type="radio" name="appetite8" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">いつも</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="appetite8" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">ときどき</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="appetite8" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">重度</span>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">9.考えがまとまらない</label>
                <div class="flex space-x-4">
                    <label class="flex items-center">
                        <input type="radio" name="appetite9" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">いつも</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="appetite9" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">ときどき</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="appetite9" value="none" class="form-radio h-4 w-4 text-green-300 focus:ring-green-300">
                        <span class="ml-2 text-sm text-gray-700">重度</span>
                    </label>
                </div>
            </div>

             <div class="mb-4">
                <label for="reason" class="block text-gray-700 text-sm mb-2">10.長時間労働になった原因（ここは必ず記入してください）</label>

                <textarea id="reason" name="reason" class="mt-2 px-2 py-3 form-textarea w-full h-20 border border-gray-300 rounded-md"></textarea>
            </div>

             <div class="mb-4">
                <label for="reason" class="block text-gray-700 text-sm mb-2">11.今後の改善策（所長と相談の上、記入してください）（ここは必ず記入してください）</label>

                <textarea id="reason" name="reason" class="mt-2 px-2 py-3 form-textarea w-full h-20 border border-gray-300 rounded-md"></textarea>
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

</x-app-layout>
