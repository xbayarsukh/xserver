@extends('admin.dashboard')

@section('admin')

@if (session('success'))
<div class="mb-4 px-4 py-2 bg-green-100 border-2 border-green-400 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="mb-4 px-4 py-2 bg-red-100 border-2 border-red-400 text-red-700 rounded">
    <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<div class="flex flex-col min-h-screen bg-gray-100">
    <div class="flex-grow overflow-hidden">
        <div class="container mx-auto px-4 py-8">

            <div class="shadow overflow-hidden rounded border-b border-gray-200 bg-white mt-10 p-4 sm:p-6 lg:p-8">



                <h1 class="px-2 py-2 text-xl font-medium mb-6 mt-5">
                    家族管理

                </h1>


                <h1 class="text-2xl font-semibold mb-4 text-left py-4 px-2 text-gray-700">{{ $users->name }} さんの家族一覧</h1>

                <div class="flex flex-wrap gap-2 mb-4 px-2">
                    <x-button purpose="search" href="{{ route('admin.user-details.family-create',$users->id) }}">
                        新規登録
                    </x-button>



                </div>


            </div>

            <div class="flex justify-center mt-10 mb-10">
                <div class="table-responsive">
                    <table class="w-full bg-white shadow-lg rounded-lg overflow-hidden border border-slate-400">
                        <thead class="bg-blue-200 text-gray-700">
                        <tr>

                            <th class="min-w-[120px] border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm">
                                家族：氏名
                            </th>
                            <th class="min-w-[100px] border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm">
                              続柄
                            </th>
                            <th class="min-w-[120px] border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm">
                               生年月日
                            </th>
                            <th class="min-w-[200px] border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm hide-on-mobile">
                             扶養区分
                            </th>
                            <th class="min-w-[110px] border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm">
                              同居老親区分

                            </th>
                            <th class="min-w-[110px] border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm hide-on-mobile">
                             障害者区分
                            </th>
                            <th class="min-w-[100px] border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm hide-on-mobile">
                                住所区分

                            </th>
                            <th class="min-w-[200px] border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm hide-on-mobile">
                              住所

                            </th>
                            <th class="min-w-[100px] border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm hide-on-mobile">
                                見積所得
                            </th>
                            <th class="min-w-[100px] border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm hide-on-mobile">
                               社会保険被扶養者区分
                            </th>
                            <th class="min-w-[110px] border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm">
                                氏名フリガナ
                            </th>

                            <th class="min-w-[100px] border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm">
                                作動
                            </th>
                        </tr>
                    </thead>
                    {{-- <td class="border border-slate-300 px-4 py-3">
                        @if ($users->userFamily->isNotEmpty())
                            @foreach ($users->userFamily as $family)
                                <p>{{ $family->family_name }}</p>
                            @endforeach
                        @else
                            No family data
                        @endif
                    </td> --}}



                    <tbody class="text-gray-700 text-sm">
                        @foreach ($users->userFamily as $family)
                            <tr class="hover:bg-stone-100 border-b">
                                <td class="border border-slate-300 px-4 py-3">
                                    {{ $family->family_name }}
                                </td>
                                <td class="border border-slate-300 px-4 py-3">
                                    {{ $family->family_relationship }}
                                </td>
                                <td class="border border-slate-300 px-4 py-3">
                                    {{ $family->family_birthdate }}

                                </td>
                                <td class="border border-slate-300 px-4 py-3 hide-on-mobile">
                                    {{ $family->family_dependent_status }}
                                </td>
                                <td class="border border-slate-300 px-4 py-3 hide-on-mobile">
                                    {{ $family->family_cohabiting_parent }}
                                </td>
                                <td class="border border-slate-300 px-4 py-3 hide-on-mobile">
                                    {{ $family->family_disability_status }}
                                </td>
                                <td class="border border-slate-300 px-4 py-3 hide-on-mobile">
                                    {{ $family->family_address_type }}
                                </td>
                                <td class="border border-slate-300 px-4 py-3 hide-on-mobile">
                                    {{ $family->family_address }}
                                </td>

                                <td class="border border-slate-300 px-4 py-3 hide-on-mobile">
                                    {{ $family->family_estimated_income }}
                                </td>

                                <td class="border border-slate-300 px-4 py-3 hide-on-mobile">
                                    {{ $family->family_insurance_status }}
                                </td>
                                <td class="border border-slate-300 px-4 py-3 hide-on-mobile">
                                    {{ $family->family_name_furigana }}
                                </td>


                                <td class="border border-slate-300 px-4 py-3">
                                    <div class="flex justify-between">
                                        <a href="{{ route('admin.user-details.family-edit', ['userId' => $users->id, 'familyId' => $family->id]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-100 hover:text-yellow-900">
                                            <img src="{{ asset('2.svg') }}" alt="Edit" class="inline w-5 h-5 mr-7">
                                        </a>
                                        <form action="{{ route('admin.user-details.family-destroy', ['userId' => $users->id, 'familyId' => $family->id]) }}" method="POST"  class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-100 hover:text-red-900" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('この家族メンバーを削除してもよろしいですか?')">
                                                <img src="{{ asset('1.svg') }}" alt="Delete" class="inline w-5 h-5 mr-7">
                                            </button>
                                        </form>

                                    </div>

                                </td>




                            </tr>
                        @endforeach
                    </tbody>
                    </table>


                </div>






@endsection
