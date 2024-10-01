@extends('admin.dashboard')

@section('admin')

<div class="bg-gray-300">

    <div class="container mx-auto" style="border: 1px solid #ccc;">

        <div class="container mt-0 py-4 px-4" style="border: 1px solid #ccc;">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 bg-gray-300 py-2" style="border: 1px solid #ccc;">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-300 shadow sm:rounded-lg" style="border: 1px solid #ccc;">
                    <a href="{{ url('/admin/car') }}" class="bg-stone-400 hover:bg-stone-500 font-semibold text-white hover:text-black font py-2 px-3 rounded mb-4 inline-block w-24 h-10 text-center float-end">戻る</a>
                    <h1 class="text-2xl font-bold mb-4 text-left">Car Details</h1>

                    <div class="mb-4" style="border: 1px solid #ccc;">
                        <strong>車 ID:</strong>
                        <p>{{ $car->car_id }}</p>
                    </div>

                    <div class="mb-4" style="border: 1px solid #ccc;">
                        <strong>車のナンバープレート:</strong>
                        <p>{{ $car->number_plate }}</p>
                    </div>

                    <div class="mb-4" style="border: 1px solid #ccc;">
                        <strong>車種</strong>
                        <p>{{ $car->car_type }}</p>
                    </div>

                    <div class="mb-4" style="border: 1px solid #ccc;">
                        <strong>車の製造年:</strong>
                        <p>{{ $car->car_made_year }}</p>
                    </div>

                    <div class="mb-4" style="border: 1px solid #ccc;">
                        <strong>自動車保険会社:</strong>
                        <p>{{ $car->car_insurance_company }}</p>
                    </div>

                    <div class="mb-4" style="border: 1px solid #ccc;">
                        <strong>自動車保険期間開始</strong>
                        <p>{{ $car->car_insurance_start }}</p>
                    </div>

                    <div class="mb-4" style="border: 1px solid #ccc;">
                        <strong>自動車保険期間終了</strong>
                        <p>{{ $car->car_insurance_end }}</p>
                    </div>

                    <div class="mb-4" style="border: 1px solid #ccc;">
                        <strong>Etc:</strong>
                        <p>{{ $car->etc }}</p>
                    </div>

                    <div class="mb-4" style="border: 1px solid #ccc;">
                        <strong>車の詳細</strong>
                        <p>{{ $car->car_detail }}</p>
                    </div>

                    <div class="mb-4">
                        <img src="{{ asset($car->image_path) }}" alt="Car Image" class="max-w-full h-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
