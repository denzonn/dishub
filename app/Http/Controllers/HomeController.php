<?php

namespace App\Http\Controllers;

use App\Models\GalleryKegiatan;
use App\Models\Job;
use App\Models\News;
use App\Models\Sakip;
use App\Models\StructureOrganisation;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::take(4)->get();

        $gallery = GalleryKegiatan::take(8)->get();
        return view('pages.home', [
            'news' => $news,
            'gallery' => $gallery
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
        return view('pages.pejabat');
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
