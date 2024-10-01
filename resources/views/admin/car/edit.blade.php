@extends('admin.dashboard')

@section('admin')

<div class="bg-gray-300">
    <div class="container mx-auto" style="border: 1px solid #ccc;">
        <div class="container mt-0 py-4 px-4" style="border: 1px solid #ccc;">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 bg-gray-300 py-2" style="border: 1px solid #ccc;">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-300 shadow sm:rounded-lg" style="border: 1px solid #ccc;">
                    <a href="{{ url('/admin/car') }}" class="bg-stone-400 hover:bg-stone-500 font-semibold text-white hover:text-black font py-2 px-3 rounded mb-4 inline-block w-24 h-10 text-center float-end">戻る</a>
                    <h1 class="text-2xl font-bold mb-4 text-left">Edit Car</h1>

                    <form action="{{ route('admin.car.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4" style="border: 1px solid #ccc;">
                            <label for="car_id" class="block text-gray-700 text-sm font-bold mb-2">Car ID</label>
                            <input type="text" name="car_id" id="car_id" class="form-input w-full" value="{{ $car->car_id }}" required>
                        </div>

                        <div class="mb-4" style="border: 1px solid #ccc;">
                            <label for="number_plate" class="block text-gray-700 text-sm font-bold mb-2">Plate</label>
                            <input type="text" name="number_plate" id="number_plate" class="form-input w-full" value="{{ $car->number_plate }}" required>
                        </div>

                        <div class="mb-4" style="border: 1px solid #ccc;">
                            <label for="car_type" class="block text-gray-700 text-sm font-bold mb-2">Car Type</label>
                            <input type="text" name="car_type" id="car_type" class="form-input w-full" value="{{ $car->car_type }}" required>
                        </div>

                        <div class="mb-4" style="border: 1px solid #ccc;">
                            <label for="car_made_year" class="block text-gray-700 text-sm font-bold mb-2">Car Made Year</label>
                            <input type="text" name="car_made_year" id="car_made_year" class="form-input w-full" value="{{ $car->car_made_year }}" required>
                        </div>

                        <div class="mb-4" style="border: 1px solid #ccc;">
                            <label for="car_insurance_company" class="block text-gray-700 text-sm font-bold mb-2">Car Insurance Company</label>
                            <input type="text" name="car_insurance_company" id="car_insurance_company" class="form-input w-full" value="{{ $car->car_insurance_company }}" required>
                        </div>

                        <div class="mb-4" style="border: 1px solid #ccc;">
                            <label for="car_insurance_start" class="block text-gray-700 text-sm font-bold mb-2">Car Insurance Start</label>
                            <input type="date" name="car_insurance_start" id="car_insurance_start" class="form-input w-full" value="{{ $car->car_insurance_start }}" required>
                        </div>

                        <div class="mb-4" style="border: 1px solid #ccc;">
                            <label for="car_insurance_end" class="block text-gray-700 text-sm font-bold mb-2">Car Insurance End</label>
                            <input type="date" name="car_insurance_end" id="car_insurance_end" class="form-input w-full" value="{{ $car->car_insurance_end }}" required>
                        </div>

                        <div class="mb-4" style="border: 1px solid #ccc;">
                            <label for="etc" class="block text-gray-700 text-sm font-bold mb-2">Etc</label>
                            <input type="text" name="etc" id="etc" class="form-input w-full" value="{{ $car->etc }}" required>
                        </div>

                        <div class="mb-4" style="border: 1px solid #ccc;">
                            <label for="image_path" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                            <input type="file" name="image_path" id="image_path" class="form-input w-full">
                            @if($car->image_path)
                                <img src="{{ asset($car->image_path) }}" alt="Current Car Image" class="mt-2 max-w-xs">
                            @endif
                        </div>

                        <div class="mb-4" style="border: 1px solid #ccc;">
                            <label for="car_detail" class="block text-gray-700 text-sm font-bold mb-2">Car Detail</label>
                            <textarea name="car_detail" id="car_detail" cols="30" rows="10" class="form-input w-full">{{ $car->car_detail }}</textarea>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update Car
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
