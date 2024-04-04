<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('user.index');
    }

    public function create()
    {
        $level = LevelModel::all();
        return view('user.create', compact('level'));
    }

    public function store(Request $request)
    {
        UserModel::create([
            'level_id' => $request->idlevel,
            'username' => $request->usernameuser,
            'nama' => $request->namauser,
            'password' => $request->passworduser,
        ]);

        return redirect('/level');
    }

    public function edit($id)
    {
        $level = UserModel::find($id);
        return view('user.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = UserModel::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        $user->level_id = $request->idlevel;
        $user->username = $request->usernameuser;
        $user->nama = $request->namauser;
        $user->password = $request->passworduser;
        $user->save();

        return redirect('/user')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        LevelModel::destroy($id);
        return redirect('/user');
    }
}
