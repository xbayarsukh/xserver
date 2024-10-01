@props([
    'align' => 'right',
    'width' => '48',
    'contentClasses' => 'py-1 bg-white dark:bg-gray-700',
    'list' => [
        ['label' => 'United States', 'value' => 'USA'],
        ['label' => 'Japan', 'value' => 'JPY']
    ]
])

<div>
    <label>{{ $slot }}</label>
    <select id="small" class="border-gray-300 rounded-md shadow-sm">
        <option selected>Choose a country</option>
        @foreach($list as $row)
            <option value="{{ $row['value'] }}">{{ $row['label'] }}</option>
        @endforeach
    </select>
</div>
