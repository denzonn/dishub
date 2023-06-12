<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MitraKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MitraKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mitra = MitraKerja::all();

        return view('pages.admin.mitra.index', [
            'mitra' => $mitra,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.mitra.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $images = $request->file('photo');

            $extension = $images->getClientOriginalExtension();

            $random = \Str::random(10);
            $file_name = "mitra" . $random . "." . $extension;

            $data['photo'] = $images->storeAs('mitra', $file_name, 'public');
        }

        MitraKerja::create($data);

        return redirect()->route('mitra-kerja.index');
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
        $mitra = MitraKerja::findOrFail($id);

        return view('pages.admin.mitra.edit', [
            'mitra' => $mitra,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $mitra = MitraKerja::findOrFail($id);

        $oldPhoto = $mitra->photo;
        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($oldPhoto);

            $images = $request->file('photo');

            $extension = $images->getClientOriginalExtension();

            $random = \Str::random(10);
            $file_name = "mitra" . $random . "." . $extension;

            $data['photo'] = $images->storeAs('mitra', $file_name, 'public');
        } else {
            $data['photo'] = $oldPhoto;
        }

        $mitra->update($data);

        return redirect()->route('mitra-kerja.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mitra = MitraKerja::findOrFail($id);

        $mitra->delete();

        return redirect()->route('mitra-kerja.index');
    }
}
