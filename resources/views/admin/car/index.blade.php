@extends('admin.dashboard')

@section('admin')
<div class="container mx-auto py-8 px-4">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
        <h1 class="text-2xl font-bold mb-2 sm:mb-0">Car</h1>
        <a href="{{ route('admin.car.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full sm:w-auto text-center">Create New car</a>
    </div>

    <div class="bg-white shadow-md rounded overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Order</th>
                    <th class="px-4 py-2">Car ID</th>
                    <th class="px-4 py-2">Plate</th>
                    <th class="px-4 py-2">Type</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cars as $car)
                    <tr class="hover:bg-gray-100">
                        <td class="border px-4 py-2">{{ $car->id }}</td>
                        <td class="border px-4 py-2">{{ $car->car_id }}</td>
                        <td class="border px-4 py-2">{{ $car->number_plate }}</td>
                        <td class="border px-4 py-2">{{ $car->car_type }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex flex-col sm:flex-row justify-center items-center space-y-2 sm:space-y-0 sm:space-x-2">
                                <a href="{{ route('admin.car.show', $car->id) }}" class="text-blue-500 hover:text-blue-700">View</a>
                                <a href="{{ route('admin.car.edit', $car->id) }}" class="text-green-500 hover:text-green-700">Edit</a>
                                <form action="{{ route('admin.car.destroy', $car->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('本当に消去しますか?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border px-4 py-2 text-center">No car found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    @media (max-width: 640px) {
        table {
            font-size: 0.875rem;
        }
        th, td {
            padding: 0.5rem 0.25rem;
        }
        .container {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }
    }
</style>
@endsection
