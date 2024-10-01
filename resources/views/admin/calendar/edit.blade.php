@extends('admin.dashboard')

@section('admin')
    <div class="py-20 bg-gray-300 shadow-sm min-h-screen">
        <div class="bg-gray-100 p-4 rounded-lg shadow-lg mx-auto">
            <h2 class="text-xl font-semibold mb-4 text-center">Edit Holiday</h2>
            <form action="{{ route('admin.calendar.holiday.update', $holiday->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Form fields for corp, office, and vacation date -->
            </form>
        </div>
    </div>
@endsection
