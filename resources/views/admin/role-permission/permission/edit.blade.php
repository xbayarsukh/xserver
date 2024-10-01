@extends('admin.dashboard')

@section('admin')
    <div class="container mx-auto py-8">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
            <h1 class="text-xl font-mild mb-6">許可管理</h1>


            <h1 class="text-2xl font-bold mb-4">許可編集</h1>

            <form action="{{ url('admin/role-permission/permissions/' . $permission->id) }}" method="POST" class="space-y-4">
                @csrf

                @method('PUT')

                <div class="mb-4">
                    <label for="office_id" class="block text-gray-700 text-sm font-bold mb-2">許可名前</label>


                    <input type="text" name="name" id="name"
                        class="form-select mt-1 block w-full sm:w-2/3 md:w-1/2 lg:w-1/3 border border-black focus:ring-opacity-80"
                        required value="{{ $permission->name }}">
                </div>

                <div class="flex justify-between">
                    <x-button purpose="default" type="" href="{{ url('/admin/role-permission/permissions') }}">
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
