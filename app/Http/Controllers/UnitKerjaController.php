<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    public function index()
    {
        $unitKerja = UnitKerja::all();

        return view('pages.user.unit-kerja.index', compact('unitKerja'));
    }

    public function detail($slug)
    {
        $unitKerja = UnitKerja::where('slug', $slug)->first();

        return view('pages.user.unit-kerja.detail', compact('unitKerja'));
    }
}
