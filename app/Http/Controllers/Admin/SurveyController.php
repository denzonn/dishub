<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jawaban;
use App\Models\Option;
use App\Models\Pertanyaan;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $survey = Survey::all();
        $totals = [];

        foreach ($survey as $item) {
            $id = $item->id;
            $jawaban = Jawaban::where('survey_id', $id)->get();
            $bobot = [];

            foreach ($jawaban as $item) {
                $bobot[] = $item->options->bobot;
            }

            $totals[] = array_sum($bobot);
        }

        return view('pages.admin.survey.index', [
            'survey' => $survey,
            'totals' => $totals
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pertanyaan = Pertanyaan::all();
        $option = Option::all();
        return view('pages.admin.survey.detail', [
            'option' => $option,
            'pertanyaan' => $pertanyaan
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

        // Iterasi melalui array pertanyaan
        foreach ($pertanyaan as $pertanyaanItem) {
            // Update atau create data pertanyaan survey
            Pertanyaan::updateOrCreate(
                ['pertanyaan' => $pertanyaanItem],
                // Tambahkan kolom-kolom lain yang perlu diupdate atau dibuat
            );
        }

        return redirect()->route('admin-survey.index');
    }

    public function option()
    {
        $option = Option::all();
        return view('pages.admin.survey.option', [
            'option' => $option
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOption(Request $request)
    {
        $option = $request->option;
        $bobot = $request->bobot;

        for ($i = 0; $i < count($option); $i++) {
            Option::updateOrCreate(
                ['option' => $option[$i]],
                ['bobot' => $bobot[$i]]
            );
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
        $survey = Survey::findOrFail($id);

        $survey->delete();

        return redirect()->route('admin-survey.index');
    }

    public function deleteAns($id)
    {
        $data = Pertanyaan::findOrFail($id);

        $data->delete();

        return redirect()->route('admin-survey.index');
    }

    public function deleteOption($id)
    {
        $data = Option::findOrFail($id);

        $data->delete();

        return redirect()->route('admin-survey-option');
    }
}
