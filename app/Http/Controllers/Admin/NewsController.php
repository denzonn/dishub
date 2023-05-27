<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('pages.admin.berita.index', [
            'news' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo_news')) {
            $images = $request->file('photo_news');

            $extension = $images->getClientOriginalExtension();

            $random = \Str::random(10);
            $file_name = "news" . $random . "." . $extension;

            $data['photo_news'] = $images->storeAs('news', $file_name, 'public');
        }

        $data['slug_news'] = \Str::slug($request->judul_news);

        News::create($data);

        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('pages.admin.berita.edit', [
            'news' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        $news = News::findOrFail($id);
        $data = $request->all();
        $data['slug_news'] = \Str::slug($request->judul_news);

        $oldPhoto = $news->photo_news;
        if ($request->hasFile('photo_news')) {
            Storage::disk('public')->delete($oldPhoto);

            $images = $request->file('photo_news');

            $extension = $images->getClientOriginalExtension();

            $random = \Str::random(10);
            $file_name = "news" . $random . "." . $extension;

            $data['photo_news'] = $images->storeAs('news', $file_name, 'public');
        } else {
            $data['photo_news'] = $oldPhoto;
        }

        $news->update($data);

        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('news.index');
    }
}
