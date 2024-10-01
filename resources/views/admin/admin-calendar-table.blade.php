<!--admin -->
<!-- calendar-table.blade.php -->
<div class="table-container sm:inline-block sm:mr-4 mb-4">
    <table class="border-collapse w-full">
        <thead>
            <tr class=" border border-gray-400">
                <th colspan="3" class="bg-orange-200 font-bold py-2 px-4">社員氏名: {{ $user->name }}</th>
                <th colspan="3" class="bg-orange-200 font-bold py-2 px-4">社員番号: {{ $user->id }}</th>
            </tr>
            <tr>
                <th class="bg-white border border-gray-400 text-left py-2 px-4 uppercase font-semibold text-xs">日付け</th>
                <th class="bg-white border border-gray-400 text-left py-2 px-4 uppercase font-semibold text-xs">勤怠区分</th>
                <th class="bg-white border border-gray-400 text-left py-2 px-4 uppercase font-semibold text-xs">始業時刻</th>
                <th class="bg-white border border-gray-400 text-left py-2 px-4 uppercase font-semibold text-xs">終業時刻</th>
                <th class="bg-white border border-gray-400 text-left py-2 px-4 uppercase font-semibold text-xs">労働時間</th>

            </tr>
        </thead>


        <tbody class="bg-white">
            @php

            $currentDate=$startDate->copy();
            $totalMinutesForMonth=0;

            @endphp

            @while ($currentDate <= $endDate)

            @php
            $dayOfWeek = $currentDate->dayOfWeek;
            $isHoliday = false; // Add your holiday check logic here

            // Determine the day color based on the day of the week or if it's a holiday
            $dayColor = '';
            if (in_array($dayOfWeek, [0, 6]) || $isHoliday) {
                $dayColor = ($dayOfWeek == 0) ? 'bg-red-100' : (($dayOfWeek == 6) ? 'bg-blue-100' : '');
            }
        @endphp

                  <tr class="transition-colors duration-300 ease-in-out {{ $dayColor }}">
        <td class="border border-gray-400 text-left py-2 px-4 uppercase font-semibold text-xs">
            {{ $currentDate->format('m/d') }} ({{ $currentDate->isoFormat('dd') }})
        </td>



                    <td class="border border-gray-400 text-left py-2 px-4 uppercase font-semibold text-xs">
                        @php
                            $timeOffRecordForDay = $user->timeOffRequestRecords->where('date', $currentDate->format('Y-m-d'))->first();
                        @endphp
                        @if ($timeOffRecordForDay)
                            {{ $timeOffRecordForDay->attendanceTypeRecord->name }}
                        @endif
                    </td>
                    <td class="border border-gray-400 text-left py-2 px-4 uppercase font-semibold text-xs">
                        @php
                            $arrivalRecord = $user->userArrivalRecords()
                                ->where('recorded_at', '>=', $currentDate->copy()->startOfDay())
                                ->where('recorded_at', '<=', $currentDate->copy()->endOfDay())
                                ->first();
                            if ($arrivalRecord) {
                                echo \Carbon\Carbon::parse($arrivalRecord->recorded_at)->format('H:i');
                            } else {
                                echo "";
                            }
                        @endphp
                    </td>
                    <td class="border border-gray-400 text-left py-2 px-4 uppercase font-semibold text-xs">
                        @php
                            if ($arrivalRecord && $arrivalRecord->arrivalDepartureRecords->count() > 0) {
                                echo \Carbon\Carbon::parse($arrivalRecord->arrivalDepartureRecords->first()->recorded_at)->format('H:i');
                            }
                        @endphp
                    </td>
                    <td class="border border-gray-400 text-left py-2 px-4 uppercase font-semibold text-xs">
                        @php
                            // Define constants for the workday, break, and lunch times
                            $regularStartTime = strtotime('08:30');
                            $breakStartTime1 = strtotime('11:00');
                            $breakEndTime1 = strtotime('11:10');
                            $lunchStartTime = strtotime('12:00');
                            $lunchEndTime = strtotime('13:00');
                            $breakStartTime2 = strtotime('13:00');
                            $breakEndTime2 = strtotime('13:10');
                            $breakStartTime3 = strtotime('17:30'); // Add the new break start time
                            $breakEndTime3 = strtotime('17:40'); // Add the new break end time
                            $regularEndTime = strtotime('17:30');

                            // Initialize total worked minutes for the day
                            $totalWorkedMinutes = 0;

                            // Calculate worked time if $arrivalTime and $departureTime are provided
                            if ($arrivalRecord && $arrivalRecord->arrivalDepartureRecords->count() > 0) {
                                $arrivalTime = \Carbon\Carbon::parse($arrivalRecord->recorded_at);
                                $departureTime = \Carbon\Carbon::parse($arrivalRecord->arrivalDepartureRecords->first()->recorded_at);

                                $workedStartTime = strtotime($arrivalTime->format('H:i'));
                                $workedEndTime = strtotime($departureTime->format('H:i'));

                                // Calculate worked time before lunch break
                                $beforeLunchWorkedTime = min($lunchStartTime, $workedEndTime) - $workedStartTime;
                                $totalWorkedMinutes += $beforeLunchWorkedTime / 60;

                                // Subtract first break time if applicable
                                if ($workedStartTime < $breakStartTime1 && $workedEndTime >= $breakEndTime1) {
                                    $totalWorkedMinutes -= 10;
                                }

                                // Calculate worked time after lunch break
                                $afterLunchWorkedTime = max(0, $workedEndTime - max($workedStartTime, $lunchEndTime));
                                $totalWorkedMinutes += $afterLunchWorkedTime / 60;

                                // Subtract second break time if applicable
                                if ($workedStartTime < $breakStartTime2 && $workedEndTime >= $breakEndTime2) {
                                    $totalWorkedMinutes -= 10;
                                }

                                // Subtract the new break time if applicable
                                if ($workedStartTime < $breakStartTime3 && $workedEndTime >= $breakEndTime3) {
                                    $totalWorkedMinutes -= 10;
                                }

                                // Print formatted total worked time for the day
                                echo sprintf('%02d:%02d', floor($totalWorkedMinutes / 60), $totalWorkedMinutes % 60);
                            }
                        @endphp
                    </td>

                </tr>
                @php
                    $currentDate->addDay();
                @endphp
            @endwhile
        </tbody>
    </table>
</div>

