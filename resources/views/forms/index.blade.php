<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">社内書式集</h1>

        <form method="GET" action="{{ route('forms.index') }}" class="py-3 content-center">
            <input type="text" name="search" placeholder="Search by title" value="{{ request('search') }}">
            <x-button purpose="submit" type="submit">
                検索
            </x-button>
        </form>


        @foreach  ($formGroups as $groupName => $forms)
            <div class="mb-4 border border-gray-300 rounded-lg shadow-sm">
                <button class="w-full text-left px-4 py-3 bg-gray-50 hover:bg-green-200 focus:outline-none transition duration-150 ease-in-out" onclick="toggleFolder(this)">
                    <div class="flex items-center justify-between">
                        <span class="text-xl font-semibold text-gray-700">
                            <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                            </svg>
                            {{ $groupName }}
                        </span>
                        <svg class="w-5 h-5 transform transition-transform duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </button>
                <div class="hidden">
                    <ul class="py-2 px-4 space-y-2">
                        @foreach ($forms as $key => $form)
                            <li>
                                @if (isset($form['subforms']))
                                    <div class="mb-2">
                                        <button onclick="toggleSubforms(this)" class="text-blue-600 hover:text-blue-800 hover:underline transition duration-150 ease-in-out">
                                            {{ $form['title'] }}
                                        </button>
                                        <div class="hidden ml-4 mt-2">
                                            @foreach ($form['subforms'] as $subKey => $subForm)
                                                <a href="{{ route('forms.show', $key . '-' . $subKey) }}" class="block text-blue-600 hover:text-blue-800 hover:underline transition duration-150 ease-in-out">
                                                    {{ $subForm['title'] }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ route('forms.show', $key) }}" class="text-blue-600 hover:text-blue-800 hover:underline transition duration-150 ease-in-out">
                                        {{ $form['title'] }}
                                    </a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
            @if(!empty($search)&& !empty($relevantInstructions))
            <div class="mt-8">
                <h2 class="text-2xl font-bold mb-4">Q&A</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($relevantInstructions as $instruction)
                        <div class="bg-white p-4 rounded shadow">
                            <div class="text-blue-500 font-bold">Q</div>
                            <div class="font-bold">{{ $instruction['question'] }}</div>
                            <div class="text-yellow-500 font-bold">A</div>
                            <div class="font-bold">{{ $instruction['answer'] }}</div>



                        </div>

                    @endforeach

                </div>

            </div>
        @endif

{{-- one section
 @if(!empty($filteredGroups))
        @foreach($filteredGroups as $groupName =>$forms)

        @endforeach
    @else
    <p>no result</p>
    @endif

    @if(!empty($relevantInstructions))
    <div class="mt-8">
        <h2 class="text-2xl font-bold mb-4">Q＆A</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($relevantInstructions as $instruction)
                <div class="bg-white p-4 rounded shadow">
                    <div class="text-blue-500 font-bold">Q</div>
                    <div class="font-semibold mt-2">{{ $instruction['question'] }}</div>
                    <div class="mt-2">A</div>
                    <div class="mt-2">{{ $instruction['answer'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
    @endif --}}



        {{-- <div class="container mx-auto p-6 bg-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- First Question -->
                <div class="bg-white p-4 rounded shadow">
                    <div class="text-blue-500 font-bold">Q</div>
                    <div class="font-semibold mt-2">ECサイトのGMV増減によりサービス利用料金は変わりますか？</div>
                    <div class="mt-2">A</div>
                    <div class="mt-2">ECサイトのGMVにもとづた複数のプランをご用意しております。ご適用される料金プランは、前月のGMVに応じて自動で変更されます。詳細は本資料のページを参照してください。</div>
                </div>

                <!-- Second Question -->
                <div class="bg-white p-4 rounded shadow">
                    <div class="text-blue-500 font-bold">Q</div>
                    <div class="font-semibold mt-2">申込みからどれくらいで利用できますか？</div>
                    <div class="mt-2">A</div>
                    <div class="mt-2">お客様情報の登録により異なりますが、お申込み後２週間程度でご利用開始日をご案内させていただきます。申込み内容にお客様独自にAPI接続が必要な場合は別途お問い合わせください。</div>
                </div>

                <!-- Third Question -->
                <div class="bg-white p-4 rounded shadow">
                    <div class="text-blue-500 font-bold">Q</div>
                    <div class="font-semibold mt-2">API接続にあたってサポートは受けられますか？</div>
                    <div class="mt-2">A</div>
                    <div class="mt-2">アカウント発行の際に専任サポート担当者をご案内させていただきます。実装上の様々なご相談やサービス利用上でのご相談まで幅広く対応可能ですのでお気軽にご相談ください。</div>
                </div>

                <!-- Fourth Question -->
                <div class="bg-white p-4 rounded shadow">
                    <div class="text-blue-500 font-bold">Q</div>
                    <div class="font-semibold mt-2">どのような支払い方法がありますか？請求書払いには対応していますか？</div>
                    <div class="mt-2">A</div>
                    <div class="mt-2">クレジットカード払い、請求書払い（口座振込）をご利用いただけます。また、支払い方法はサポートサイトにてご登録いただけます。</div>
                </div>
            </div>
        </div> --}}

    </div>
</div>

    <script>
        function toggleFolder(button) {
            const folder = button.nextElementSibling;
            const arrow = button.querySelector('svg:last-child');

            folder.classList.toggle('hidden');
            arrow.classList.toggle('rotate-180');
        }

        function toggleSubforms(button) {
            const subforms = button.nextElementSibling;
            subforms.classList.toggle('hidden');
        }
    </script>
</x-app-layout>
