@extends('admin.dashboard')

@section('admin')
    <div class="container mx-auto py-8">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
            <h1 class="text-xl font-mild mb-6">権限管理</h1>


            <h1 class="text-2xl font-bold mb-4">権限編集</h1>

            <form action="{{ url('/admin/role-permission/roles/'.$role->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="office_id" class="block text-gray-700 text-sm font-bold mb-2">権限名前</label>


                    <input type="text" name="name" id="name"
                    class="form-select mt-1 block w-full sm:w-2/3 md:w-1/2 lg:w-1/3 border border-black focus:ring-opacity-80" value="{{ $role->name }}" required>
                </div>

                <div class="flex justify-between">
                    <x-button purpose="default" type="" href="{{ url('/admin/role-permission/roles') }}">
                        戻る
                    </x-button>
                    <x-button purpose="search" type="submit">
                   保存
                    </x-button>

                </div>

            </form>
        </div>


    </div>
@endsection






