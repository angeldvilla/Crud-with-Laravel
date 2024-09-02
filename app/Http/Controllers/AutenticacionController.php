<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutenticacionController extends Controller
{
    public function index()
    {
       return view('auth.login');
    }

    public function registro()
    {
       return view('auth.registro');
    }

}