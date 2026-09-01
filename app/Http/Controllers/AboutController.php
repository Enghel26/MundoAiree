<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CompanySetting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $brands = Brand::where('activo', true)->get();
        $values = json_decode(CompanySetting::get('values', '[]'), true) ?: [];

        return view('pages.about', compact('brands', 'values'));
    }
}
