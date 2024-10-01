@extends('admin.dashboard')

@section('admin')


<div class="container mx-auto py-8">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <h1 class="text-xl font-mild mb-6">勤怠届分管理</h1>


        <h1 class="text-2xl font-bold mb-4">勤怠届新規</h1>

        <form action="{{ route('admin.time_off.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="mb-4">
                <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">社員選択</label>

                <select name="user_id" id="user_id"  class="form-select mt-1 block w-full sm:w-2/3 md:w-1/2 lg:w-1/3 border border-black focus:ring-opacity-80" required>
                    <option value="">選択</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="attendance_type_records_id" class="block text-gray-700 text-sm font-bold mb-2">勤怠区分選択</label>
                <select name="attendance_type_records_id" id="attendance_type_records_id"  class="form-select mt-1 block w-full sm:w-2/3 md:w-1/2 lg:w-1/3 border border-black focus:ring-opacity-80" required>
                    <option value="">選択</option>
                    @foreach ($attendanceTypeRecords as $attendanceType)
                        <option value="{{ $attendanceType->id }}">{{ $attendanceType->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">日付選択</label>
                <input type="date" name="date" id="date"  class="form-select mt-1 block w-full sm:w-2/3 md:w-1/2 lg:w-1/3 border border-black focus:ring-opacity-80" required>
            </div>


            <div class="flex justify-between">
                <x-button purpose="default" type="" href="{{ url('/admin/time_off/') }}">
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
