<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(){
        return view('admin.dashboard.index', [
            'title' => '',
            
        ]);
    }
    public function infoadmin(){
        return view('admin.infoadmin', [
            'title' => 'Thông tin cá nhân',
            
        ]);
    }
    public function upload_imgadmin(Request $request)
    {
        $path = 'images/';
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();

        $upload = $file->storeAs($path, $filename, 'public');
        $oldImage = Auth::user()->image;
        if ($upload) {
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update([
                    'image' => $filename,
                ]);
        }   
        if ($oldImage != "") {
            Storage::disk('public')->delete($path . $oldImage);      
        }
    }
}
