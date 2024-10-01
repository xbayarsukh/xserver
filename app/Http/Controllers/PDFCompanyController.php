<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PDFCompany;

class PDFCompanyController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $pdfcompany=PDFCompany::all();

        return view('pdfCompany.index', compact('pdfcompany'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pdfCompany.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:_p_d_f_companies',
        ]);

        PDFCompany::create($validatedData);

        return redirect()->route('pdfCompany.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PDFCompany $pdfCompany)
    {
        return view('pdfCompany.show', compact('pdfCompany'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PDFCompany $pdfCompany)
    {
        return view('pdfCompany.edit', compact('pdfCompany'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PDFCompany $pdfCompany)

    {
        $validatedData=$request->validate([
            'name'=>'required|unique:_p_d_f_companies,name,' . $pdfCompany->id,
        ]);
        $pdfCompany->update($validatedData);

        return redirect()->route('pdfCompany.index')->with('success' , '変更完成しました。');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PDFCompany $pdfCompany)
    {
        $pdfCompany->delete();
        return redirect()->route('pdfCompany.index')->with('success', '削除されました。');
    }
}


