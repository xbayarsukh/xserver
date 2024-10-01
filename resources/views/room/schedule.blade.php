<x-app-layout>


    <div class="container mx-auto px-4 py-8 bg-white mt-5">

        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">会議室一覧</h1>


        <h2 class="text-2xl font-bold mb-6 px-5">{{ $office->office_name }} </h2>

        <h3 class="text-large font-medium px-2 mt-2 mb-2">{{ \Carbon\Carbon::parse($date)->format('Y/m/d') }}</h3>

     <div class="bg-white rounded-lg shadow-md overflow-hidden mt-10 mb-10">
        <div class="overflow-x-auto">

        <table class="w-full border-collapse border border-gray-300">

            <thead class="border-gray-200 bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left border border-gray-400">会議室名</th>
                    @for ($hour = 8; $hour <= 18; $hour++)
                        <th class="px-4 py-2 text-center border border-gray-400">{{ sprintf('%02d:00', $hour) }}</th>
                    @endfor
                </tr>
            </thead>


            <tbody>

                @foreach ($rooms as $room)
                    <tr>
                        <td class="border border-gray-400 px-4 p-2">
                            {{ $room->name }}

                                <small class="flex flex-wrap items-center space-y-2 sm:space-y-0 sm:space-x-4">
                                    <a href="{{ route('room.edit', $room->id) }}" class="w-full sm:w-auto text-center text-indigo-600 hover:text-indigo-900 font-bold py-2 px-4 rounded bg-yellow-100 hover:bg-yellow-200">
                                        Edit
                                    </a>
                                    <form action="{{ route('room.destroy', $room->id) }}" method="POST" class="w-full sm:w-auto text-center inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 font-bold py-2 px-4 rounded bg-red-100 hover:bg-red-200 w-full sm:w-auto" onclick="return confirm('この部屋を削除してもよろしいですか?')">
                                            Delete
                                        </button>
                                    </form>
                                </small>

                        </td>

                    @php


                        $currentReservation = null;
                        $colspan = 0;
                    @endphp

                        @for ($hour = 8; $hour <= 18; $hour++)

                                @php
                                    $reservation = $room->reservations->first(function ($res) use ($hour) {
                                        return $res->start_time->hour <= $hour && $res->end_time->hour > $hour;
                                    });
                                @endphp

                                @if ($reservation && $reservation !==$currentReservation)

                                    @php
                                        $currentReservation =$reservation;
                                        $colspan=$reservation->end_time->hour - $reservation->start_time->hour;
                                    @endphp

                                <td class="border border-gray-400 px-4 py-2" colspan="{{ $colspan }}">
                                    <div class="text-white p-1 text-sm rounded cursor-pointer"
                                        style="background-color: {{ $reservation->color }};"
                                        onclick="openEditReservationModal({{ $reservation->id }})">
                                        {{ $reservation->title }} <br>
                                        <small class="text-black">{{ $reservation->user->name }}</small>
                                        ({{ $reservation->start_time->format('H:i') }} - {{ $reservation->end_time->format('H:i') }})
                                    </div>
                                </td>

                                @php
                                    $hour += $colspan - 1;
                                @endphp

                                @elseif(!$reservation)
                                <td class="border border-gray-400 px-4 py-2">

                                    <button class="text-blue-400 hover:text-blue-600" onclick="openReservationModal({{ $room->id }}, '{{ $date }}', {{ $hour }})">空屋</button>

                                </td>
                                @endif

                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>


<!--Create reservation-->
    <div id="createReservationModal" class="fixed z-10 inset-0 overflow-y-auto hidden"aria-labelledby="model-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                <form id="createReservationForm" class="w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h3 class="text-lg leading-6 font-bold text-gray-900 mb-4" id="modal-title">契約</h3>
                        <div class="mt-2 space-y-4">
                            <input type="hidden" id="roomId" name="room_id">
                            <div>
                                <label for="startTime" class="block text-sm font-medium text-gray-700 mb-1">開始時間</label>
                                <input type="time" name="start_time" id="startTime" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="endTime" class="block text-sm font-medium text-gray-700 mb-1">終了時間</label>
                                <input type="time" name="end_time" id="endTime" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">タイトル</label>
                                <input type="text" name="title" id="title" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">説明</label>
                                <textarea name="description" id="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                            <div>
                                <label for="color" class="block text-sm font-medium text-gray-700 mb-1">カラー</label>
                                <input type="color" name="color" id="color" value="#3490dc" class="w-full h-10 px-1 py-1 border border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="w-full sm:w-auto px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mb-2 sm:mb-0 sm:ml-3">
                            契約保存
                        </button>
                        <button type="button" onclick="closeModal('createReservationModal')" class="w-full sm:w-auto px-4 py-2 bg-white text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            キャンセル
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!--Edit reservation-->

    <div id="editReservationModal" class="fixed z-10 inset-0 overflow-y-auto hidden"aria-labelledby="model-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form id="editReservationForm">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">予約を編集</h3>
                        <div class="mt-2">
                            <input type="hidden" id="editReservationId" name="id">


                            <div class="mb-4">
                                <label for="editTitle" class="block text-sm font-medium text-gray-700">タイトル</label>
                                <input type="text" name="title" id="editTitle" required class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="mb-4">
                                <label for="editDescription" class="block text-sm font-medium text-gray-700">説明</label>
                                <textarea name="description" id="editDescription" rows="3" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="editStartTime" class="block text-sm font-medium text-gray-700">開始時間</label>
                                <input type="time" name="start_time" id="editStartTime" required class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="mb-4">
                                <label for="editEndTime" class="block text-sm font-medium text-gray-700">終了時間</label>
                                <input type="time" name="end_time" id="editEndTime" required class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="mb-4">
                                <label for="editColor" class="block text-sm font-medium text-gray-700">カラー</label>
                                <input type="color" name="color" id="editColor" class="mt-1 block w-full">
                            </div>

                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            更新
                        </button>
                        <button type="button" onclick="deleteReservation()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            消去
                        </button>
                        <button type="button" onclick="closeModal('editReservationModal')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            キャンセル
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script>
        function editRoom(roomId) {
            // Implement room editing logic
        }

        function deleteRoom(roomId) {
            // Implement room deletion logic
        }

        function openReservationModal(roomId, date, hour) {
            document.getElementById('roomId').value = roomId;
            document.getElementById('startTime').value = `${hour.toString().padStart(2, '0')}:00`;
            document.getElementById('endTime').value = `${(hour + 1).toString().padStart(2, '0')}:00`;
            document.getElementById('createReservationModal').classList.remove('hidden');
        }

        function openEditReservationModal(reservationId) {
            fetch(`/reservations/${reservationId}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('editReservationId').value = data.id;
                    document.getElementById('editTitle').value = data.title;
                    document.getElementById('editDescription').value = data.description;
                    document.getElementById('editStartTime').value = data.start_time;
                    document.getElementById('editEndTime').value = data.end_time;
                    document.getElementById('editColor').value = data.color;
                    document.getElementById('editReservationModal').classList.remove('hidden');
                });
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        document.getElementById('createReservationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            formData.append('date', '{{ $date }}');
            fetch('/reservations', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closeModal('createReservationModal');
                    location.reload();
                } else {
                    alert('時間確認してください。');
                }
            });
        });

        document.getElementById('editReservationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const reservationId = document.getElementById('editReservationId').value;

            fetch(`/reservations/${reservationId}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-HTTP-Method-Override': 'PUT'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closeModal('editReservationModal');
                    location.reload();
                } else {
                    alert(data.message || 'Error updating reservation');
                }
            });
        });

        function deleteReservation() {
            if (confirm('この予約を削除してもよろしいですか?')) {
                const reservationId = document.getElementById('editReservationId').value;
                fetch(`/reservations/${reservationId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        closeModal('editReservationModal');
                        location.reload();
                    } else {
                        alert('Error deleting reservation');
                    }
                });
            }
        }
    </script>
</x-app-layout>
