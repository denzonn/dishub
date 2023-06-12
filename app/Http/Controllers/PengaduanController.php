<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengaduanRequest;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        return view('pages.user.pengaduan.index');
    }


    public function create()
    {
        return view('pages.user.pengaduan.create');
    }

    public function store(PengaduanRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo_pengaduan')) {
            $images = $request->file('photo_pengaduan');

            $extension = $images->getClientOriginalExtension();

            $random = \Str::random(10);
            $file_name = "pengaduan" . $random . "." . $extension;

            $data['photo_pengaduan'] = $images->storeAs('pengaduan', $file_name, 'public');
        }

        if ($request->hasFile('photo_ktp')) {
            $images = $request->file('photo_ktp');

            $extension = $images->getClientOriginalExtension();

            $random = \Str::random(10);
            $file_name = "ktp" . $random . "." . $extension;

            $data['photo_ktp'] = $images->storeAs('ktp', $file_name, 'public');
        }

        $data['status'] = 'belum diproses';

        Pengaduan::create($data);

        return redirect()->route('pengaduan.index');
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        return view('pages.user.pengaduan.show', [
            'pengaduan' => $pengaduan
        ]);
    }

    public function status()
    {
        $pengaduan = Pengaduan::all()->except('photo_ktp');

        return view('pages.user.pengaduan.status', [
            'pengaduan' => $pengaduan
        ]);
    }
}
