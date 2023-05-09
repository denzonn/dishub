<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function visi()
    {
        return view('pages.visi');
    }
    public function job()
    {
        return view('pages.job');
    }
    public function kedudukan()
    {
        return view('pages.kedudukan');
    }
    public function struktur()
    {
        return view('pages.struktur');
    }
    public function pejabat()
    {
        return view('pages.pejabat');
    }
    public function sakip()
    {
        return view('pages.sakip');
    }
    public function news()
    {
        return view('pages.news');
    }
}
