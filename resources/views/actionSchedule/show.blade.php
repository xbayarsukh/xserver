@php
    use Carbon\Carbon;
@endphp
<x-app-layout>


    <div class="w-full px-4 py-8 bg-white mt-5 rounded mx-auto">


        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">行動予定表</h1>
        <p class="text-2xl font-bold text-center mt-2">{{ $office->corp->corp_name }}  {{ $office->office_name }}</p>

      <div>
        <x-button purpose="search" href="{{ route('actionSchedule.create', ['selected_office_id'=>$selectedOfficeId]) }}">
            新規行き先
        </x-button>

        <x-button purpose="submit" href="{{ route('actionSchedule.list', ['office_id'=>$office->id]) }}">
            会社リスト
        </x-button>
      </div>


                <form action="{{ route('actionSchedule.show' ,$office->id) }}" method="GET" class="mb-4 mt-4 font-bold flex justify-center items-center">
                    <input type="date" name="date" value="{{ $selectedDate }}" class="px-4 py-2 text-xl w-64 rounded" onchange="this.form.submit()">

                  </form>





        <div class="bg-stone-100 rounded-lg shadow-md overflow-hidden mt-10 mb-10">

            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="border-gray-200 bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-left border border-gray-400">営業員名</th>

                            @for ($number = 1; $number <= 10; $number++)
                                <th class="px-4 py-2 text-center border border-gray-400">{{ $number }}</th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="border border-gray-400 px-4 py-2 font-semibold">
                                    {{ $user->name }}
                                </td>

                                {{-- @for ($number = 1; $number <= 10; $number++)
                                    <td class="border border-gray-400 px-4 py-2 text-center ">
                                        <button onclick="openModal({{ $user->id }}, {{ $number }})" class=" text-blue-500  text-2xl font-bold py-1 px-2 ">
                                            +
                                        </button>
                                    </td>
                                @endfor --}}

                                @for ($number = 1; $number <= 10; $number++)
                                <td class="border border-gray-400 px-4 py-2 text-center font-medium">
                                    @php
                                       $appointment=$appointments->where('user_id', $user->id)
                                                                ->where('time_slot',$number)
                                                                ->first();
                                    @endphp

                                        @if($appointment)
                                        <div style="background-color: {{ $appointment->color }}; padding: 5px; cursor: pointer;" class="rounded"
                                            onclick="openEditReservationModal({{ $appointment->id }})" >
                                            {{ $appointment->actionSchedule->name }}
                                        </div>
                                        @else
                                        <button onclick="openModal({{ $user->id }}, {{ $number }})" class="text-blue-500 text-3xl font-bold py-1 px-2">
                                            +
                                        </button>
                                        @endif
                                </td>
                            @endfor

                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center py-4">このオフィスのユーザーは見つかりませんでした。</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


    <!-- Modal create-->
    <div id="appointmentModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-bold text-center text-gray-900" id="modal-title">
                        予定制作
                    </h3>
                    <div class="mt-2">

                        <form id="appointmentForm">
                            @csrf
                            <input type="hidden" id="userId" name="user_id">
                            <input type="hidden" id="timeSlot" name="time_slot">
                            <input type="hidden" id="appointmentDate" name="appointment_date" value="{{ $selectedDate }}">
                            <div class="mb-4">
                                <label for="actionScheduleId" class="block text-sm font-semibold text-gray-700 mb-2 mt-2">行く先</label>
                                <select id="actionScheduleId" name="action_schedule_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">行く先を選択</option>
                                    @foreach($actionSchedules as $schedule)
                                        <option value="{{ $schedule->id }}">{{ $schedule->name }}</option>
                                    @endforeach
                                </select>
                                <div>
                                    <label for="color" class="block text-sm font-semibold text-gray-700 mb-2 mt-2">カラー</label>
                                    <input type="color" name="color" id="color" value="#3490dc" class="w-full h-10 px-1 py-1 border border-gray-300 rounded-md">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse justify-between">
                    <x-button purpose="search" onclick="saveAppointment()">
                      保存
                    </x-button>

               <x-button purpose="default" onclick="closeModal()">
                    キャンセル
               </x-button>

                </div>
            </div>
        </div>
    </div>

  <!-- Edit Modal -->
<div id="editAppointmentModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg leading-6 font-bold text-center text-gray-900" id="modal-title">
                    予定編集
                </h3>
                <div class="mt-2">
                    <form id="editAppointmentForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editAppointmentId" name="appointment_id">
                        <input type="hidden" id="editAppointmentDate" name="appointment_date">
                        <div class="mb-4">
                            <label for="editActionScheduleId" class="block text-sm font-semibold text-gray-700 mb-2 mt-2">行く先</label>
                            <select id="editActionScheduleId" name="action_schedule_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">行く先を選択</option>
                                @foreach($actionSchedules as $schedule)
                                    <option value="{{ $schedule->id }}">{{ $schedule->name }}</option>
                                @endforeach
                            </select>
                            <div>
                                <label for="editColor" class="block text-sm font-semibold text-gray-700 mb-2 mt-2">カラー</label>
                                <input type="color" name="color" id="editColor" class="w-full h-10 px-1 py-1 border border-gray-300 rounded-md">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse justify-between">

                <x-button purpose="search" onclick="updateAppointment()">
                    保存
                </x-button>

                <x-button purpose="delete" onclick="deleteAppointment(document.getElementById('editAppointmentId').value)">
                    消去
                </x-button>

                <x-button purpose="default" onclick="closeEditModal()">
                    キャンセル
                </x-button>

            </div>
        </div>
    </div>
</div>



    <script>
        function openModal(userId, timeSlot) {
            document.getElementById('userId').value = userId;
            document.getElementById('timeSlot').value = timeSlot;
            document.getElementById('appointmentDate').value = '{{ $selectedDate }}';
            document.getElementById('appointmentModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('appointmentModal').classList.add('hidden');
        }

        function saveAppointment() {
            const formData = new FormData(document.getElementById('appointmentForm'));


            fetch('{{ route("appointments.store") }}',
                {
                    method:'POST',
                    body:formData,
                    headers:{
                        'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept':'application/json'
                    }
                }
            )
            .then(response=>{
                if(!response.ok){
                    return response.json().then(err=> Promise.reject(err));
                }
                return response.json();
            })
            .then(data=>{
                console.log(data);
                closeModal();
                location.reload();
            })
            .catch(error=>{
                console.error('Error', error);
                alert('an error' +(error.message||'Unknown error'));
            });
        }





                function openEditReservationModal(appointmentId){
                    fetch(`/appointments/${appointmentId}/edit`)
                    .then(response=>{
                        if(!response.ok){
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data=>{
                        document.getElementById('editAppointmentId').value=data.id;
                        document.getElementById('editActionScheduleId').value=data.action_schedule_id;
                        document.getElementById('editColor').value=data.color;
                        document.getElementById('editAppointmentDate').value='{{ $selectedDate }}';
                        document.getElementById('editAppointmentModal').classList.remove('hidden');

                    })
                    .catch(error =>{
                        console.error('Error:', error);
                        alert('an error occureed' +error.message);
                    })
                }

                function closeEditModal()
                {
                    document.getElementById('editAppointmentModal').classList.add('hidden');
                }

                function updateAppointment() {
                    const formData = new FormData(document.getElementById('editAppointmentForm'));
                    formData.append('appointment_date', document.querySelector('input[name="date"]').value);
                    const appointmentId = document.getElementById('editAppointmentId').value;

                    fetch(`{{ route('appointments.update', '') }}/${appointmentId}`, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json',
                            'X-HTTP-Method-Override': 'PUT'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Update response:', data);
                        closeEditModal();
                        location.reload();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while updating the appointment.');
                    });
                }



                function deleteAppointment(appointmentId) {
                        if(confirm('この予約を削除してもよろしいですか?')) {
                            fetch(`/appointments/${appointmentId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    'Accept': 'application/json'
                                }
                            })
                     .then(response =>{
                        if(!response.ok){
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                     })
                     .then(data =>{
                        console.log('Delete response:', data);
                        closeEditModal();
                        location.reload();
                     })
                     .catch(error=>{
                        console.error('Error', error);
                        alert('error' +error.message);
                     })
                        }
                    }


                document.addEventListener('DOMContentLoaded', function() {
                    document.querySelectorAll('.appointment-cell').forEach(cell => {
                        cell.addEventListener('click', function() {
                            const appointmentId = this.dataset.appointmentId;
                            openEditModal(appointmentId);
                        });
                    });
                });

    </script>
</x-app-layout>
