<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PejabatRequest;
use App\Models\Jabatan;
use App\Models\PejabatStructural;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PejabatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pejabat = PejabatStructural::all();

        return view('pages.admin.pejabat.index', [
            'pejabat' => $pejabat,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.pejabat.create', [
            'jabatan' => Jabatan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PejabatRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo_pejabat')) {
            $images = $request->file('photo_pejabat');

            $extension = $images->getClientOriginalExtension();

            $random = \Str::random(10);
            $file_name = "pejabat" . $random . "." . $extension;

            $data['photo_pejabat'] = $images->storeAs('pejabat', $file_name, 'public');
        }


        PejabatStructural::create($data);

        return redirect()->route('pejabat.index');
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
        $pejabat = PejabatStructural::findOrFail($id);
        return view('pages.admin.pejabat.edit', [
            'pejabat' => $pejabat,
            'jabatan' => Jabatan::all()->except($pejabat->jabatan_id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PejabatRequest $request, $id)
    {
        $data = $request->all();
        $pejabat = PejabatStructural::findOrFail($id);

        if ($request->hasFile('photo_pejabat')) {
            Storage::disk('public')->delete($pejabat->photo_pejabat);

            $images = $request->file('photo_pejabat');

            $extension = $images->getClientOriginalExtension();

            $random = \Str::random(10);
            $file_name = "pejabat" . $random . "." . $extension;

            $data['photo_pejabat'] = $images->storeAs('pejabat', $file_name, 'public');
        } else {
            $data['photo_pejabat'] = $pejabat->photo_pejabat;
        }

        $pejabat->update($data);

        return redirect()->route('pejabat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PejabatStructural::findOrFail($id)->delete();

        return redirect()->route('pejabat.index');
    }
}
