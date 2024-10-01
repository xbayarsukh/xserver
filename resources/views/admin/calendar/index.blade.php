@extends('admin.dashboard')

@section('admin')

<div class="py-20 bg-gray-100 shadow-sm min-h-screen">
    <div class="bg-white p-4 rounded-lg shadow-lg w-96 mx-auto">
        <h2 class="text-xl font-semibold mt-2 mb-4 text-center">共休日設定</h2>
        <form action="{{ route('admin.calendar.store') }}" method="POST">
            @csrf
            <div>
                <label for="corps_id" class="block mb-2">会社を選択してください</label>
                <select name="corps_id" id="corps_id" class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200">
                    <option value="">会社</option>
                    @foreach($corps as $corp)
                        <option value="{{ $corp->id }}">{{ $corp->corp_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label for="from_date" class="block mb-2">開始日</label>
                <input type="date" name="from_date" id="from_date" class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>
            <div class="mt-4">
                <label for="to_date" class="block mb-2">終了日</label>
                <input type="date" name="to_date" id="to_date" class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>

            <div class="mt-4">
                <label class="block mb-2">休日</label>
                <div class="flex items-center">
                    <input type="checkbox" name="weekdays[]" value="saturday" id="saturday" class="mr-2">
                    <label for="saturday" class="mr-4">土</label>
                    <input type="checkbox" name="weekdays[]" value="sunday" id="sunday" class="mr-2">
                    <label for="sunday" class="mr-4">日</label>


                </div>
            </div>


            <div class="mt-4">
                <x-button purpose="search" type="submit">
                    一括登録
                </x-button>
            </div>
        </form>
    </div>
</div>


<script>
    // Get the corporation and office dropdowns
const corpSelect = document.getElementById('corps_id');
// const officeSelect = document.getElementById('office_id');

// Get the offices data from the server
const offices = @json($offices);

// Function to populate the office dropdown based on the selected corporation
function populateOfficeDropdown(corpId) {
 officeSelect.innerHTML = '<option value="">所属</option>';

 // Filter the offices based on the selected corporation ID
 const filteredOffices = offices.filter(office => office.corp_id == corpId);

 // Loop through the filtered offices and create options
 filteredOffices.forEach(office => {
     const option = document.createElement('option');
     option.value = office.id; // Use office.id as the value
     option.text = office.office_name; // Use office.office_name as the text
     officeSelect.add(option);
 });
}

// Add an event listener to the corporation dropdown
corpSelect.addEventListener('change', () => {
 const selectedCorpId = corpSelect.value;
 populateOfficeDropdown(selectedCorpId);
});

// Populate the office dropdown when the page loads
populateOfficeDropdown('{{ $selectedCorpId }}');
 </script>

@endsection
