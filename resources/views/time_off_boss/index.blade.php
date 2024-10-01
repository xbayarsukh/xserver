<x-app-layout>

    <div class="bg-gray-100 shadow-sm min-h-screen">
        <div class="container mx-auto px-4">


            @if (session('success'))
            <div id="successToast" class="fixed top-20 left-0 w-full bg-gray-100 border-b border-gray-500 rounded-b px-4 py-3 shadow-md">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zM9 12a1 1 0 112 0v1a1 1 0 11-2 0v-1zm1-8a7 7 0 110 14 7 7 0 010-14z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-semibold text-gray-700">{{ session('success') }}</p>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var successToast = document.getElementById('successToast');
                    if (successToast) {
                        setTimeout(function() {
                            successToast.classList.add('hidden');
                        }, 3000); // Disappear after 3 seconds
                    }
                });
            </script>

            @endif

        <div class="shadow overflow-hidden rounded border-b border-gray-200 bg-white mt-10">

            <h1 class="px-2 py-2 text-xl font-medium mb-6 mt-5">
                勤怠届上司管理

            </h1>

            <h1 class="text-2xl font-bold mb-4 text-left py-4 px-2">勤怠届一覧</h1>



        </div>


            <div class="table-responsive mt-10">
                <table class="border-collapse border border-slate-400 min-w-full bg-white mt-5">
                    <thead class="bg-gray-200 text-black">
                        <tr>

                                <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">送信人</th>
                                <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">勤怠区分</th>
                                <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">日付</th>
                                <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">理由１</th>
                                <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">理由２</th>
                                <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">送信日付け</th>
                                <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">状態</th>
                                <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">動作</th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-700">
                            @foreach ($timeOffRequestRecords as $record)
                            <tr class="border-b border-gray-200 hover:bg-blue-50">
                                <td class="border border-slate-300 px-4 py-2">{{ $record->user ? $record->user->name : '' }}</td>
                                <td class="border border-slate-300 px-4 py-2">{{ $record->attendanceTypeRecord ? $record->attendanceTypeRecord->name : '' }}</td>
                                <td class="border border-slate-300 px-4 py-2">{{ $record->date }}</td>
                                <td class="border border-slate-300 px-4 py-2">{{ $record->reason_select }}</td>
                                <td class="border border-slate-300 px-4 py-2">{{ $record->reason }}</td>
                                <td class="border border-slate-300 px-4 py-2">{{ $record->created_at }}</td>

                                <td class="border border-slate-300 px-4 py-2">{{ $record->status }}</td>

                                <td class="border border-slate-300 px-4 py-2">
                                    <form action="{{ route('time_off_boss.updateStatus', $record->id) }}" method="POST" class="space-y-2">
                                        @csrf
                                        <button type="submit" name="status" value="approved"
                                            class="bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded {{ $record->status !== 'pending' ? 'opacity-50 cursor-not-allowed' : '' }}"
                                            {{ $record->status !== 'pending' ? 'disabled' : '' }}>
                                            承認
                                        </button>
                                        <button type="submit" name="status" value="denied"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded {{ $record->status !== 'pending' ? 'opacity-50 cursor-not-allowed' : '' }}"
                                            {{ $record->status !== 'pending' ? 'disabled' : '' }}>
                                            拒否
                                        </button>
                                        @if($record->status === 'pending')
                                            <select name="division_id" id="division_id" class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200">
                                                <option value="">会社選択</option>
                                                @foreach($divisions as $division)
                                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </form>
                                </td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
