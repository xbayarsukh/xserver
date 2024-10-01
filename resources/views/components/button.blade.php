@props([
    'href' => null,
    'type' => 'button',
    'purpose' => 'default',
])

@php
$baseClasses = 'inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md font-bold text-sm ';

$purposeClasses = [
    'default' => 'bg-gray-500 hover:bg-gray-700 text-white ',
    'create' => 'bg-lime-700 hover:bg-lime-800 text-white ',
    'edit' => 'bg-yellow-300 hover:bg-yellow-400 text-white ',
    'delete' => 'bg-red-200 hover:bg-red-400 text-white ',
    'search' => 'bg-cyan-600 hover:bg-cyan-700 text-white ',
    'submit' => 'bg-slate-400 hover:bg-slate-500 text-white ',
];

$widthClasses = [
    'default' => 'w-32',
    'create' => 'w-32',
    'edit' => 'w-32',
    'delete' => 'w-32',
    'search' => 'w-32',
    'submit' => 'w-32',
];

$tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }}
    @if($href)
        href="{{ $href }}"
    @else
        type="{{ $type }}"
    @endif
    {{ $attributes->merge([
        'class' => $baseClasses . ' ' . ($purposeClasses[$purpose] ?? $purposeClasses['default']) . ' ' . ($widthClasses[$purpose] ?? $widthClasses['default'])
    ]) }}
>
    {{ $slot }}
</{{ $tag }}>

<!--Zuragtai cruduud -->
{{-- <td class="border border-slate-300 px-4 py-2">
    <div class="action-buttons">
        <a href="{{ route('admin.assign-corporation', $user->id) }}" class="p-2 hover:bg-blue-400 inline-block">
            <img src="{{ asset('com.svg') }}" alt="所属" class="w-10 h-10">
        </a>
        <a href="{{ route('admin.assign-office', $user->id) }}" class="p-2 hover:bg-green-200 inline-block">
            <img src="{{ asset('office.svg') }}" alt="所属" class="w-10 h-10">
        </a>
        <a href="{{ url('/admin/role-permission/users/' . $user->id . '/edit') }}" class="p-2 hover:bg-yellow-200 inline-block">
            <img src="{{ asset('2.svg') }}" alt="編集" class="w-10 h-10">
        </a>
        <a href="{{ url('/admin/role-permission/users/' . $user->id . '/delete') }}" onclick="return confirm('本当に消去しますか？')" class="p-2 hover:bg-red-200 inline-block">
            <img src="{{ asset('1.svg') }}" alt="消去" class="w-10 h-10">
        </a>
    </div>
</td>
</tr> --}}

{{--
<!-- Create button -->
<x-button purpose="create" href="{{ route('posts.create') }}">
    新規投稿
</x-button>

<!-- Edit button -->
<x-button purpose="edit" href="{{ route('posts.edit', $post) }}">
    編集
</x-button>

<!-- Delete button -->
<form method="POST" action="{{ route('posts.destroy', $post) }}">
    @csrf
    @method('DELETE')
    <x-button purpose="delete" type="submit">
        削除
    </x-button>
</form>

<!-- Search button -->
<x-button purpose="search" type="submit">
    検索
</x-button>

<!-- Submit button -->
<x-button purpose="submit" type="submit">
    送信
</x-button> --}}

{{-- <x-button href="{{ route('posts.create') }}" color="blue" class="mb-2 md:mb-0">
    新規投稿
</x-button> --}}




{{--For Submit button
 <form action="{{ route('search') }}" method="GET">
    <!-- Your form inputs here -->
    <x-button type="submit" color="blue">
        検索
    </x-button>
</form> --}}

{{-- Regular Button
<x-button color="blue" @click="openModal">
    開く
</x-button> --}}



