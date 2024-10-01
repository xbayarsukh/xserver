<x-app-layout>
    <h1>Form Type A</h1>

    <form action="{{ route('forms.store', 'A') }}" method="POST">
        @csrf
        <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1 class="text-3xl font-bold text-center mb-6">勤 怠 届</h1>



            <div class="grid grid-cols-3 gap-4 mb-6 bg-blue-100 p-4 rounded">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">営業所</label>
                    @if (Auth::check())
                        @if (Auth::user()->office)
                            <input type="text" id="department" name="department"
                                value="{{ Auth::user()->office->office_name }}"
                                class="w-full border-gray-300 rounded-md shadow-sm" readonly>
                        @else
                            <p>User has no associated office</p>
                        @endif
                    @else
                        <p>User is not authenticated</p>
                    @endif

                </div>

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-1">所属</label>
                    <input type="text" id="office" name="office"
                    value="{{ Auth::user()->division->name ?? ''}}"
                        class="w-full border-gray-300 rounded-md shadow-sm" readonly>

                </div>


                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">氏名</label>
                    <input type="text" id="name" name="name" value="{{ Auth::user()->name }}"
                        class="w-full border-gray-300 rounded-md shadow-sm" readonly>
                </div>
            </div>


            <div class="mb-6">
                <p class="mb-2 text-sm">※該当項目に✓をつけて下さい。</p>
                <div class="grid grid-cols-3 gap-4">
                    <label class="flex items-center">
                        <input type="radio" id="full_day" name="leave_type" value="full_day"
                            class="form-radio h-5 w-5 text-green-200">
                        <span class="ml-2 text-sm">有給休暇(1日)</span>
                    </label>

                    <label class="flex items-center">
                        <input id="half_day1" type="radio" name="leave_type" value="half_day_morning"
                            class="form-radio h-5 w-5 text-green-200">
                        <span class="ml-2 text-sm">半日有給休暇(午前)</span>
                    </label>

                    <label class="flex items-center">
                        <input id="half_day2" type="radio" name="leave_type" value="half_day_afternoon"
                            class="form-radio h-5 w-5 text-green-200">
                        <span class="ml-2 text-sm">半日有給休暇(午後)</span>
                    </label>
                    <label class="flex items-center">
                        <input id="late" type="radio" name="leave_type" value="late"
                            class="form-radio h-5 w-5 text-green-200">
                        <span class="ml-2 text-sm">遅刻</span>
                    </label>

                    <label class="flex items-center">
                        <input  id="early_leave" type="radio" name="leave_type" value="early_leave"
                            class="form-radio h-5 w-5 text-green-200">
                        <span class="ml-2 text-sm">早退</span>
                    </label>
                    <label class="flex items-center">
                        <input id="absent" type="radio" name="leave_type" value="absent"
                            class="form-radio h-5 w-5 text-green-200">
                        <span class="ml-2 text-sm">欠勤</span>
                    </label>
                    <label class="flex items-center">
                        <input id="special_leave" type="radio" name="leave_type" value="special_leave"
                            class="form-radio h-5 w-5 text-green-200">
                        <span class="ml-2 text-sm">特別休暇</span>
                    </label>
                    <!-- Add other leave types similarly -->
                </div>
            </div>

            <div id="start_date_container">
                <x-date name="start_date" id="start_date_input" label="開始日" />
            </div>
            <div id="end_date_container">
                <x-date name="end_date" id="end_date_input" label="終了日" />
            </div>

            <div id="time-inputs">
                <div id="start_time_div" class="mb-4">
                    <label for="start_time" id="start_time_label">開始時間</label>
                    <input type="time" id="start_time" name="start_time" class="form-input">
                </div>

                <div id="end_time_div" class="mb-4">
                    <label for="end_time" id="end_time_label">終了時間</label>
                    <input type="time" id="end_time" name="end_time" class="form-input">
                </div>
            </div>

            <div class="mb-4">
                <label for="reason_select" class="block text-gray-700 text-sm mb-2">理由</label>
                <select name="reason_select" id="reason_select"
                    class="form-select w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
                    <option value="">選択してください</option>
                    <option value="私用の為">私用の為</option>
                    <option value="通院の為">通院の為</option>
                    <option value="計画有給休暇消化の為">計画有給休暇消化の為</option>
                    <option value="体調不良の為">体調不良の為</option>
                </select>
                <textarea id="reason" name="reason"
                    class="mt-4 px-2 py-3 form-textarea w-full h-40 border border-gray-300 rounded-md"></textarea>
            </div>



            <div class="space-y-2">
                <label for="boss_id" class="block text-sm font-medium text-gray-700">Select Boss</label>
                <select name="boss_id" id="boss_id"
                    class="block w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                    required>
                    <option value="">Select a boss</option>
                    @foreach ($bosses as $boss)
                        <option value="{{ $boss->id }}">{{ $boss->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="px-2 py-2">

                <button type="submit"
                    class="bg-teal-300 text-white font-semibold py-2 px-2 rounded-lg shadow-md hover:bg-teal-400 focus:outline-none focus:ring-2 focus:ring-teal-800 focus:ring-opacity-75 transition duration-150 ease-in-out">
                    Submit
                </button>

            </div>





        </div>

    <script>
       document.addEventListener('DOMContentLoaded', function() {
    const fullDayRadio = document.getElementById('full_day');
    const halfDay1Radio = document.getElementById('half_day1');
    const halfDay2Radio = document.getElementById('half_day2');
    const lateRadio = document.getElementById('late');
    const earlyRadio = document.getElementById('early_leave');
    const absentRadio = document.getElementById('absent');
    const specialRadio = document.getElementById('special_leave');
    const startDateContainer = document.getElementById('start_date_container');
    const endDateContainer = document.getElementById('end_date_container');
    const startDateInput = document.querySelector('#start_date_container input');
    const endDateInput = document.querySelector('#end_date_container input');
    const startTimeInput = document.getElementById('start_time');
    const endTimeInput = document.getElementById('end_time');
    const timeInputsContainer = document.getElementById('time-inputs');

    function updateFields() {
        // Reset all fields to default state
        let startDateLabel = startDateContainer.querySelector('label');
        if (startDateLabel) {
            startDateLabel.textContent = '開始日';
        }
        endDateContainer.style.display = 'block';
        timeInputsContainer.style.display = 'block';
        document.getElementById('end_time_div').style.display = 'block';
        document.getElementById('start_time_label').textContent = '開始時間';
        startTimeInput.value = '';
        endTimeInput.value = '';

        if (fullDayRadio.checked) {
            startDateLabel.textContent = '日付け';
            endDateContainer.style.display = 'none';
            if (startDateInput && endDateInput) {
                endDateInput.value = startDateInput.value;
            }
            timeInputsContainer.style.display = 'none';
        } else if (halfDay1Radio.checked) {
            startDateLabel.textContent = '日付け';
            endDateContainer.style.display = 'none';
            startTimeInput.value = '08:30';
            endTimeInput.value = '12:30';
        } else if (halfDay2Radio.checked) {
            startDateLabel.textContent = '日付け';
            endDateContainer.style.display = 'none';
            startTimeInput.value = '13:30';
            endTimeInput.value = '17:30';
        } else if (lateRadio.checked) {
            startDateLabel.textContent = '日付け';
            endDateContainer.style.display = 'none';
            document.getElementById('end_time_div').style.display = 'none';
            document.getElementById('start_time_label').textContent = '遅刻';
        } else if (earlyRadio.checked) {
            startDateLabel.textContent = '日付け';
            endDateContainer.style.display = 'none';
            document.getElementById('end_time_div').style.display = 'none';
            document.getElementById('start_time_label').textContent = '早退';
        } else if (absentRadio.checked || specialRadio.checked) {
            startDateLabel.textContent = '開始日';
            endDateContainer.style.display = 'block';
            timeInputsContainer.style.display = 'none';
        }
    }

    const radioButtons = document.querySelectorAll('input[name="leave_type"]');
    radioButtons.forEach(radio => {
        radio.addEventListener('change', updateFields);
    });

    if (startDateInput) {
        startDateInput.addEventListener('change', function() {
            if (fullDayRadio.checked && endDateInput) {
                endDateInput.value = this.value;
            }
        });
    }

    // Update fields before form submission
    document.querySelector('form').addEventListener('submit', function(e) {
        updateFields();
    });

    // Initial call to set correct state
    updateFields();
});
    </script>



    </form>


</x-app-layout>
