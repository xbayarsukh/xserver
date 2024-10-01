<x-app-layout>
    <div class="py-8">
        <div class="container mx-auto p-6">
            <div class="bg-white p-4 rounded-lg shadow-lg w-full max-w-sm mx-auto">
                <h1 class="text-3xl font-bold mb-4 text-center text-gray-800">編集行き先会社</h1>

                <form action="{{ route('actionSchedule.update', $actionSchedule->id) }}" method="POST" class="bg-white p-4 w-full max-w-md">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="offices" class="block text-gray-700 text-sm font-bold mb-2">営業所</label>
                        <select name="office_id" id="office_id" class="w-full border border-gray-500 py-2 px-4" required>
                            @foreach ($office as $office)
                            <option value="{{ $office->id }}" {{ $actionSchedule->office_id == $office->id ? 'selected' : '' }}>
                                {{ $office->office_name }}
                            </option>
                            @endforeach
                        </select>
                        @error('office_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">会社名</label>
                        <input type="text" name="name" id="name" value="{{ $actionSchedule->name }}" class="block w-full px-4 py-2 border border-gray-500 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                    </div>

                    <div class="py-2">
                        <x-button purpose="search" type="submit">
                            更新
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
