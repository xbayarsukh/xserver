<x-app-layout>
    @php
        $currentDate = $startDate->copy();
    @endphp




    @while ($currentDate <= $endDate)
        <!-- Render attendance records for the current date -->
        @php
            $currentDate->addDay();
        @endphp
    @endwhile

    <div class="flex flex-wrap">
        @foreach ($users as $user)
            <div class="p-3">
                @include('calendar-table', [
                    'user' => $user,
                    'startDate' => $startDate,
                    'endDate' => $endDate,

                ])
            </div>

        @endforeach
    </div>

    <div class="mt-4">
        {{ $users->appends(request()->except('page'))->links() }}
    </div>


</x-app-layout>
