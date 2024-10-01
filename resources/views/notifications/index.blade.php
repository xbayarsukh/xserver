<x-app-layout>
    @php
    $statusTranslations = [
        'pending' => '申請中',
        'approved' => '承認済み',
        'denied' => '拒否済み'
    ];

    $statusColors = [
        'pending' => 'bg-yellow-200 text-yellow-700',
        'approved' => 'bg-green-200 text-green-700',
        'denied' => 'bg-red-200 text-red-700'
    ];
    @endphp

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-3xl mt-3 px-6 py-4 text-center font-bold text-gray-700">通知</h1>

                <div class="p-6 bg-white border-b border-gray-200">
                    @forelse ($notifications as $notification)
                        <div class="mb-6 p-6 rounded-lg shadow-sm {{ $notification->read_at ? 'bg-stone-200' : 'bg-blue-100' }} transition-all duration-200 ease-in-out">

                            {{-- Post Notification --}}
                            @if(isset($notification->data['post_id']))
                                <div class="flex items-center space-x-4">
                                    <div class="bg-orange-100 p-3 rounded-full">
                                        <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-2.4 0-3.6-1.2-4.8-3C5.6 3.2 5 3 4 3s-1.6.2-2.4 2C.8 7.2 0 8.4 0 10c0 1.6 0 3.2 2 4 2 1 2.4 0 4 0s2.4 1 4 0 3.2 1.2 4 0 2.4-2.4 4-3.2C18 7.2 17 4.8 15 3S12 0 12 0z"></path>
                                        </svg>




                                    </div>
                                    <div>
                                        <p class="text-lg font-semibold text-gray-700">新規投稿通知</p>
                                        <p class="text-sm text-gray-500">
                                            投稿タイトル: <span class="font-bold">{{ $notification->data['title'] }}</span>
                                        </p>
                                        <a href="{{ route('notifications.markAsRead', $notification->id) }}" class="text-blue-500 hover:text-blue-700">詳しくは</a>
                                    </div>
                                </div>

                            {{-- Time-Off Request Notification --}}

                            @elseif(isset($notification->data['user_name']))
                                @if(auth()->user()->division_id ==6)
                                {{-- Hr specific time off request notificatrion --}}
                                <div class="flex items-center space-x-4">
                                    <div class="bg-pink-100 p-3 rounded-full">
                                        <svg class="w-6 h-6 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2-2 4 4M15 8l2 2"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-lg font-semibold text-gray-700">
                                            <span class="bg-green-200 px-2 py-1 rounded-md">{{ $notification->data['user_name'] }}</span> さんから勤怠届がありました。
                                        </p>
                                    @if(isset($notification->data['date']))
                                        <p class="text-sm text-gray-500">日付: {{ $notification->data['date'] }}</p>
                                    @endif

                                    @if (isset($notification->data['type']))
                                    <p class="text-sm text-gray-500">タイプ: {{ $notification->data['type'] }}</p>
                                    @endif

                                        <p class="text-sm text-gray-500">理由: {{ $notification->data['reason'] }}</p>
                                        <a href="{{ route('notifications.markAsRead', $notification->id) }}" class="text-blue-500 hover:text-blue-700">詳しくは</a>
                                    </div>
                                </div>

                                @else
                                {{-- non HR time off request notification  --}}

                                <div class="flex items-center space-x-4">
                                    <div class="bg-green-100 p-3 rounded-full">
                                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2-2 4 4M15 8l2 2"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-lg font-semibold ttext-gray-700">
                                            <span class="bg-green-200 px-2 py-1 rounded-md">
                                                {{ $notification->data['user_name'] }}</span> さんから勤怠届がありました。

                                        </p>
                                        <a href="{{ route('notifications.markAsRead', $notification->id) }}" class="text-blue-500 hover:text-blue-700">詳しくは</a>
                                    </div>

                                </div>

                                @endif



                            {{-- Time-Off Request Status Change Notification --}}
                            @elseif(isset($notification->data['status']))
                                <div class="flex items-center space-x-4">
                                    <div class="bg-indigo-100 p-3 rounded-full">
                                        <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h-4l-2 2-6-6m16 8l-3 3-6-6"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-lg font-semibold text-gray-700">勤怠届通知</p>
                                        <p class="text-sm {{ $statusColors[$notification->data['status']] }} px-2 py-1 rounded-md font-bold">
                                            {{ $statusTranslations[$notification->data['status']] }}
                                        </p>
                                        <p class="text-sm text-gray-500">申請日: {{ $notification->data['date'] }}</p>
                                        <a href="{{ route('notifications.markAsRead', $notification->id) }}" class="text-blue-500 hover:text-blue-700">詳しくは</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @empty
                        <p class="text-sky-500">通知がありません。</p>
                    @endforelse

                    <div class="mt-6">
                        {{ $notifications->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</x-app-layout>
