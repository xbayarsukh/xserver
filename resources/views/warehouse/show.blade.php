<x-app-layout>
    <div class="container mx-auto py-8">
        <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="py-4 px-6">
                <h1 class="text-xl font-medium mb-6">商品詳細</h1>

                <div class="space-y-4">
                    <div class="flex">
                        <span class="w-1/3 font-medium">営業所:</span>
                        <span class="w-2/3">{{ $product->office->office_name }}</span>
                    </div>
                    <!-- Repeat for other fields -->

                    <div class="flex justify-between mt-3">
                        <x-button purpose="default" type="" href="{{ route('warehouse.index2', ['office_id' => $product->office_id]) }}">
                            戻る
                        </x-button>
                        <x-button purpose="search" type="" href="{{ route('warehouse.edit', $product->id) }}">
                            編集
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
