@extends('admin.dashboard')

@section('admin')


<div class="container mx-auto py-8">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <h1 class="text-2xl font-bold mb-6">時間設定変更</h1>


        <form action="{{ route('admin.calculations.update', $calculation->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="tsag" class="block text-gray-700 font-bold mb-2">時刻:</label>
                <input type="time" name="tsag" id="tsag" value="{{ $calculation->tsag }}" required class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <label for="value" class="block text-gray-700 font-bold mb-2">名:</label>
                <input type="text" name="value" id="value" value="{{ $calculation->value }}" required class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <label for="number" class="block text-gray-700 font-bold mb-2">数字:</label>
                <input type="number" step="0.01" name="number" id="number" value="{{ $calculation->number }}" required class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
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
