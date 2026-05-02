<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function index()
{
    // Langkah 4: Mengambil data beserta relasi level dan menampilkannya ke view
    $user = UserModel::with('level')->get();
    return view('user', ['data' => $user]);
}
}