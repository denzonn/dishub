<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('roles', 'ADMIN')->get();
        return view('pages.admin.users.index', [
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'status' => !$user->status
        ]);

        return redirect()->route('admin-users');
    }
}
