<?php

namespace App\Http\Controllers;

use App\Models\MitraKerja;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index()
    {
        $mitra = MitraKerja::all();

        return view('pages.mitra', [
            'mitra' => $mitra
        ]);
    }
}
