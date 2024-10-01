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

            /* th:nth-child(1),
          td:nth-child(1),

          th:nth-child(5),
          td:nth-child(5)

           {
              display: none;
          }  */

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
                    <form action="{{ route('time.record.manual') }}" method="POST">
                        @csrf
                        <div class="text-center">
                            <input value="{{ now()->format('Y-m-d H:i') }}" type="datetime-local" name="recorded_at"
                                class="form-control bg-stone-100 border border-gray-500 dark:border-black rounded-lg p-3 text-lg"
                                style="max-width: 400px; margin-bottom: 10px;" lang="ja">
                        </div>
                        <br>
                        <!-- First row of buttons -->
                        <div class="mb-4 flex justify-center space-x-6">
                            <!-- Added space-x-6 for spacing between buttons -->
                            <button name="button" value="ArrivalRecord" onclick="return true;"
                                class="bg-green-300 hover:bg-green-400 text-gray-800 font-semibold py-6 px-9 text-lg rounded-lg">
                                <span class="relative">出勤</span>
                            </button>
                            <button name="button" value="DepartureRecord" onclick="return true;"
                                class="bg-orange-200 hover:bg-orange-300 text-gray-800 font-semibold py-6 px-9 text-lg rounded-lg">
                                <span class="relative">退社</span>
                            </button>
                        </div>


                        @method('PUT')
                    </form>

                    <div class="mb-4 flex justify-center space-x-6">

                        @php

                        @endphp
                        <form action="{{ route('time.start.break') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="bg-blue-200 hover:bg-blue-300 text-gray-800 font-semibold py-6 px-9 text-lg rounded-lg">
                                休憩
                            </button>
                        </form>

                        <form action="{{ route('time.end.break') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="bg-red-200 hover:bg-red-300 text-gray-800 font-semibold py-6 px-9 text-lg rounded-lg">
                                戻り
                            </button>
                        </form>
                    </div>





                    @if (session('status'))
                        <div id="statusToast"
                            class="fixed top-16 left-5 bg-white border-t-5 border-gray-200 rounded-md shadow-md p-4">
                            <div class="flex items-center">
                                <div class="mr-4">
                                    <svg class="h-6 w-6 text-black" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path d="M10 12h1v5h-1zm0-7h1v5h-1z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-stone-800">{{ session('status') }}</p>
                                </div>
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
                value="{{ \Carbon\Carbon::createFromDate(null, session('current_month', \Carbon\Carbon::now()->month))->addMonths()->format('Y年n月') }}"
                disabled>


            <a href="{{ route('dashboard.next-month') }}"
                class="bg-orange-200 hover:bg-orange-300 font-bold py-2 px-4 rounded">次月</a>
        </div>
        <div class="table-responsive bg-white">

            <div class="overflow-x-auto shadow rounded border-b border-gray-200">
                <div class="py-8 mx-auto" style="max-width: 1000px;">
                    <table class="min-w-full bg-white divide-y divide-gray-200 table-auto">
                        <thead class="bg-gray-100 text-stone-800">
                            <tr>
                                <th
                                    class="py-3 px-1 md:px-2 uppercase font-semibold text-xs md:text-sm border border-gray-800">
                                    日付け</th>
                                <th
                                    class="py-3 px-1 md:px-2 uppercase font-semibold text-xs md:text-sm border border-gray-800">
                                    勤怠 区分</th>
                                <th
                                    class="py-3 px-1 md:px-2 uppercase font-semibold text-xs md:text-sm border border-gray-800">
                                    外出</th>
                                <th
                                    class="py-3 px-1 md:px-2 uppercase font-semibold text-xs md:text-sm border border-gray-800">
                                    出社時間</th>
                                <th
                                    class="py-3 px-1 md:px-2 uppercase font-semibold text-xs md:text-sm border border-gray-800">
                                    退社時間</th>
                                <th
                                    class="py-3 px-1 md:px-2 uppercase font-semibold text-xs md:text-sm border border-gray-800">
                                    労働時間</th>
                                <th
                                    class="py-3 px-1 md:px-2 uppercase font-semibold text-xs md:text-sm border border-gray-800">
                                    残業時間</th>
                                <th
                                    class="py-3 px-0 md:px-2 uppercase font-semibold text-xs md:text-sm border border-gray-800 hidden md:table-cell">
                                    残業時間2</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            {!! $tbody !!}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    {{--
        <script>
            // Function to update the current time and date in Tokyo
            function updateTime() {
                // Get current date and time in Tokyo timezone
                var tokyoTime = new Date(new Date().toLocaleString("en-US", {
                    timeZone: "Asia/Tokyo"
                }));

                // Format the time as HH:MM:SS
                var timeString = tokyoTime.getHours().toString().padStart(2, '0') + ':' +
                    tokyoTime.getMinutes().toString().padStart(2, '0') + ':' +
                    tokyoTime.getSeconds().toString().padStart(2, '0');


                var dateString = tokyoTime.toLocaleDateString('ja-JP', options);

                // Update the content of the elements with id="current-date" and id="current-time"
                document.getElementById('current-date').innerText = dateString;
                document.getElementById('current-time').innerText = timeString;
            }

            // Update the time initially
            updateTime();

            // Set interval to update time every second
            setInterval(updateTime, 1000);


            // Get the current date and time
            const currentDateTime = moment();

            // Format the date and time in the desired Japanese format
            const formattedDateTime = currentDateTime.locale('ja').format('YYYY年M月D日 HH:mm');

            // Update the value of the input field
            document.querySelector('input[name="recorded_at"]').value = formattedDateTime;


        </script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
            const closeMenu = document.getElementById('close-menu');

            menuToggle.addEventListener('click', function() {
                mobileMenu.classList.remove('translate-x-full');
            });
            closeMenu.addEventListener('click', function() {
                mobileMenu.classList.add('translate-x-full');
            });
        });
    </script>

</x-app-layout>
