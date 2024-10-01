@extends('admin.dashboard')

@section('admin')


<div class="container mx-auto py-8">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <h1 class="text-xl font-mild mb-6">所属管理</h1>


        <h1 class="text-2xl font-bold mb-4">新規所属登録</h1>

        <form action="{{ route('admin.division.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="mb-4">
                <label for="office_id" class="block text-gray-700 text-sm font-bold mb-2">営業所名</label>



                <select name="office_id" id="office_id" class="form-select mt-1 block w-full sm:w-2/3 md:w-1/2 lg:w-1/3 border border-black focus:ring-opacity-80" required>
                    <option value="">選択</option>
                    @foreach($offices as $office)
                        <option value="{{ $office->id }}">{{  $office->corp->corp_name }} -- {{ $office->office_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">所属名</label>
                <input type="text" name="name" id="name" class="form-select mt-1 block w-full sm:w-2/3 md:w-1/2 lg:w-1/3 border border-black focus:ring-opacity-80" required>
            </div>





            <div class="flex justify-between">
                <x-button purpose="default" type="" href="{{ url('/admin/division') }}">
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


