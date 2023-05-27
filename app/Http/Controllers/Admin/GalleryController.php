<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryKegiatanRequest;
use App\Models\GalleryKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery  = GalleryKegiatan::all();
        return view('pages.admin.gallery.index', [
            'gallery' => $gallery
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryKegiatanRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo_kegiatan')) {
            $images = $request->file('photo_kegiatan');

            $extension = $images->getClientOriginalExtension();

            $random = \Str::random(10);
            $file_name = "gallery" . $random . "." . $extension;

            $data['photo_kegiatan'] = $images->storeAs('gallery', $file_name, 'public');
        }

        GalleryKegiatan::create($data);

        return redirect()->route('gallery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GalleryKegiatan  $galleryKegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(GalleryKegiatan $galleryKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GalleryKegiatan  $galleryKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = GalleryKegiatan::findOrFail($id);
        return view('pages.admin.gallery.edit', [
            'gallery' => $gallery
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GalleryKegiatan  $galleryKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryKegiatanRequest $request, $id)
    {
        $data = $request->all();
        $gallery = GalleryKegiatan::findOrFail($id);

        $oldPhoto = $gallery->photo_kegiatan;
        if ($request->hasFile('photo_kegiatan')) {
            Storage::disk('public')->delete($oldPhoto);

            $images = $request->file('photo_kegiatan');

            $extension = $images->getClientOriginalExtension();

            $random = \Str::random(10);
            $file_name = "gallery" . $random . "." . $extension;

            $data['photo_kegiatan'] = $images->storeAs('gallery', $file_name, 'public');
        } else {
            $data['photo_kegiatan'] = $oldPhoto;
        }

        $gallery->update($data);

        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GalleryKegiatan  $galleryKegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = GalleryKegiatan::findOrFail($id);
        $gallery->delete();

        return redirect()->route('gallery.index');
    }
}
