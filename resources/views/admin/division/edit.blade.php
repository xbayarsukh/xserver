
@extends('admin.dashboard')

@section('admin')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<div class="container mx-auto py-8">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <h1 class="text-xl font-mild mb-6">所属管理</h1>


        <h1 class="text-2xl font-bold mb-4">所属編集</h1>

        <form action="{{ url('admin/division/'.$division->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')




            <div class="mb-4">
                <label for="corp_id" class="block text-gray-700 text-sm font-bold mb-2">営業所</label>
                <select name="corp_id" id="corp_id" class="form-select mt-1 block w-full sm:w-2/3 md:w-1/2 lg:w-1/3 border border-black focus:ring-opacity-80" required>
                    <option value="">選択</option>

                    @foreach ($offices as $office)
                    <option value="{{ $office->id }}" {{ $division->office_id == $office->id ? 'selected' : '' }}>{{ $office->office_name }}</option>
                @endforeach

                </select>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">所属名</label>
                <input type="text" name="name" id="name" class="form-select mt-1 block w-full sm:w-2/3 md:w-1/2 lg:w-1/3 border border-black focus:ring-opacity-80" value="{{ $division->name }}" required>
            </div>




            <div class="flex justify-between">
                <x-button purpose="default" type="" href="{{ url('/admin/division') }}">
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






