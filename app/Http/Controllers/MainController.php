<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(){
        return view('home', [
            'title' => 'Đội tình nguyện CTUT',
        ]);
    }
}
