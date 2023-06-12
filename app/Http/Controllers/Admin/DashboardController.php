<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ViewPage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Count semua data yang ada di ViewPages di field view 
        $viewPages = ViewPage::count();

        // Cek datanya untuk hari ini
        $viewPagesToday = ViewPage::whereDate('created_at', now())->count();

        // Cek datanya dari tanggal sekarang sampai 1 minggu kedepan
        $viewPagesWeek = ViewPage::whereBetween('created_at', [
            now()->subWeek(1),
            now()
        ])->count();

        // Cek datanya dari tanggal sekarang sampai 1 bulan kedepan
        $viewPagesMonth = ViewPage::whereBetween('created_at', [
            now()->subMonth(1),
            now()
        ])->count();

        return view('pages.admin.dashboard', [
            'viewPages' => $viewPages,
            'viewPagesToday' => $viewPagesToday,
            'viewPagesWeek' => $viewPagesWeek,
            'viewPagesMonth' => $viewPagesMonth
        ]);
    }
}
