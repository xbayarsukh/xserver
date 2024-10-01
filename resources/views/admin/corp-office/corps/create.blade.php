


@extends('admin.dashboard')

@section('admin')


<div class="container mx-auto py-8">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <h1 class="text-xl font-mild mb-6">会社管理</h1>


        <h1 class="text-2xl font-bold mb-4">新規会社登録</h1>

        <form action="{{ route('admin.corp-office.corps.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="mb-4">
                <label for="corp_id" class="block text-gray-700 text-sm font-bold mb-2">会社名前</label>

                <input type="text" name="corp_name" id="corp_name" class="form-select mt-1 block w-full sm:w-2/3 md:w-1/2 lg:w-1/3 border border-black focus:ring-opacity-80" required>

            </div>





            <div class="flex justify-between">
                <x-button purpose="default" type="" href="{{ url('/admin/corp-office/corps') }}">
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




