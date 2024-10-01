
@extends('admin.dashboard')

@section('admin')


<div class="container mx-auto py-8">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <h1 class="text-xl font-mild mb-6">営業所管理</h1>


        <h1 class="text-2xl font-bold mb-4">営業所編集</h1>

        <form action="{{ route('admin.corp-office.offices.update', $office->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="corp_id" class="block text-gray-700 text-sm font-bold mb-2">会社</label>
                <select name="corp_id" id="corp_id" class="form-select mt-1 block w-full sm:w-2/3 md:w-1/2 lg:w-1/3 border border-black focus:ring-opacity-80" required>
                    <option value="">選択</option>
                    @foreach ($corps as $corp)
                        <option value="{{ $corp->id }}" {{ $office->corp_id == $corp->id ? 'selected' : '' }}>{{ $corp->corp_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group py-2">
                <label for="office_name" class="block text-gray-700 text-sm font-bold mb-2">営業所名:</label>
                <input type="text" class="form-select mt-1 block w-full sm:w-2/3 md:w-1/2 lg:w-1/3 border border-black focus:ring-opacity-80" id="office_name" name="office_name" value="{{ $office->office_name }}" required>
            </div>

            @if($office->image_path)
                <div class="mt-4">
                    <p class="text-gray-700 text-sm font-bold mb-2">現在の画像:</p>
                    <img src="{{ asset('storage/' . $office->image_path) }}" alt="{{ $office->office_name }}" class="max-w-xs">
                </div>
            @endif

            <div class="form-group py-2">
                <label for="office_image" class="block text-gray-700 text-sm font-bold mb-2">営業所画像:</label>
                <input type="file" class="form-input mt-1 block w-full sm:w-2/3 md:w-1/2 lg:w-1/3" id="office_image" name="office_image">
            </div>

            <div class="flex justify-between">
                <x-button purpose="default" type="button" href="{{ url('/admin/corp-office/offices') }}">
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




