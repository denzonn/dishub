<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RunningText;
use Illuminate\Http\Request;

class RunningTextController extends Controller
{
    public function index()
    {
        $running = RunningText::all();

        return view('pages.admin.runningText.index', [
            'running' => $running
        ]);
    }

    public function edit($id)
    {
        $running = RunningText::findOrFail($id);

        return view('pages.admin.runningText.edit', [
            'running' => $running
        ]);
    }

    public function update(Request $request, $id)
    {
        $running = RunningText::findOrFail($id);

        $running->update([
            'text' => $request->text
        ]);

        return redirect()->route('admin-running-text');
    }
}
