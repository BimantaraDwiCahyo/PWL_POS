<?php
namespace App\Http\Controllers;

use App\Models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        $userCount = UserModel::where('level_id', 2)->count();

        return view('user', ['userCount' => $userCount]);
    }
}
