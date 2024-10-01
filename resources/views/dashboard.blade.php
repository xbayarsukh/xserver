<x-app-layout>
    <style>
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table-responsive table {
            width: 100%;
        }

        @media (max-width: 768px) {
            .table-responsive {
                width: auto;
                margin: 0 auto;
            }

            .table-responsive table {
                width: 100%;
                min-width: auto;
                /* Adjust this value based on your table's width */
            }




            th,
            td {
                font-size: 10px;
                /* Adjust the font size for table headers and cells */
                /* padding: 1px; */
                white-space: nowrap;
                /* Adjust the padding for table headers and cells */
            }

            th:nth-child(1),
            td:nth-child(1),
            th:nth-child(2),
            td:nth-child(2),
            th:nth-child(3),
            td:nth-child(3),
            th:nth-child(4),
            td:nth-child(4),
            th:nth-child(5),
            td:nth-child(5),
            th:nth-child(6),
            td:nth-child(6),
            th:nth-child(7),
            td:nth-child(7) {
                /* width: 14.28%; Adjusted to fit 7 columns */
                max-width: 50px;
                Limit maximum width
                /* overflow: hidden; */
                /* text-overflow: ellipsis; */
            }


        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/locale/ja.min.js"></script>
    <div class="card-body">

        <div class="flex justify-end bg-gray-100">


            <div class="py-4 px-4 flex items-center">



                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd"
                        d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                        clip-rule="evenodd" />
                </svg>
                <span class=" text-bold text-l text-black ml-2">{{ auth()->user()->name }}{{ __(' 様') }}</span>
            </div>
        </div>


        <div class="py-12 bg-gray-100 overflow-hidden shadow-sm">





            <div class="max-w-sm mx-auto px-8">


                <div class="bg-white px-4 py-10 rounded-lg shadow-lg">
                    <form id="timeRecordForm" method="POST">
                        @csrf
                        <input type="hidden" name="button" id="buttonValue">
                        <div class="text-center">
                            <input value="{{ now()->format('Y-m-d H:i') }}" type="datetime-local" name="recorded_at"
                                id="recordedAt"
                                class="form-control bg-stone-100 border border-gray-500 dark:border-black rounded-lg p-3 text-lg"
                                style="max-width: 400px; margin-bottom: 10px;" lang="ja">
                        </div>
                        <br>
                        <!-- First row of buttons -->
                        <div class="mb-4 flex justify-center space-x-6">
                            <button type="button"
                                class="bg-green-300 hover:bg-green-400 text-gray-800 font-semibold py-6 px-9 text-lg rounded-lg"
                                data-value="ArrivalRecord">
                                <span class="relative">出勤</span>
                            </button>
                            <button type="button"
                                class="bg-orange-200 hover:bg-orange-300 text-gray-800 font-semibold py-6 px-9 text-lg rounded-lg"
                                data-value="DepartureRecord">
                                <span class="relative">退社</span>
                            </button>
                        </div>

                        @if (auth()->user()->office && auth()->user()->office->corp && auth()->user()->office->corp->corp_name === 'ユメヤ')
                            <p class="text-center mb-3 font-semibold">ユメヤ専用
                                <br><small>二回目出勤する場合は押してください</small>
                            </p>
                            <div class="flex justify-center space-x-6 mb-5">
                                <button type="button" data-value="SecondArrivalRecord"
                                    class="bg-sky-500 hover:bg-sky-600 text-white font-semibold py-6 px-6 text-lg rounded-lg">
                                    <small>二回出勤</small>
                                </button>
                                <button type="button" data-value="SecondDepartureRecord"
                                    class="bg-pink-300 hover:bg-pink-400 text-white font-semibold py-6 px-6 text-lg rounded-lg">
                                    <small>二回退勤</small>
                                </button>
                            </div>
                        @endif

                        <!-- Break buttons -->
                        <div class="mb-4 flex justify-center space-x-6">
                            <button type="button" id="startBreakButton" data-value="StartBreak"
                                class="bg-blue-200 hover:bg-blue-300 text-gray-800 font-semibold py-6 px-9 text-lg rounded-lg">
                                休憩
                            </button>
                            <button type="button" id="endBreakButton" data-value="EndBreak"
                                class="bg-red-200 hover:bg-red-300 text-gray-800 font-semibold py-6 px-9 text-lg rounded-lg">
                                戻り
                            </button>
                        </div>
                    </form>
                </div>













                @if (session('status') || session('error'))
                    <div id="statusToast" class="flex items-center fixed top-16 left-1/2 transform -translate-x-1/2">

                        <div>
                            @if (session('status'))
                                <p class="bg-green-600 text-white font-semibold p-4 rounded">{{ session('status') }}</p>
                            @endif

                            @if (session('error'))
                                <p class="bg-red-500 text-white font-semibold p-4 rounded">{{ session('error') }}</p>
                            @endif
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var statusToast = document.getElementById('statusToast');
                            setTimeout(function() {
                                statusToast.classList.add('hidden');
                            }, 5000); // Disappear after 5 seconds
                        });
                    </script>
                @endif


            </div>
        </div>


    </div>



    <div class="flex justify-between py-6 bg-white">
        <a href="{{ route('dashboard.previous-month') }}"
            class="bg-zinc-500 hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded">先月</a>

        <input type="text" class="text-center py-2 px-4 bg-gray-200 text-gray-800 font-semibold rounded"
            value="{{ \Carbon\Carbon::now()->day >= 1 && \Carbon\Carbon::now()->day <= 16? \Carbon\Carbon::createFromDate(session('current_year', \Carbon\Carbon::now()->year), session('current_month', \Carbon\Carbon::now()->month))->format('Y年n月'): \Carbon\Carbon::createFromDate(session('current_year', \Carbon\Carbon::now()->year), session('current_month', \Carbon\Carbon::now()->month))->addMonths()->format('Y年n月') }}"
            disabled>



        <a href="{{ route('dashboard.next-month') }}"
            class="bg-orange-200 hover:bg-orange-300 font-bold py-2 px-4 rounded">次月</a>
    </div>


    <div class="bg-white">

        <div class="table-responsive bg-white max-w-6xl mx-auto shadow-lg rounded-2xl overflow-hidden mb-10">
            <div class="overflow-y-auto max-h-80 mb-10">
                <table class="min-w-full table-auto border border-slate-400">
                    <thead class="bg-blue-200 text-gray-700 sticky top-0 z-10 shadow-md">
                        <tr>
                            <th class="border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm">日付け
                            </th>
                            <th class="border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm">勤怠
                                区分</th>
                            <th class="border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm">外出
                            </th>
                            <th class="border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm">出社時間
                            </th>
                            <th class="border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm">退社時間
                            </th>
                            @if (auth()->user()->office && auth()->user()->office->corp && auth()->user()->office->corp->corp_name === 'ユメヤ')
                                <th class="border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm">
                                    二回出席
                                </th>
                                <th class="border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm">
                                    二回退勤
                                </th>
                            @endif
                            <th class="border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm">労働時間
                            </th>
                            <th class="border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm">残業時間
                            </th>
                            <th
                                class="border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm hidden md:table-cell">
                                残業時間2</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-gray-800">
                        @if ($tbody && !empty($tbody))
                            {!! $tbody !!}
                        @else
                            <tr>
                                <td colspan="8" class="text-center py-4 text-gray-600">No records available.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('timeRecordForm');
            const buttons = form.querySelectorAll('button[type="button"]');
            const buttonValueInput = document.getElementById('buttonValue');
            const dateInput = document.getElementById('recordedAt');

            buttons.forEach(button => {
                button.addEventListener('click', function(e) {

                    console.log('Button clicked:', this.getAttribute('data-value'));
                    e.preventDefault();
                    const recordType = this.getAttribute('data-value');
                    let selectedDateTime = dateInput.value;

                    if (!selectedDateTime) {
                        alert('日時を選択してください。');
                        return;
                    }

                    switch (recordType) {
                        case 'StartBreak':
                            handleStartBreak(recordType, selectedDateTime);

                            break;
                        case 'EndBreak':
                            handleEndBreak(recordType, selectedDateTime);
                            break;
                        case 'ArrivalRecord':
                            handleArrivalRecord(recordType, selectedDateTime);
                            break;
                        case 'SecondArrivalRecord':
                            handleArrivalRecord(recordType, selectedDateTime);
                            break;
                        case 'DepartureRecord':
                            handleDepartureRecord(recordType, selectedDateTime);
                            break;
                        case 'SecondDepartureRecord':
                            handleDepartureRecord(recordType, selectedDateTime);
                            break;
                        default:
                            submitForm(recordType, selectedDateTime);
                    }
                });
            });

            function handleStartBreak(recordType, selectedDateTime) {
                fetch(`/check-break-status?date=${selectedDateTime}`, {
                        method: 'GET',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.canStartBreak) {
                            submitForm(recordType, selectedDateTime);
                        } else {
                            alert(data.message);
                        }
                    }).catch(error => {
                        console.error('Error:', error);
                        alert(' an error ');
                    });
            }

            function handleEndBreak(recordType, selectedDateTime) {
                fetch(`/check-break-status?date=${selectedDateTime}`, {
                        method: 'GET',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.breakCount > 0 && !data.canStartBreak) {
                            if (confirm('本当に休憩終了時間を記録しますか?')) {
                                submitForm(recordType, selectedDateTime);
                            }
                        } else {
                            alert('現在進行中の休憩はありません。');
                        }
                    });
            }

            function handleArrivalRecord(recordType, selectedDateTime) {
                fetch(`/check-record/${recordType}?date=${selectedDateTime}`, {
                        method: 'GET',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        if (data.exists == 1) {
                            if (confirm('本当に出勤時間を変更しますか?')) {
                                submitForm(recordType, selectedDateTime);
                            }
                        } else if (data.exists == 2) {
                            alert('二回目出勤時間は必ず一回目退勤時間以降になります');
                        } else {
                            submitForm(recordType, selectedDateTime);
                        }
                    });
            }

            function handleDepartureRecord(recordType, selectedDateTime) {
                if (confirm('本当に退社時間を記録しますか?')) {
                    submitForm(recordType, selectedDateTime);
                }
            }

            function submitForm(recordType, selectedDateTime) {
                buttonValueInput.value = recordType;
                dateInput.value = selectedDateTime;

                let route;
                switch (recordType) {
                    case 'StartBreak':
                        route = '{{ route('time.start.break') }}';
                        break;
                    case 'EndBreak':
                        route = '{{ route('time.end.break') }}';
                        break;
                    default:
                        route = '{{ route('time.record.manual') }}';
                }

                form.action = route;
                form.method = 'POST';
                form.submit();
            }
        });
    </script>

</x-app-layout>
