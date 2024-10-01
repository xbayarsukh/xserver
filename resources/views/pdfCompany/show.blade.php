<x-app-layout>
    <div class="bg-gray-100 shadow-sm min-h-screen">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div id="successToast"
                    class="fixed top-20 left-0 w-full bg-red-100 border-b border-gray-500 rounded-b px-4 py-3 shadow-md z-50">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 2a8 8 0 100 16 8 8 0 000-16zM9 12a1 1 0 112 0v1a1 1 0 11-2 0v-1zm1-8a7 7 0 110 14 7 7 0 010-14z"
                                    clip-rule="evenodd" />
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
                            }, 3000);
                        }
                    });
                </script>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">エラー!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="shadow overflow-hidden rounded border-b border-gray-200 bg-white mt-6 sm:mt-10">
                <h1 class="px-4 py-4 text-xl font-medium mb-4 sm:mb-6">
                    PDFCompany管理
                </h1>

                <h2 class="text-2xl font-bold mb-4 text-left py-2 px-4">{{ $pdfCompany->name }}</h2>

                <div class="flex flex-wrap gap-2 mb-4 px-4">

                    <form action="{{ route('pdf.import', $pdfCompany) }}" method="POST" enctype="multipart/form-data" class="w-full sm:w-auto">
                        @csrf
                        <div class="flex flex-col sm:flex-row items-center gap-4 p-4 bg-white rounded-lg shadow">
                            <div class="w-full sm:w-auto flex flex-col sm:flex-row items-center gap-2">
                                <label for="content_type" class="sr-only">Content Type</label>
                                <select name="content_type" id="content_type" class="p-2 border rounded w-full sm:w-auto">
                                    <option value="">選択</option>
                                    <option value="file">ファイル</option>
                                    <option value="youtube">YouTube リンク</option>
                                </select>
                            </div>

                            <div id="fileInputGroup" class="w-full sm:w-auto flex flex-col sm:flex-row items-center gap-2">
                                <input type="file" name="pdf" accept=".pdf,.pptx" class="w-full sm:w-auto" id="fileInput">
                                <x-button purpose="search" type="submit" name="submit_type" value="file" class="w-full sm:w-auto mt-2">
                                    ファイル輸入
                                </x-button>
                            </div>

                            <div id="urlInputGroup" class="w-full sm:w-auto flex flex-col sm:flex-row items-center gap-2" style="display: none;">
                                <input type="url" name="youtube_link" placeholder="YouTube URL を入力" id="urlInput" class="p-2 border rounded w-full sm:w-auto">
                                <x-button type="submit" purpose="search" name="submit_type" value="youtube" class="w-full sm:w-auto mt-2">
                                    YouTube 輸入
                                </x-button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="overflow-x-auto mt-6 sm:mt-10">
                <table class="border-collapse border border-slate-400 min-w-full bg-white">
                    <thead class="bg-gray-200 text-black">
                        <tr>
                            <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">番号
                            </th>
                            <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">
                                ファイル名</th>
                            <th
                                class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm hidden sm:table-cell">
                                リンク</th>
                            <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">作動
                            </th>
                            <th class="border border-slate-300 text-left py-3 px-4 uppercase font-semibold text-sm">消去
                            </th>
                        </tr>
                    </thead>

                            <tbody>
                                @foreach ($pdfCompany->pdfs as $index => $pdf)
                                    <tr class="border-b border-gray-200 hover:bg-blue-50">
                                        <td class="border border-slate-300 px-2 py-2 text-sm sm:px-4">{{ $index + 1 }}</td>
                                        <td class="border border-slate-300 px-2 py-2 text-sm sm:px-4">
                                            <div class="truncate max-w-[150px] sm:max-w-none">{{ $pdf->filename }}</div>
                                        </td>
                                        <td class="border border-slate-300 px-2 py-2 text-sm sm:px-4 hidden sm:table-cell">
                                            @if ($pdf->type === 'youtube')
                                                <a href="{{ $pdf->path }}" target="_blank" class="text-blue-500 hover:underline">
                                                    <div class="truncate max-w-[150px] sm:max-w-none">{{ $pdf->path }}</div>
                                                </a>
                                            @else
                                                <div class="truncate max-w-[150px] sm:max-w-none">{{ $pdf->path }}</div>
                                            @endif
                                        </td>
                                        <td class="border border-slate-300 px-2 py-2 sm:px-4">
                                            <div class="flex flex-col sm:flex-row items-center justify-center space-y-2 sm:space-y-0 sm:space-x-2">
                                                @if ($pdf->type === 'pdf')
                                                    <a href="{{ route('pdf.view', $pdf) }}" target="_blank" class="p-1 hover:bg-green-200 inline-block">
                                                        <img src="{{ asset('eye.svg') }}" alt="編集" class="w-6 h-6 sm:w-8 sm:h-8">
                                                    </a>
                                                @elseif($pdf->type === 'pptx')
                                                    <a href="{{ route('pdf.view', $pdf) }}" target="_blank" class="p-1 hover:bg-green-200 inline-block">
                                                        <img src="{{ asset('eye.svg') }}" alt="View" class="w-6 h-6 sm:w-8 sm:h-8">
                                                    </a>
                                                    <a href="{{ route('pdf.download', $pdf) }}" class="p-1 hover:bg-yellow-200 inline-block">
                                                        <img src="{{ asset('dwn.svg') }}" alt="Download" class="w-6 h-6 sm:w-8 sm:h-8">
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="border border-slate-300 px-2 py-2 sm:px-4">
                                            <form action="{{ route('pdf.destroy', $pdf) }}" method="POST" class="flex justify-center">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-1 hover:bg-red-200 inline-block" onclick="return confirm('本当に消去しますか?')">
                                                    <img src="{{ asset('1.svg') }}" alt="消去" class="w-6 h-6 sm:w-8 sm:h-8">
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </table>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var contentTypeSelect = document.getElementById('content_type');
            var fileInputGroup = document.getElementById('fileInputGroup');
            var urlInputGroup = document.getElementById('urlInputGroup');

            function toggleInputs() {
                if (contentTypeSelect.value === 'file') {
                    fileInputGroup.style.display = 'block';
                    urlInputGroup.style.display = 'none';
                } else {
                    fileInputGroup.style.display = 'none';
                    urlInputGroup.style.display = 'block';
                }
            }

            contentTypeSelect.addEventListener('change', toggleInputs);
            toggleInputs(); // Call once to set initial state
        });
    </script>
</x-app-layout>
