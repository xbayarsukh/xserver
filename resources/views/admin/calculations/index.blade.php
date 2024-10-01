@extends('admin.dashboard')

@section('admin')
<div class="container mx-auto py-20">


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($corps as $corp)
            <div class="bg-white shadow-md rounded-lg p-4 hover:bg-gray-200 flex flex-col items-center">
                <h2 class="text-xl font-semibold mb-2 text-center">{{ $corp->corp_name }}</h2>
                <a href="{{ route('admin.calculations.show', $corp->id) }}" class="text-green-500 hover:text-green-600 block">営業時刻設定</a>
            </div>
        @endforeach
    </div>
</div>

@endsection
