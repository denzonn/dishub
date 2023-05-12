<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StructureOrganisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StruktureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $struktur = StructureOrganisation::all();
        return view('pages.admin.struktur.index', [
            'struktur' => $struktur
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $struktur = StructureOrganisation::findOrFail($id);

        return view('pages.admin.struktur.edit', [
            'struktur' => $struktur
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
        $photo = StructureOrganisation::findOrFail($id);

        $oldPhoto = $photo->photo_structure;
        if ($request->hasFile('photo_structure')) {
            Storage::disk('public')->delete($oldPhoto);

            $images = $request->file('photo_structure');

            $extension = $images->getClientOriginalExtension();

            $random = \Str::random(10);
            $file_name = "structure" . $random . "." . $extension;

            $data['photo_structure'] = $images->storeAs('structure', $file_name, 'public');
        } else {
            $data['photo_structure'] = $oldPhoto;
        }

        $photo->update($data);

        return redirect()->route('struktur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
