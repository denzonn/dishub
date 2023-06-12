<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class SurveyPenunjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pertanyaan = Pertanyaan::where('bidangs_id', 2)->get();

        $option = Option::all();

        return view('pages.admin.survey.penunjang-pemerintah.detail', [
            'pertanyaan' => $pertanyaan,
            'option' => $option,
        ]);
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

        $pertanyaan = $data['pertanyaan'];

        // Hapus dlu semua pertanyaa dengan bidang_id 4
        Pertanyaan::where('bidangs_id', 4)->delete();

        foreach ($pertanyaan as $item) {
            $data = [
                'pertanyaan' => $item,
                'bidangs_id' => 4,
            ];

            Pertanyaan::create($data);
        }

        return redirect()->route('admin-survey.index');
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
        //
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
        //
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
