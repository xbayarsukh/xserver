@extends('admin.dashboard')

@section('admin')


<div class="container mx-auto py-8">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <h1 class="text-2xl font-bold mb-6">新規時間設定</h1>


        <form action="{{ route('admin.calculations.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="mb-4">

                <label for="corp_id" class="block text-gray-700 text-sm font-bold mb-2">会社:</label>
                    <select class="form-select mt-1 block  border border-black" id="corps_id" name="corps_id" required>
                        <option value="">会社を選択</option>
                             @foreach ($corps as $corp)
                        <option value="{{ $corp->id }}">{{ $corp->corp_name }}</option>
                              @endforeach
                     </select>
             </div>


            <div>
                <label for="tsag" class="block text-gray-700 font-bold mb-2">時刻:</label>
                <input type="time" name="tsag" id="tsag" required class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <label for="value" class="block text-gray-700 font-bold mb-2">名:</label>
                <input type="text" name="value" id="value" required class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <label for="number" class="block text-gray-700 font-bold mb-2">数字:</label>
                <input type="number" step="0.01" name="number" id="number" required class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>


            <div class="flex justify-between">
                <x-button purpose="default" type="" href="{{ url('/admin/calculations/') }}">
                    戻る
                </x-button>
                <x-button purpose="search" type="submit">
                    追加
                </x-button>

            </div>

        </form>
    </div>
</div>
@endsection

