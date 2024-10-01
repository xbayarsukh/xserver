
@extends('admin.dashboard')

@section('admin')


<div class="container mx-auto py-8">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <h1 class="text-xl font-mild mb-6">会社管理</h1>


        <h1 class="text-2xl font-bold mb-4">会社編集</h1>

        <form action="{{ url('admin/corp-office/corps/'.$corp->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="form-group py-2">
                <label for="office_name" class="block text-gray-700 text-sm font-bold mb-2">営業所名:</label>
                <input type="text" class="form-select mt-1 block w-full sm:w-2/3 md:w-1/2 lg:w-1/3 border border-black focus:ring-opacity-80" id="corp_name" name="corp_name" value="{{ $corp->corp_name }}" required>
            </div>




            <div class="flex justify-between">
                <x-button purpose="default" type="" href="{{ url('/admin/corp-office/corps') }}">
                    戻る
                </x-button>
                <x-button purpose="search" type="submit">
                    会社変更
                </x-button>

            </div>

        </form>
    </div>


    </div>
@endsection




