<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="category" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Category</label>
                            <select name="category_id" id="category" class="w-full border border-gray-300 dark:border-gray-700 rounded-md p-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:text-gray-300">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="tags" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Tags</label>
                            <select name="tags[]" id="tags" class="w-full border border-gray-300 dark:border-gray-700 rounded-md p-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:text-gray-300" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" @if($post->tags->contains($tag)) selected @endif>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Title</label>
                            <input type="text" name="title" id="title" class="w-full border border-gray-300 dark:border-gray-700 rounded-md p-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:text-gray-300" value="{{ $post->title }}" required>
                        </div>
                        <div class="mb-4">
                            <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                        </div>



                        <div class="mb-4">
                            <label for="attachments" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Attachments (PDF, Excel, Word, PowerPoint)</label>
                            <input type="file" name="attachments[]" id="attachments" class="w-full border border-gray-300 dark:border-gray-700 rounded-md p-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:text-gray-300" multiple accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx">
                        </div>



                        <x-button purpose="search" type="submit">
                            投稿更新
                        </x-button>
                    </form>
                </div>
                      <!-- Existing Attachments List with Delete Form for Each -->
                      <div class="mb-4 mt-6">
                        <h3 class="block text-gray-700 dark:text-gray-300 font-semibold mb-2 text-center">既存の添付ファイル</h3>
                        <ul>
                            @foreach ($post->attachments as $attachment)
                                <li class="flex justify-between items-center px-3">
                                    <a href="{{ route('download.attachment', $attachment->id) }}" class="text-blue-500">{{ $attachment->file_name }}</a>

                                    <!-- Separate form for deleting the attachment -->
                                    <form action="{{ route('attachments.destroy', $attachment->id) }}" method="POST" onsubmit="return confirm('本当に消去しますか？');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 hover:bg-red-200 inline-block">
                                            <img src="{{ asset('1.svg') }}" alt="消去" class="w-5 h-5">
                                        </button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
            </div>
        </div>
    </div>

    <!-- Include Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- Include jQuery and Summernote JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                        $editable.find('iframe').each(function() {
                            if (!$(this).parent().hasClass('responsive-video-container')) {
                                $(this).wrap('<div class="responsive-video-container"></div>');
                            }
                        });
                    }
                }
            });
        });

        $('form').submit(function() {
            var content = $('#summernote').summernote('code');
            content = content.replace(/<iframe/g, '<div class="responsive-video-container"><iframe');
            content = content.replace(/<\/iframe>/g, '</iframe></div>');
            $('#summernote').val(content);
        });
    </script>

    <style>
        .responsive-video-container {
            position: relative;
            padding-bottom: 56.25%;
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
</x-app-layout>
