<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function show($id, $name = 'Roudhotul Silvia') {
        return view('user.profile')
            ->with('id', $id)
            ->with('name', $name);
    }
}