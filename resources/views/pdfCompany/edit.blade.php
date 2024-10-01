<x-app-layout>


    <div class="container mx-auto py-8">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
            <h1 class="text-xl font-mild mb-6"> PDFCompany管理</h1>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">無効データ入力</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <h1 class="text-2xl font-bold mb-4">新規登録</h1>

            <form action="{{ route('pdfCompany.update', $pdfCompany->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">会社名</label>
                    <input type="text" name="name" id="name"
                        class="form-select mt-1 block w-full sm:w-2/3 md:w-1/2 lg:w-1/3 border border-black focus:ring-opacity-80"
                        required value="{{ old('name', $pdfCompany->name) }}">
                </div>





                <div class="flex justify-between">
                    <x-button purpose="default" type="" href="{{ url('/pdfCompany') }}">
                        戻る
                    </x-button>
                    <x-button purpose="search" type="submit">
                        追加
                    </x-button>

                </div>

            </form>
        </div>


    </div>
    </div>


</x-app-layout>
