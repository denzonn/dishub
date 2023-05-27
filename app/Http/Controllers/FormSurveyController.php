<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormSurveyController extends Controller
{
    public function index()
    {
        return view('pages.user.survey');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        dd($data);
    }
}
