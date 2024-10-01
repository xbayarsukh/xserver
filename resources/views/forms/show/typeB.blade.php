@props(['form', 'readonly' => false])

<x-app-layout>
    <h1>Form Type B</h1>

    <form action="#" method="POST">
        @csrf
        <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
            <h1 class="text-3xl font-bold text-center mb-6">営業費使用伺書</h1>

            <div class="grid grid-cols-3 gap-4 mb-6 bg-blue-100 p-4 rounded">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">list</label>
                    <input type="text" value="{{ $form->list ?? '' }}" readonly class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">相手先</label>
                    <input type="text" value="{{ $form->customer ?? '' }}" readonly class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">品名</label>
                    <input type="text" value="{{ $form->produc_name ?? '' }}" readonly class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">数量</label>
                    <input type="text" value="{{ $form->pieces ?? '' }}" readonly class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">金額</label>
                    <input type="text" value="{{ $form->payment ?? '' }}" readonly class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>

            <div class="mb-4">
                <label for="description">Memo</label>
                <textarea id="description" name="description" readonly class="form-textarea">{{ $form->description ?? '' }}</textarea>
            </div>

            <div class="grid grid-cols-4 gap-4 mb-6">
                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">経理課</label>
                    <input type="text" value="{{ $form->accounting_department ?? '' }}" readonly class="w-full border-gray-300 rounded-md shadow-sm">
                    <div class="border border-gray-300 h-10"></div>
                </div>
                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">承認印</label>
                    <input type="text" value="{{ $form->approval_stamp ?? '' }}" readonly class="w-full border-gray-300 rounded-md shadow-sm">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="border border-gray-300 h-10"></div>
                        <div class="border border-gray-300 h-10"></div>
                    </div>
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">申請印</label>
                    <input type="text" value="{{ $form->application_stamp ?? '' }}" readonly class="w-full border-gray-300 rounded-md shadow-sm">
                    <div class="border border-gray-300 h-10"></div>
                </div>
            </div>
        </div>
    </form>
</div>
</x-app-layout>
