<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'User',
        ];
        return view('/user/v_user', $data);
    }
}
