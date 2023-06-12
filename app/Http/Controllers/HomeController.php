<?php

namespace App\Http\Controllers;

use App\Models\Admin\HomePhoto;
use App\Models\GalleryKegiatan;
use App\Models\Job;
use App\Models\News;
use App\Models\PejabatStructural;
use App\Models\RunningText;
use App\Models\Sakip;
use App\Models\StructureOrganisation;
use App\Models\ViewPage;
use App\Models\VisiMisi;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Membuat construct ketika halaman di click
        ViewPage::create([
            'view' => 1
        ]);

        $running = RunningText::all();

        $news = News::take(4)->get();

        $gallery = GalleryKegiatan::take(8)->get();

        $carousel = HomePhoto::all();

        return view('pages.home', [
            'news' => $news,
            'gallery' => $gallery,
            'carousel' => $carousel,
            'running' => $running
        ]);
    }

    public function visi()
    {
        $visi = VisiMisi::all();
        return view('pages.visi', [
            'visi' => $visi
        ]);
    }
    public function job()
    {
        $job = Job::all();
        return view('pages.job', [
            'job' => $job
        ]);
    }
    public function kedudukan()
    {
        return view('pages.kedudukan');
    }
    public function struktur()
    {
        $struktur = StructureOrganisation::all();
        return view('pages.struktur', [
            'struktur' => $struktur
        ]);
    }
    public function pejabat()
    {
        $pejabat = PejabatStructural::all();
        return view('pages.pejabat', [
            'pejabat' => $pejabat
        ]);
    }
    public function sakip()
    {
        $sakip = Sakip::all();

        return view('pages.sakip', [
            'sakip' => $sakip
        ]);
    }
    public function news()
    {
        $news = News::all();
        $tanggal = '';

        foreach ($news as $new) {
            $tanggal = date('d F Y', strtotime($new->created_at));
        }

        return view('pages.news', [
            'news' => $news,
            'tanggal' => $tanggal,
        ]);
    }
    public function news_detail($slug)
    {
        $news = News::where('slug_news', $slug)->firstOrFail();

        $tanggal = date('d F Y', strtotime($news->created_at));

        return view('pages.news_details', [
            'news' => $news,
            'tanggal' => $tanggal,
        ]);
    }
    public function gallery()
    {
        $gallery = GalleryKegiatan::all();

        return view('pages.gallery', [
            'gallery' => $gallery
        ]);
    }
}
