<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LinkTerkait;
use Illuminate\Http\Request;

class LinkTerkaitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $link = LinkTerkait::all();

        return view('pages.admin.link-terkait.index', [
            'link' => $link
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.link-terkait.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $link = LinkTerkait::create([
            'nama' => $request->nama,
            'link' => $request->link,
        ]);

        return redirect()->route('link-terkait.index');
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
        $link = LinkTerkait::findOrFail($id);

        return view('pages.admin.link-terkait.edit', [
            'link' => $link
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
        $link = LinkTerkait::findOrFail($id);
        $link->update([
            'nama' => $request->nama,
            'link' => $request->link,
        ]);

        return redirect()->route('link-terkait.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = LinkTerkait::findOrFail($id);
        $link->delete();

        return redirect()->route('link-terkait.index');
    }
}
