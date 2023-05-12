<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SakipRequest;
use App\Models\Sakip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SakipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sakip = Sakip::all();

        return view('pages.admin.sakip.index', [
            'sakip' => $sakip
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.sakip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SakipRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('file_sakip')) {
            $images = $request->file('file_sakip');

            $extension = $images->getClientOriginalExtension();

            $random = \Str::random(10);
            $file_name = "sakip" . $random . "." . $extension;

            $data['file_sakip'] = $images->storeAs('sakip', $file_name, 'public');
        }

        Sakip::create($data);

        return redirect()->route('sakip.index');
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
        $sakip = Sakip::findOrFail($id);

        return view('pages.admin.sakip.edit', [
            'sakip' => $sakip
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SakipRequest $request, $id)
    {
        $data = $request->all();
        $sakip = Sakip::findOrFail($id);

        $oldFile = $sakip->file_sakip;
        if ($request->hasFile('file_sakip')) {
            Storage::disk('public')->delete($oldFile);

            $images = $request->file('file_sakip');

            $extension = $images->getClientOriginalExtension();

            $random = \Str::random(10);
            $file_name = "sakip" . $random . "." . $extension;

            $data['file_sakip'] = $images->storeAs('sakip', $file_name, 'public');
        }

        $sakip->update($data);

        return redirect()->route('sakip.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sakip = Sakip::findOrFail($id);
        $sakip->delete();

        return redirect()->route('sakip.index');
    }
}
