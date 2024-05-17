<?php

namespace App\Http\Controllers\Admin\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login', [
            'title' => 'ĐĂNG NHẬP'
        ]);
    }

    public function store(Request $request){
        
        $this -> validate($request, [
            'username' => 'required|alpha_num:ascii',
            'password' => 'required'
        ]); 

        if(Auth::attempt([
            'username' =>$request->input('username'),
            'password' =>$request->input('password'),
            'role' => 0 && 1
        ])){
            return redirect()->route('admin');
        }
        if(Auth::attempt([
            'username' =>$request->input('username'),
            'password' =>$request->input('password'),
            'role' => 2
        ])){
            return redirect()->route('main');
        }
        return redirect()->back();
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
      }
}
