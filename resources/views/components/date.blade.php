@props(['name','label'])


<div class="mb-4">
    <label for="end_date">{{ $label }}</label>
    <input type="date" id="{{ $name }}" name="{{ $name }}" class="form-input border-gray-300 rounded-md shadow-sm">
</div>
