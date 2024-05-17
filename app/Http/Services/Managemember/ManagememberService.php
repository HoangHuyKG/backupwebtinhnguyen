<?php 

namespace App\Http\Services\Managemember;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ManagememberService {
    public function getAll(){
        return User::orderby('id')->paginate(10);
    }


    public function create($request){
        try {
            $password = $request->input('password');
            User::create([
                'username' => (string) $request->input('username'),
                'password' => Hash::make($password),
                'studentcode' => (string) $request->input('studentcode'),
                'teammembercode' => (string) $request->input('teammembercode'),
                'fullname' => (string) $request->input('fullname'),
                'sex' => (int) $request->input('sex'),
                'birthday' => (string) $request->input('birthday'),
                'dateonteam' => (string) $request->input('dateonteam'),    
                'class' => (string) $request->input('class'),
                'course' => (string) $request->input('course'),
                'branch' => (string) $request->input('branch'),
                'numberphone' => (string) $request->input('numberphone'),
                'email' => (string) $request->input('email'),
                'role' => (int) $request->input('role'),
                'numberofactivity' => 0,
                'image' => "",
            ]);

            Session::flash('success', 'Thêm Đội viên thành công');
        } catch(\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request){
        $id = (int) $request->input('id');
        $user = User::where('id', $id)->first();
        if($user){
            return User::where('id', $id)->delete();
        }
        return false;
    }

    public function update($request, $user) : bool {
        $user->username =  (string) $request->input('username');
        $user->password =  (string) $request->input('password');
        $user->studentcode  = (string) $request->input('studentcode');
        $user->teammembercode  = (string) $request->input('teammembercode');
        $user->fullname  = (string) $request->input('fullname');
        $user->sex  = (int) $request->input('sex');
        $user->birthday  = (string) $request->input('birthday');
        $user->dateonteam  = (string) $request->input('dateonteam');    
        $user->class  = (string) $request->input('class');
        $user->course  = (string) $request->input('course');
        $user->branch  = (string) $request->input('branch');
        $user->numberphone  = (string) $request->input('numberphone');
        $user->email  = (string) $request->input('email');
        $user->role  = (int) $request->input('role');
        $user->numberofactivity  = 0;
        $user->image  = "";
        $user->save();
        Session::flash('success', 'Sửa Đội viên thành công');
        return true;
    }
}