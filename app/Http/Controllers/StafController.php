<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StafController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'Staf',
        ];
        return view('/user/v_staf', $data);
    }
}
