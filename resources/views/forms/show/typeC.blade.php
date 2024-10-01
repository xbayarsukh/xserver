<x-app-layout>
    <h1>Form Type C</h1>

    {{-- <form action="{{ route('forms.update', ['type' => 'C', 'id' => $form->id ?? null]) }}" method="POST"> --}}
       <form action="{{ route('applications.update-type-c', $application->id) }}" method="POST">
        @csrf
        @if(isset($form->id))
            @method('PUT')
        @endif
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
            <h1 class="text-3xl font-bold text-center mb-6">休日出勤許可申請書</h1>

            <div class="grid grid-cols-3 gap-4 mb-6 bg-blue-100 p-4 rounded">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">営業所</label>
                    <input type="text" id="department" name="department" value="{{ $form->department ?? '' }}"
                        class="w-full border-gray-300 rounded-md shadow-sm" readonly>
                </div>

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-1">所属</label>
                    <input type="text" id="office" name="office"
                    value="{{ Auth::user()->division->name ?? ''}}"
                        class="w-full border-gray-300 rounded-md shadow-sm" readonly>

                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">氏名</label>
                    <input type="text" id="name" name="name" value="{{ $form->name ?? '' }}"
                        class="w-full border-gray-300 rounded-md shadow-sm" readonly>
                </div>
            </div>

            <div>
                <label for=""></label>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                <label for="start_time" class="block text font-medium text-gray-700 mb-1">休日出勤許可申請書日付</label>
                <input type="date" id="date" name="request_date" class="form-input w-full" value="{{ $form->request_date ?? '' }}" readonly>
                </div>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="start_time" class="block text font-medium text-gray-700 mb-1">申請時間開始</label>
                    <input type="time" id="start_time" name="start_time" class="form-input w-full" value="{{ $form->start_time ?? '' }}" readonly>
                </div>
                <div class="flex-1">
                    <label for="end_time" class="block text font-medium text-gray-700 mb-1">申請時間終了</label>
                    <input type="time" id="end_time" name="end_time" class="form-input w-full" value="{{ $form->end_time ?? '' }}" readonly>
                </div>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="start_time" class="block text font-medium text-gray-700 mb-1">実施時間開始</label>
                    <input type="time" id="real_start_time" name="real_start_time" class="form-input w-full" value="{{$form->real_start_time ?? '' }}">
                </div>
                <div class="flex-1">
                    <label for="end_time" class="block text font-medium text-gray-700 mb-1">実施時間終了</label>
                    <input type="time" id="real_end_time" name="real_end_time" class="form-input w-full" value="{{ $form->real_end_time ?? '' }}">
                </div>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                <label for="start_time" class="block text font-medium text-gray-700 mb-1">振替休日指定日</label>
                <input type="date" id="date" name="substitute_day" class="form-input w-full" value="{{ $form->substitute_day ?? '' }}">
                </div>
            </div>

            <div class="mb-4">
                <label for="reason" class="block text-gray-700 text-sm mb-2">理由（具体的に）</label>
                <textarea id="reason" name="reason" class="mt-4 px-2 py-3 form-textarea w-full h-40 border border-gray-300 rounded-md">{{ $form->reason ?? '' }}</textarea>
            </div>


            <div class="space-y-2">
                <label for="boss_id" class="block text-sm font-medium text-gray-700">Select Boss</label>


                <select name="boss_id" id="boss_id" class="block w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" {{ isset($application) && $application->boss_id ? 'disabled' : 'required' }}>
                    <option value="">Select a boss</option>
                    @foreach($bosses as $boss)
                        <option value="{{ $boss->id }}" {{ (isset($application) && $application->boss_id==$boss->id) ? 'selected' : ''}}>
                            {{ $boss->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="px-2 py-2">
                <button type="submit" class="bg-teal-300 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-teal-400 focus:outline-none focus:ring-2 focus:ring-teal-800 focus:ring-opacity-75 transition duration-150 ease-in-out">
                    Submit
                </button>

            </div>

        </div>
    </form>
</x-app-layout>
