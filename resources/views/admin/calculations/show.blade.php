
@extends('admin.dashboard')

@section('admin')



<div class="bg-gray-100 shadow-sm min-h-screen">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        <div class="shadow overflow-hidden rounded border-b border-gray-200 bg-white mt-10">



            <h1 class="px-2 py-2 text-xl font-medium mb-6 mt-5">
               時間設定 {{ $corp->corp_name }}

            </h1>


            <div class="mb-2 px-2">
                <x-button purpose="search" href="{{ route('admin.calculations.create') }}">
                    新規時間設定
                </x-button>

            </div>
        </div>






<div class="table-responsive mt-10">
    <table class="border  border-slate-400 min-w-full bg-white mt-5">
        <thead class="bg-gray-200 text-black">
            <tr>
                <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">
                    時刻</th>
                    <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">
                    名</th>
                    <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">
                    数字</th>
                    <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">
                    作動</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($corp->calculations as $calculation)
                <tr>
                    <td class="px-5 py-5 border border-gray-300 bg-white text-sm">
                        {{ $calculation->tsag }}
                    </td>
                    <td class="px-5 py-5 border border-gray-300 bg-white text-sm">
                        {{ $calculation->value }}
                    </td>
                    <td class="px-5 py-5 border border-gray-300 bg-white text-sm">
                        {{ $calculation->number }}
                    </td>


                    <td class="px-5 py-5 border border-gray-300 bg-white text-sm">


                        <a href="{{ route('admin.calculations.edit', $calculation->id) }}" class="p-2 hover:bg-yellow-200 inline-block">
                            <img src="{{ asset('2.svg') }}" alt="編集" class="w-10 h-10">
                        </a>

                        <form id="delete-form-{{ $calculation->id }}" action="{{ route('admin.calculations.destroy', $calculation->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                        <!-- Anchor tag to trigger the form submission -->
                        <a href="#"
                           onclick="event.preventDefault(); if(confirm('本当に消去しますか？')) { document.getElementById('delete-form-{{ $calculation->id }}').submit(); }"
                           class="p-2 hover:bg-red-200 inline-block">
                           <img src="{{ asset('1.svg') }}" alt="消去" class="w-10 h-10">
                        </a>


                    </td>
                </tr>

                @endforeach
            </tbody>

        </table>

    </div>

    <div class="mt-3 bg-white border border-gray-200 rounded-lg">
        <h2 class="text-center font-bold mt-2">時間設定説明</h2>
        <h3>posda</h3>
    </div>
</div>
@endsection







