<x-app-layout>



<div class="flex justify-center mt-1">
    @if (session('success'))
        <div id="flash-message" class="bg-sky-200 border border-blue-300 text-blue-800 px-6 py-4 rounded-lg shadow-lg flex items-center max-w-xl w-full">
            <svg class="w-6 h-6 mr-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-11a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 01-1 1h-2a1 1 0 01-1-1V7zm0 4a1 1 0 011 1v2a1 1 0 102 0v-2a1 1 0 10-2 0H9v-2a1 1 0 00-1-1H8a1 1 0 100 2h1v1z" clip-rule="evenodd" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-200 border border-red-300 text-red-800 px-6 py-4 rounded-lg shadow-lg flex items-center max-w-xl w-full mt-4">
            <svg class="w-6 h-6 mr-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 8a6 6 0 11-12 0 6 6 0 0112 0zm-1 1a1 1 0 00-2 0v2a1 1 0 002 0V9zm-4 1a1 1 0 00-1-1H7a1 1 0 000 2h6a1 1 0 001-1z" clip-rule="evenodd" />
            </svg>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>





<div class="flex flex-col min-h-screen bg-gray-100">
    <div class="flex-grow overflow-hidden">
        <div class="container mx-auto px-4 py-8">

            <div class="shadow overflow-hidden rounded border-b border-gray-200 bg-white mt-10 p-4 sm:p-6 lg:p-8">



                <h1 class="px-2 py-2 text-xl font-medium mb-6 mt-5">
                    家族管理

                </h1>


                <h1 class="text-2xl font-semibold mb-4 text-left py-4 px-2 text-gray-700">{{ $user->name }} さんの家族一覧</h1>

                <div class="flex flex-wrap gap-2 mb-4 px-2">
                    <x-button purpose="search" href="{{ route('myPage.family-create') }}">
                        新規登録
                    </x-button>



                </div>


            </div>

            <div class="flex justify-center mt-10 mb-10">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-lg rounded-lg border border-slate-400">
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
                                <th class="min-w-[100px] border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm hidden lg:table-cell">
                                    住所区分
                                </th>
                                <th class="min-w-[200px] border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm hidden lg:table-cell">
                                    住所
                                </th>
                                <th class="min-w-[100px] border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm hidden lg:table-cell">
                                    見積所得
                                </th>
                                <th class="min-w-[100px] border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm hidden lg:table-cell">
                                    社会保険被扶養者区分
                                </th>
                                <th class="min-w-[110px] border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm hidden lg:table-cell">
                                    氏名フリガナ
                                </th>
                                <th class="min-w-[100px] border border-slate-400 text-left py-3 px-4 uppercase font-semibold text-sm">
                                    作動
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-sm">
                            @foreach ($user->userFamily as $family)
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
                                    <td class="border border-slate-300 px-4 py-3 hidden lg:table-cell">
                                        {{ $family->family_address_type }}
                                    </td>
                                    <td class="border border-slate-300 px-4 py-3 hidden lg:table-cell">
                                        {{ $family->family_address }}
                                    </td>
                                    <td class="border border-slate-300 px-4 py-3 hidden lg:table-cell">
                                        {{ $family->family_estimated_income }}
                                    </td>
                                    <td class="border border-slate-300 px-4 py-3 hidden lg:table-cell">
                                        {{ $family->family_insurance_status }}
                                    </td>
                                    <td class="border border-slate-300 px-4 py-3 hidden lg:table-cell">
                                        {{ $family->family_name_furigana }}
                                    </td>
                                    <td class="border border-slate-300 px-4 py-3">
                                        <div class="flex justify-between">
                                            <a href="{{ route('myPage.family-edit', $family->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-100 hover:text-yellow-900">
                                                <img src="{{ asset('2.svg') }}" alt="Edit" class="inline w-5 h-5 mr-7">
                                            </a>
                                            <form action="{{ route('myPage.family-destroy', $family->id) }}" method="POST" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-100 hover:text-red-900">
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
            </div>


            </x-app-layout>











