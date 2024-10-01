@props(['form', 'readonly' => true])

<x-app-layout>
    <h1>Form Type A</h1>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold text-center mb-6">勤 怠 届</h1>

        <div class="grid grid-cols-3 gap-4 mb-6 bg-blue-100 p-4 rounded">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">営業所</label>
                <input type="text" value="{{ $form->department }}" readonly class="w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">所属</label>
                <input type="text" value="{{ $form->office }}" readonly class="w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">氏名</label>
                <input type="text" value="{{ $form->name }}" readonly class="w-full border-gray-300 rounded-md shadow-sm">
            </div>
        </div>

        <p class="mb-2 text-sm">※該当項目に✓をつけて下さい。</p>
        <div class="mb-6">
            <div class="grid grid-cols-3 gap-4">
                @foreach(['full_day' => '有給休暇(1日)', 'half_day_morning' => '半日有給休暇(午前)', 'half_day_afternoon' => '半日有給休暇(午後)', 'late' => '遅刻', 'early_leave' => '早退', 'absent' => '欠勤', 'special_leave' => '特別休暇'] as $value => $label)
                    <label class="flex items-center">
                        <input type="radio" name="leave_type" value="{{ $value }}" {{ $form->leave_type === $value ? 'checked' : '' }} disabled>
                        <span class="ml-2 text-sm">{{ $label }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div id="date-inputs">
            <div id="start_date_container" class="mb-4">
                <label for="start_date" id="start_date_label">{{ $form->leave_type === 'full_day' ? '日付け' : '開始日' }}</label>
                <input type="date" id="start_date" name="start_date" value="{{ $form->start_date }}" readonly class="form-input">
            </div>

            @if($form->leave_type !== 'full_day' && $form->leave_type !== 'half_day_morning' && $form->leave_type !== 'half_day_afternoon')
                <div id="end_date_container" class="mb-4">
                    <label for="end_date" id="end_date_label">終了日</label>
                    <input type="date" id="end_date" name="end_date" value="{{ $form->end_date }}" readonly class="form-input">
                </div>
            @endif
        </div>

        @if($form->leave_type !== 'full_day' && $form->leave_type !== 'absent' && $form->leave_type !== 'special_leave')
            <div class="mb-4">
                <label for="start_time">{{ $form->leave_type === 'late' ? '遅刻' : '開始時間' }}</label>
                <input type="time" id="start_time" name="start_time" value="{{ $form->start_time }}" readonly class="form-input">
            </div>
            @if($form->leave_type !== 'late' && $form->leave_type !== 'early_leave')
                <div class="mb-4">
                    <label for="end_time">終了時間</label>
                    <input type="time" id="end_time" name="end_time" value="{{ $form->end_time }}" readonly class="form-input">
                </div>
            @endif
        @endif

        <div class="mb-4">
            <label for="reason" class="block text-gray-700 text-sm font-bold mb-2">理由</label>
            <select id="reason_select" name="reason_select" class="form-select w-full p-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" disabled>
                <option value="">選択してください</option>
                @foreach(['私用の為', '通院の為', '計画有給休暇消化の為', '体調不良の為'] as $option)
                    <option value="{{ $option }}" {{ $form->reason_select === $option ? 'selected' : '' }}>{{ $option }}</option>
                @endforeach
            </select>
            <textarea id="reason" name="reason" class="mt-4 px-2 py-3 form-textarea w-full h-40 border border-gray-300 rounded-md" readonly>{{ $form->reason }}</textarea>
        </div>


    </div>
</x-app-layout>
