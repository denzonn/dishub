<?php

namespace App\Http\Controllers;

use App\Models\DenahKantor;
use Illuminate\Http\Request;

class DenahController extends Controller
{
    public function index()
    {
        $denah = DenahKantor::all();
        return view('pages.denah', [
            'denah' => $denah
        ]);
    }
}
