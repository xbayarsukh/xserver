<div class="overflow-x-auto">
<table class="border-collapse border border-slate-400 min-w-full bg-white">
    <!-- Table header -->



    <div class="md:px-10 py-8 w-full">
        <div class="shadow overflow-hidden rounded border-b border-gray-200">
            <table class="border-collapse border border-slate-400 min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="border border-slate-300 text-left py-2 px-2 md:py-3 md:px-4 uppercase font-semibold text-xs md:text-sm">申請ID</th>
                        <th class="border border-slate-300 text-left py-2 px-2 md:py-3 md:px-4 uppercase font-semibold text-xs md:text-sm">社員名</th>

                        <th class="border border-slate-300 text-left py-2 px-2 md:py-3 md:px-4 uppercase font-semibold text-xs md:text-sm whitespace-nowrap hidden md:table-cell">
                            Application ID</th>
                        <th class="border border-slate-300 text-left py-2 px-2 md:py-3 md:px-4 uppercase font-semibold text-xs md:text-sm whitespace-nowrap hidden md:table-cell">送信日付け
                        </th>
                        <th class="border border-slate-300 text-left py-2 px-2 md:py-3 md:px-4 uppercase font-semibold text-xs md:text-sm whitespace-nowrap hidden md:table-cell">返事日付け
                        </th>
                        <th class="border border-slate-300 text-left py-2 px-2 md:py-3 md:px-4 uppercase font-semibold text-xs md:text-sm">送信先上司</th>
                        <th class="border border-slate-300 text-left py-2 px-2 md:py-3 md:px-4 uppercase font-semibold text-xs md:text-sm">状態</th>
                        <th class="border border-slate-300 text-left py-2 px-2 md:py-3 md:px-4 uppercase font-semibold text-xs md:text-sm">actions
                        </th>
                        <th class="border border-slate-300 text-left py-2 px-2 md:py-3 md:px-4 uppercase font-semibold text-xs md:text-sm whitespace-nowrap hidden md:table-cell">comment
                        </th>
                    </tr>
    <tbody class="text-gray-700">

        @foreach ($applications as $application)
        <tr class="border-b border-gray-200 hover:bg-gray-200">

            <td class="border border-slate-300 px-2 py-1 md:px-4 md:py-2">{{ $application->id }}</td>
            <td class="border border-slate-300 px-2 py-1 md:px-4 md:py-2">{{ $application->user->name }}</td>


            <td class="border border-slate-300 px-2 py-1 md:px-4 md:py-2 whitespace-nowrap hidden md:table-cell">{{ $application->applicationable_id }}</td>
            <td class="border border-slate-300 px-2 py-1 md:px-4 md:py-2 whitespace-nowrap hidden md:table-cell">{{ $application->created_at }}</td>
            <td class="border border-slate-300 px-2 py-1 md:px-4 md:py-2 whitespace-nowrap hidden md:table-cell">{{ $application->updated_at }}</td>
            <td class="border border-slate-300 px-2 py-1 md:px-4 md:py-2">{{ $application->boss->name ?? 'N/A' }}</td>
            <td class="border border-slate-300 px-2 py-1 md:px-4 md:py-2">
                @if ($application->status == 'approved')
                    <div class="flex items-center">
                        <span>{{ $application->status }}</span>
                        <img src="{{ asset('images/approved.png') }}" alt="Approved"
                            class="ml-2 w-10 h-10">
                    </div>
                @elseif($application->status == 'denied')
                    <div class="flex items-center">
                        <span>{{ $application->status }}</span>
                        <img src="{{ asset('images/denied.png') }}" alt="Denied"
                            class="ml-2 w-10 h-10">
                    </div>
                @else
                    <span>{{ $application->status }}</span>
                @endif
            </td>




            <td class="border border-slate-300 px-4 py-2">
                <a href="{{ route('applications.show', $application) }}"
                    class="text-blue-500 hover:underline">View</a>
            </td>
            <td class="border border-slate-300 px-4 py-2 whitespace-nowrap hidden md:table-cell">
            </td>


        </tr>
    @endforeach
    </tbody>
</table>

{{ $applications->links() }}
</div>
