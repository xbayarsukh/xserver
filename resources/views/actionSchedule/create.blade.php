<x-app-layout>
    <div class="py-8">
        <div class="container mx-auto p-6">


                      <div class="bg-white p-4 rounded-lg shadow-lg w-full max-w-sm mx-auto">
                        <h1 class="text-3xl font-bold mb-4 text-center text-gray-800">新規行き先会社</h1>

                        <form action="{{ route('actionSchedule.store') }}" method="POST" class="bg-white  p-4  w-full max-w-md">
                            @csrf

                            <div class="mb-4">
                                <label for="offices" class="block text-gray-700 text-sm font-bold mb-2">営業所</label>
                                <select name="office_id_display" id="office_id" class="w-full border border-gray-500 py-2 px-4" disabled>
                                    <option value="">営業所選択</option>
                                    @foreach ($office as $office)
                                    <option value="{{ $office->id }}"
                                        {{ (old('office_id') == $office->id || $selectedOfficeId == $office->id) ? 'selected' : ''}}>
                                        {{ $office->office_name }}
                                    </option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="office_id" value="{{ old('office_id', $selectedOfficeId) }}">
                                @error('office_id')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">会社名</label>
                                <input type="text" name="name" id="name" class="block w-full px-4 py-2 border border-gray-500 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                            </div>
                            {{-- <button type="submit" class="mt-4 bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded w-full hover:text-black">保存</button> --}}
                          <div class="py-2">
                            <x-button purpose="search" type="submit">
                                保存

                            </x-button>

                          </div>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    </div>
    </div>

</x-app-layout>
