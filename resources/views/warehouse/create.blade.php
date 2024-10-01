<x-app-layout>

    <div class="container mx-auto py-8">
        <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg overflow-hidden"> <!-- Modified this line -->
            <div class="py-4 px-6">
            <h1 class="text-xl font-medium mb-6">
                倉庫管理

              </h1>


             <h2 class="text-lg font-semibold mb-4 pb-2 border-b">新規倉庫品</h2>


             <form action="{{ route('warehouse.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                 @csrf


                 <div class="flex items-center hidden">
                     <label for="office_id" class="w-1/3 text-right pr-4 font-medium">営業所</label>
                     <div class="w-2/3">
                         <select name="office_id" id="office_id" required onchange="updateDivisions()" class="w-full px-3 py-2 border rounded-md">

                             <option value="">営業所選択</option>
                             @foreach ($offices as $office)
                             <option value="{{ $office->id }}"
                                {{ old('office_id') == $office->id || $selectedOfficeId == $office->id ? 'selected' : '' }}>
                                {{ $office->office_name }}
                            </option>
                             @endforeach

                         </select>
                     </div>
                 </div>




                   <div class="flex items-center">
                     <label for="employer_id" class="w-1/3 text-right pr-4 font-medium">商品番号</label>
                     <div class="w-2/3">
                         <input type="text" id="product_code" name="product_code" required value="" placeholder="100001" class="w-full px-3 py-2 border rounded-md">

                     </div>
                 </div>
                 <div class="flex items-center">
                     <label for="name"  class="w-1/3 text-right pr-4 font-medium">商品氏</label>
                     <div class="w-2/3">
                         <input type="text" id="product_name" name="product_name" placeholder="太成太郎" required class="w-full px-3 py-2 border rounded-md">
                     </div>
                 </div>

                 <div class="flex items-center">
                     <label for="email" class="w-1/3 text-right pr-4 font-medium">image</label>
                     <div class="w-2/3">
                         <input type="file" id="image_path" name="image_path"  placeholder="" class="w-full px-3 py-2 border rounded-md">
                     </div>
                 </div>

                 <div class="flex items-center">
                     <label for="name" class="w-1/3 text-right pr-4 font-medium">種類</label>
                     <div class="w-2/3">
                         <input type="text" id="product_type" name="product_type" placeholder="airCondition" required class="w-full px-3 py-2 border rounded-md">
                     </div>
                 </div>

                 <div class="flex items-center">
                     <label for="name" class="w-1/3 text-right pr-4 font-medium">メーカー</label>
                     <div class="w-2/3">
                         <input type="text" id="	product_maker" name="product_maker" placeholder="三菱電気" required class="w-full px-3 py-2 border rounded-md">
                     </div>
                 </div>

                 <div class="flex items-center">
                     <label for="name" class="w-1/3 text-right pr-4 font-medium">数量</label>
                     <div class="w-2/3">
                         <input type="number" id="quantity" name="quantity" placeholder="100" required class="w-full px-3 py-2 border rounded-md">
                     </div>
                 </div>

                 <div class="flex items-center">
                     <label for="name" class="w-1/3 text-right pr-4 font-medium">値段</label>
                     <div class="w-2/3">
                         <input type="number" id="price" name="price" placeholder="10000" class="w-full px-3 py-2 border rounded-md">
                     </div>
                 </div>

                 <div class="flex items-center">
                     <label for="name" class="w-1/3 text-right pr-4 font-medium">日時</label>
                     <div class="w-2/3">
                         <input type="date" id="date" name="date" class="w-full px-3 py-2 border rounded-md">
                     </div>
                 </div>

                 <div class="flex items-center">
                     <label for="name" class="w-1/3 text-right pr-4 font-medium">商品説明</label>
                     <div class="w-2/3">
                         <input type="text" id="product_detail" name="product_detail" class="w-full px-3 py-2 border rounded-md">
                     </div>
                 </div>






                 {{-- <button type="submit" class="submit-button">追加</button> --}}
                 <div class="flex justify-between mt-3">
                     <x-button purpose="default" type="" href="{{ url('/warehouse/index2') }}">
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





