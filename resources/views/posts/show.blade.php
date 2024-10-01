<x-app-layout>
    <style>
        .responsive-video-container {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
        }
        .responsive-video-container iframe,
        .responsive-video-container object,
        .responsive-video-container embed {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
    <div class="w-full md:w-3/4 mx-auto bg-gray-100 p-8">
        <div class="bg-white shadow-md rounded-lg p-2 md:p-4">
            <div class="container mx-auto">
                <h1 class="text-xl md:text-2xl font-bold mb-4">{{ $post->title }}</h1>
                <p class="text-xs md:text-sm text-gray-500 text-bold">Posted by {{ $post->user->name }} <br> {{ $post->created_at->translatedFormat('Y年n月j日') }}</p>
                <div class="mb-4">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
        @if($post->attachments->count() >0)

            <div class="mt-4 bg-white rounded-lg shadow-md md:p-4">
                <h3 class="text-center font-semibold py-3">添付ファイル</h3>
                <ul>

                    <li class="px-3 py-5">
                        @foreach($post->attachments as $attachment)


                        <div class="flex items-center space-x-2">
                            <!-- Attachment Name -->
                            @if(in_array($attachment->file_type, ['pdf', 'jpg', 'jpeg', 'png', 'gif','xls','csv']))
                            <a href="{{ Storage::url($attachment->file_path) }}" target="_blank" class="hover:underline inline-block">
                                {{ $attachment->file_name }}
                            </a>

                            @elseif(in_array($attachment->file_type, ['docx', 'pptx']))

                            <a href="https://docs.google.com/gview?url={{ Storage::url($attachment->file_path) }}&embedded=true" target="_blank" class="hover:underline inline-block">
                                {{ $attachment->file_name }}
                            </a>

                        @endif

                        <a href="{{ route('download.attachment', $attachment->id) }}" class="hover:bg-green-200 inline-block">
                            <img src="{{ asset('5.svg') }}" alt="消去" class="w-5 h-5">

                        </a>




                            <!-- Eye Icon (View) -->
                            {{-- @if(in_array($attachment->file_type, ['pdf', 'jpg', 'jpeg', 'png', 'gif','xls','csv']))
                                <a href="{{ Storage::url($attachment->file_path) }}" target="_blank" class="hover:bg-green-200 inline-block">
                                    <img src="{{ asset('eye.svg') }}" alt="View PDFs" class="w-5 h-5">
                                </a>

                                @elseif(in_array($attachment->file_type, ['docx', 'pptx']))

                                <a href="https://docs.google.com/gview?url={{ Storage::url($attachment->file_path) }}&embedded=true" target="_blank" class="hover:bg-green-200 inline-block">
                                    <img src="{{ asset('eye.svg') }}" alt="View Document" class="w-5 h-5">
                                </a>

                            @endif --}}
                        </div>
                        @endforeach
                    </li>

                </ul>
            </div>



        @endif






        <div class="mt-8 bg-gray-200 shadow-md rounded-lg p-2 md:p-4">
            <h2 class="text-lg md:text-xl font-bold mb-4">コメント</h2>
            @forelse ($post->comments as $comment)
                <div class="bg-white shadow-sm rounded-lg p-2 md:p-4 mb-2">
                    <p>{{ $comment->content }}</p>
                    <p class="text-xs md:text-sm text-gray-500">{{ $comment->user->name ?? 'Anonymous' }} - {{ $comment->created_at->translatedFormat('Y年n月j日 H:i') }}</p>
                </div>
            @empty
                <p>コメントが無い</p>
            @endforelse
            @auth
            <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-4 flex flex-col md:flex-row">
                    @csrf
                    <textarea name="content" rows="3" class="w-full md:w-3/4 border-gray-300 rounded-md mb-2 md:mb-0 md:mr-2" placeholder="コメントを書く..." required></textarea>
                    <x-button purpose="search" type="submit">
                            コメント保存
                    </x-button>
                </form>
            @endauth
        </div>


    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const postContent = document.querySelector('.post-content');
        const iframes = postContent.querySelectorAll('iframe');

        iframes.forEach(function(iframe) {
            if (!iframe.parentNode.classList.contains('responsive-video-container')) {
                const wrapper = document.createElement('div');
                wrapper.classList.add('responsive-video-container');
                iframe.parentNode.insertBefore(wrapper, iframe);
                wrapper.appendChild(iframe);
            }
        });
    });
</script>
</x-app-layout>
