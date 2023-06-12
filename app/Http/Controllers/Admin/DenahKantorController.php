<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DenahKantor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DenahKantorController extends Controller
{
    public function index()
    {
        $denah = DenahKantor::all();

        return view('pages.admin.denah.index', [
            'denah' => $denah
        ]);
    }

    public function edit($id)
    {
        $denah = DenahKantor::findOrFail($id);

        return view('pages.admin.denah.edit', [
            'denah' => $denah
        ]);
    }

    public function update(Request $request, $id)
    {
        $denah = DenahKantor::findOrFail($id);

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:5120'
        ]);

        $oldPhoto = $denah->photo;
        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($oldPhoto);

            $images = $request->file('photo');

            $extension = $images->getClientOriginalExtension();

            $random = \Str::random(10);
            $file_name = "photo-denah" . $random . "." . $extension;

            $data['photo'] = $images->storeAs('photo-denah', $file_name, 'public');
        } else {
            $data['photo'] = $oldPhoto;
        }

        $denah->update($data);

        return redirect()->route('admin-denah-kantor');
    }
}
