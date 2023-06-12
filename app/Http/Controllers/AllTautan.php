<?php

namespace App\Http\Controllers;

use App\Models\Admin\HomePhoto;
use App\Models\Sosmed;
use App\Models\Tautan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AllTautan extends Controller
{
    public function indexFoto()
    {
        $photo = HomePhoto::all();
        return view('pages.admin.home_photo.index', [
            'photo' => $photo
        ]);
    }

    public function createFoto()
    {
        return view('pages.admin.home_photo.create');
    }

    public function storeFoto(Request $request)
    {
        $data = $request->all();

        // Validasi foto yang diterima
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:5120'
        ]);

        if ($request->hasFile('photo')) {
            $images = $request->file('photo');

            $extension = $images->getClientOriginalExtension();

            $random = \Str::random(10);
            $file_name = "carousel" . $random . "." . $extension;

            $data['photo'] = $images->storeAs('carousel', $file_name, 'public');
        }

        HomePhoto::create($data);

        return redirect()->route('admin-foto-beranda');
    }

    public function deleteFoto($id)
    {
        $photo = HomePhoto::where('id', $id);

        $photo->delete();

        return redirect()->route('admin-foto-beranda');
    }

    public function indexTautan()
    {
        $tautan = Tautan::all();
        return view('pages.admin.tautan.index', [
            'tautan' => $tautan
        ]);
    }

    public function createTautan()
    {
        return view('pages.admin.tautan.create');
    }

    public function storeTautan(Request $request)
    {
        $data = $request->all();

        Tautan::create([
            'nama_tautan' => $data['nama_tautan'],
            'link_tautan' => $data['link_tautan'],
        ]);

        return redirect()->route('admin-tautan-menu');
    }

    public function editTautan($id)
    {
        $tautan = Tautan::findOrFail($id);

        return view('pages.admin.tautan.edit', [
            'tautan' => $tautan
        ]);
    }

    public function updateTautan(Request $request)
    {
        $data = $request->all();

        $tautan = Tautan::findOrFail($request->id);

        $tautan->update([
            'nama_tautan' => $data['nama_tautan'],
            'link_tautan' => $data['link_tautan'],
        ]);

        return redirect()->route('admin-tautan-menu');
    }

    public function deleteTautan($id)
    {
        $tautan = Tautan::where('id', $id);

        $tautan->delete();

        return redirect()->route('admin-tautan-menu');
    }

    public function indexMedia()
    {
        $media = Sosmed::all();
        return view('pages.admin.media.index', [
            'media' => $media
        ]);
    }

    public function createMedia()
    {
        return view('pages.admin.media.create');
    }

    public function storeMedia(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'nama_sosmed' => 'required',
            'link_sosmed' => 'required',
            'icon_sosmed' => 'required|mimes:png,jpg,jpeg|max:5120',
        ]);

        if ($request->hasFile('icon_sosmed')) {
            $images = $request->file('icon_sosmed');

            $extension = $images->getClientOriginalExtension();

            $random = \Str::random(10);
            $file_name = "icon" . $random . "." . $extension;

            $data['icon_sosmed'] = $images->storeAs('icon', $file_name, 'public');
        }

        Sosmed::create($data);

        return redirect()->route('admin-media-sosial');
    }

    public function editMedia($id)
    {
        $media = Sosmed::findOrFail($id);

        return view('pages.admin.media.edit', [
            'media' => $media
        ]);
    }

    public function updateMedia(Request $request, $id)
    {
        $data = $request->all();

        $request->validate([
            'nama_sosmed' => 'required',
            'link_sosmed' => 'required',
            'icon_sosmed' => 'mimes:png,jpg,jpeg|max:5120',
        ]);

        $media = Sosmed::findOrFail($id);

        $oldPhoto = $media->icon_sosmed;
        if ($request->hasFile('icon_sosmed')) {
            Storage::disk('public')->delete($oldPhoto);

            $images = $request->file('icon_sosmed');

            $extension = $images->getClientOriginalExtension();

            $random = \Str::random(10);
            $file_name = "icon" . $random . "." . $extension;

            $data['icon_sosmed'] = $images->storeAs('icon', $file_name, 'public');
        } else {
            $data['icon_sosmed'] = $oldPhoto;
        }

        $media->update($data);

        return redirect()->route('admin-media-sosial');
    }

    public function deleteMedia($id)
    {
        $media = Sosmed::where('id', $id);

        $media->delete();

        return redirect()->route('admin-media-sosial');
    }
}
