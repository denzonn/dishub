<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurveyRequest;
use App\Models\Jawaban;
use App\Models\Option;
use App\Models\Pertanyaan;
use App\Models\Survey;
use Illuminate\Http\Request;

class FormSurveyController extends Controller
{
    public function index()
    {
        return view('pages.user.survey.index');
    }

    public function laluLintas()
    {
        $pertanyaan = Pertanyaan::where('bidangs_id', 1)->get();
        $option = Option::all();
        return view('pages.user.survey.survey-lalulintas', [
            'option' => $option,
            'pertanyaan' => $pertanyaan
        ]);
    }

    public function pelayaran()
    {
        $pertanyaan = Pertanyaan::where('bidangs_id', 2)->get();
        $option = Option::all();
        return view('pages.user.survey.survey-pelayaran', [
            'option' => $option,
            'pertanyaan' => $pertanyaan
        ]);
    }

    public function kereta()
    {
        $pertanyaan = Pertanyaan::where('bidangs_id', 3)->get();
        $option = Option::all();
        return view('pages.user.survey.survey-kereta', [
            'option' => $option,
            'pertanyaan' => $pertanyaan
        ]);
    }

    public function penunjang()
    {
        $pertanyaan = Pertanyaan::where('bidangs_id', 4)->get();
        $option = Option::all();
        return view('pages.user.survey.survey-penunjang', [
            'option' => $option,
            'pertanyaan' => $pertanyaan
        ]);
    }

    public function storeLaluLintas(SurveyRequest $request)
    {
        $data = $request->all();
        $survey = Survey::create([
            'nama' => $data['nama'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'pekerjaan' => $data['pekerjaan'],
            'email' => $data['email'],
            'usulan' => $data['usulan'],
        ]);

        $pertanyaan = Pertanyaan::where('bidangs_id', 1)->get();

        $iteration = 1;

        foreach ($pertanyaan as $item) {
            Jawaban::create([
                'survey_id' => $survey->id,
                'pertanyaans_id' => $item->id,
                'options_id' => $data['answer-' . $iteration],
                'bidangs_id' => $item->bidangs_id,
            ]);

            $iteration++;
        }

        return redirect()->route('home');
    }

    public function storePelayaran(SurveyRequest $request)
    {
        $data = $request->all();
        $survey = Survey::create([
            'nama' => $data['nama'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'pekerjaan' => $data['pekerjaan'],
            'email' => $data['email'],
            'usulan' => $data['usulan'],
        ]);

        $pertanyaan = Pertanyaan::where('bidangs_id', 2)->get();

        $iteration = 1;

        foreach ($pertanyaan as $item) {
            Jawaban::create([
                'survey_id' => $survey->id,
                'pertanyaans_id' => $item->id,
                'options_id' => $data['answer-' . $iteration],
                'bidangs_id' => $item->bidangs_id,
            ]);

            $iteration++;
        }

        return redirect()->route('home');
    }

    public function storeKereta(SurveyRequest $request)
    {
        $data = $request->all();
        $survey = Survey::create([
            'nama' => $data['nama'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'pekerjaan' => $data['pekerjaan'],
            'email' => $data['email'],
            'usulan' => $data['usulan'],
        ]);

        $pertanyaan = Pertanyaan::where('bidangs_id', 3)->get();

        $iteration = 1;

        foreach ($pertanyaan as $item) {
            Jawaban::create([
                'survey_id' => $survey->id,
                'pertanyaans_id' => $item->id,
                'options_id' => $data['answer-' . $iteration],
                'bidangs_id' => $item->bidangs_id,
            ]);

            $iteration++;
        }

        return redirect()->route('home');
    }

    public function storePenunjang(SurveyRequest $request)
    {
        $data = $request->all();
        $survey = Survey::create([
            'nama' => $data['nama'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'pekerjaan' => $data['pekerjaan'],
            'email' => $data['email'],
            'usulan' => $data['usulan'],
        ]);

        $pertanyaan = Pertanyaan::where('bidangs_id', 4)->get();

        $iteration = 1;

        foreach ($pertanyaan as $item) {
            Jawaban::create([
                'survey_id' => $survey->id,
                'pertanyaans_id' => $item->id,
                'options_id' => $data['answer-' . $iteration],
                'bidangs_id' => $item->bidangs_id,
            ]);

            $iteration++;
        }

        return redirect()->route('home');
    }
}
