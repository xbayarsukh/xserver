<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuggestionBoxController extends Controller
{
    public function index()
    {
        return view('suggestion.index');
    }
}
