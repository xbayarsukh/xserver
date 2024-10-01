
<x-app-layout>
    <div class="container mx-auto py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-4">
            @foreach($office as $office)
            <a href="{{ route('actionSchedule.show', $office) }}"
                class="block col-span-1 h-40 sm:h-50 lg:h-60 relative overflow-hidden rounded-lg cursor-pointer group border bg-white shadow-md transform transition-transform hover:scale-105 hover:shadow-2xl hover:-translate-y-2">

                <!-- Background Image -->
                <div class="absolute inset-0 bg-opacity-100 bg-cover bg-center transition-transform duration-500 group-hover:scale-110">
                    @if($office->image_path)
                        <img src="{{ asset('storage/' . $office->image_path) }}"
                             class="object-cover w-full h-full opacity-90"
                             alt="{{ $office->office_name }}">
                    @else
                        <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                            <!-- Placeholder if no image -->
                        </div>
                    @endif

                    <!-- Light Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-100 via-transparent to-transparent"></div>
                </div>

                <!-- Text Content with Readability -->
                <div class="relative h-full flex flex-col items-center justify-center p-4">
                    <h2 class="text-3xl font-bold text-gray-900 transition-opacity duration-500 group-hover:opacity-100">
                        <span style="color: rgb(100, 138, 194); font-size: 1.25rem;">{{ $office->corp->corp_name }}</span>
                        <br>{{ $office->office_name }}
                    </h2>
                </div>
            </a>



            @endforeach
        </div>
    </div>
</x-app-layout>



