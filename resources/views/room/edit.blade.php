<x-app-layout>
    <div class="py-8">

                <div class="p-6 bg-gray-100 border-b border-gray-200">
                    <h2 class="text-3xl font-bold mb-4 text-center text-gray-800">会議室編集</h2>

                    <div class="bg-white p-4 rounded-lg shadow-lg w-full max-w-sm mx-auto">

                        <form action="{{ route('room.update', $room->id) }}" method="POST" class="bg-white  p-4 rounded-lg w-full max-w-md">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">会議室名</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $room->name) }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-500 ">
                            </div>
                            <div class="mb-4">
                                <label for="office_id" class="block text-sm font-medium text-gray-700">営業所</label>
                                <select name="office_id" id="office_id" required class="mt-1 block w-full py-2 px-3 border border-gray-500 bg-white  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach($offices as $office)
                                        <option value="{{ $office->id }}" {{ old('office_id', $room->office_id) == $office->id ? 'selected' : '' }}>
                                            {{ $office->office_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Add any other fields that are part of the room model -->
                            <div class="py-2">
                                <x-button purpose="search" type="submit">
                                更新する

                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
