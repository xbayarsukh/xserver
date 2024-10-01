<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use App\Models\WareHouseProduct;

class WarehouseController extends Controller
{


    public function index()
    {

        $offices = Office::with('corp')->get();
        return view('warehouse.index', compact('offices'));
    }


    public function index2(Request $request)
    {
        $office_id = $request->input('office_id');

        if (!$office_id) {
            return redirect()->route('warehouse.index')->with('error', 'Please select an office.');
        }

        $office = Office::findOrFail($office_id);
        $search=$request->input('search');

        $products=WareHouseProduct::where('office_id', $office_id)
            ->when($search, function($query) use ($search)
            {
                $query->where(function($q) use($search){
                    $q->where('product_code', 'LIKE', "%{$search}%")
                    ->orWhere('product_name', 'LIKE', "%{$search}%")
                    ->orWhere('product_type','LIKE', "%{$search}%")
                    ->orWhere('product_maker','LIKE', "%{$search}%")
                    ->orWhere('quantity','LIKE', "%{$search}%")
                    ->orWhere('price','LIKE', "%{$search}%")
                    ->orWhere('date','LIKE', "%{$search}%")
                    ->orWhere('product_detail','LIKE', "%{$search}%");
                });
            })
            ->paginate(15);

        return view('warehouse.index2', compact('products','office','search'));






        // $products = WareHouseProduct::where('office_id', $office_id)
        //                 ->paginate(10);

        // return view('warehouse.index2', compact('products', 'office'));
    }
    public function create(Request $request)
    {

        $offices = Office::all();
        $selectedOfficeId=$request->input('office_id');

        return view('warehouse.create', compact('offices','selectedOfficeId'));

    }



    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'office_id'=>'required|exists:offices,id',
            'product_code'=>'required|unique:warehouse_products',
            'product_name'=>'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_type'=>'required',
            'quantity'=>'required|integer',
            'price'=>'nullable|numeric',
            'date'=>'nullable|date',
            'product_detail'=>'nullable',
            'product_maker'=>'nullable',
        ]);
        if ($request->hasFile('image_path')) {
            $imageName = time().'.'.$request->image_path->extension();
            $request->image_path->move(public_path('images'), $imageName);
            $validatedData['image_path'] = 'images/' . $imageName;
        }

        WareHouseProduct::create($validatedData);
           // Redirect back to the selected office's index
            return redirect()->route('warehouse.index2', ['office_id' => $validatedData['office_id']])
            ->with('success', '商品が追加されました.');

    }

    public function edit($id)
    {
        $offices = Office::all();
        $product = WareHouseProduct::findOrFail($id);
        return view('warehouse.edit', compact('product', 'offices'));
    }

    public function update(Request $request, $id)
    {
        $product = WareHouseProduct::findOrFail($id);

        $validatedData = $request->validate([
            'office_id' => 'required|exists:offices,id',
            'product_code' => 'required|unique:warehouse_products,product_code,' . $id,
            'product_name' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_type' => 'required',
            'quantity' => 'required|integer',
            'price' => 'nullable|numeric',
            'date' => 'nullable|date',
            'product_detail' => 'nullable',
            'product_maker' => 'nullable',
        ]);

        if ($request->hasFile('image_path')) {
            $imageName = time().'.'.$request->image_path->extension();
            $request->image_path->move(public_path('images'), $imageName);
            $validatedData['image_path'] = 'images/' . $imageName;
        }

        $product->update($validatedData);
        return redirect()->route('warehouse.index2', ['office_id' => $product->office_id])->with('success', '商品が更新されました。');
    }

    // public function show($id)
    // {
    //     $product = WareHouseProduct::findOrFail($id);
    //     return view('warehouse.show', compact('product'));
    // }

    public function destroy($id)
    {
        $product = WareHouseProduct::findOrFail($id);
        $office_id = $product->office_id;
        $product->delete();
        return redirect()->route('warehouse.index2', ['office_id' => $office_id])->with('success', '商品が削除されました。');
    }



}
