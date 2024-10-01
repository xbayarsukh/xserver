@extends('admin.dashboard')

@section('admin')





            @if (session('success'))
            <div class="bg-green-400 alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-200 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        <div class="max-w-6xl mx-auto p-8 bg-white shadow-lg rounded-xl mt-10">
            <h2 class="text-center text-2xl font-semibold text-blue-600 mb-4">家族情報</h2>

            <p class="text-lg text-gray-600 mb-6 text-center font-semibold">家族データ</p>



               <form action="" method="POST">
                @csrf


             <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="employee_number" class="block text-sm font-medium text-gray-700 mb-1 py-2">社員番号</label>
                    <input type="number" id="employee_number" name="employee_number" placeholder="100001" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                </div>
                <div>
                    <label for="employee_name" class="block text-sm font-medium text-gray-700 mb-1 py-2">社員氏名</label>
                    <input type="text" id="employee_name" name="employee_name" placeholder="" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                </div>
            </div>


                <h2 class="text-center font-semibold mb-2 mt-4">family</h2>


            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">





                <div>
                    <label for="employee_number" class="block text-sm font-medium text-gray-700 mb-1 py-2">家族：氏名</label>
                    <input type="name" id="employee_number" name="employee_number" placeholder="1" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                </div>



                <div>
                    <label for="employee_number" class="block text-sm font-medium text-gray-700 mb-1 py-2">家族：続柄</label>
                    <input type="name" id="employee_number" name="employee_number" placeholder="1" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">


                </div>

                <div>
                    <label for="employee_number" class="block text-sm font-medium text-gray-700 mb-1 py-2">家族：生年月日</label>
                    <input type="date" id="employee_number" name="employee_number" placeholder="1" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">


                </div>

                <div>
                    <label for="employee_number" class="block text-sm font-medium text-gray-700 mb-1 py-2">家族：扶養区分</label>
                    <input type="text" id="employee_number" name="employee_number" placeholder="1" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                </div>

                <div>
                    <label for="employee_number" class="block text-sm font-medium text-gray-700 mb-1 py-2">家族：同居老親区分</label>
                    <input type="text" id="employee_number" name="employee_number" placeholder="1" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">

                </div>


                <div>
                    <label for="employee_number" class="block text-sm font-medium text-gray-700 mb-1 py-2">家族：障害者区分</label>
                    <input type="text" id="employee_number" name="employee_number" placeholder="1" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">

                </div>

                <div>
                    <label for="employee_number" class="block text-sm font-medium text-gray-700 mb-1 py-2">住所区分</label>
                    <input type="text" id="employee_number" name="employee_number" placeholder="1" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">

                </div>

                <div>
                    <label for="employee_number" class="block text-sm font-medium text-gray-700 mb-1 py-2">家族：住所</label>
                    <input type="text" id="employee_number" name="employee_number" placeholder="三重県津市乙部45－２３1" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">

                </div>

                <div>
                    <label for="employee_number" class="block text-sm font-medium text-gray-700 mb-1 py-2">家族：見積所得</label>
                    <input type="text" id="employee_number" name="employee_number" placeholder="三重県津市乙部45－２３1" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">

                </div>
                <div>
                    <label for="employee_number" class="block text-sm font-medium text-gray-700 mb-1 py-2">家族：社会保険被扶養者区分</label>
                    <select name="" id="" required class="form-select block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out appearance-none">
                        <option value="">選択</option>
                        <option value="">被扶養者</option>
                        <option value="">対象外</option>
                    </select>
                </div>

                <div>
                    <label for="employee_number" class="block text-sm font-medium text-gray-700 mb-1 py-2">家族：氏名フリガナ</label>
                    <input type="text" id="employee_number" name="employee_number" placeholder="" class="form-input mt-1 block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">

                </div>




            </div>
            <x-button purpose="search" type="submit" class="mt-2">
                保存
            </x-button>


    </div>






@endsection
