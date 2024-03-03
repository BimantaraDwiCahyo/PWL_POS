<?php

namespace App\Http\Controllers;

use App\Models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        // tambah data user dengan Eloquent Model
        $data = [
            'nama' => 'pelanggan pertama',
        ];
        UserModel::where('username', 'customer-1')->update($data); //update data user

        // coba akses model UserModel
        $user = UserModel::all(); // ambil semua data dari tabel m_user
        return view('user', ['data' => $user]);
    }
}
