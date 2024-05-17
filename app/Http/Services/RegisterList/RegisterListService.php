<?php 

namespace App\Http\Services\RegisterList;

use App\Models\RegisterLists;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class RegisterListService {
    public function getAll(){
        return RegisterLists::orderby('id');
    }

    public function create($request){
        $getlist =  DB::table('register_lists')
        ->where('id_activity', $request->input('id_activity')) 
        ->select('*')
        ->get();
        if(count($getlist) < $request->limit){
            try {
                RegisterLists::create([
                    'id_user' => (int) $request->input('id_user'),
                    'id_activity' => (int) $request->input('id_activity'),
                    'note' => "",
                    'status_register' => 0,
                    'status_attendance' => 0,
                ]);
                return true;
                Session::flash('success', 'Thêm hoạt động thành công');

            } catch(\Exception $err) {
                Session::flash('error', $err->getMessage());

                return false;
            }

        } else {
            Session::flash('error', "Lỗi");

                return false;
        }
        }

    public function destroy($request){
        $id = (int) $request->input('id');
        $list = RegisterLists::where('id', $id)->first();
        if($list){
            return RegisterLists::where('id', $id)->delete();
        }
        return false;
    }
    
    public function attend($request) : bool {

            DB::table('register_lists')
            ->where('id_user', $request->input('id_user')) 
            ->where('id_activity', $request->input('id_activity')) 
            ->update([
                'status_attendance' => 1,
            ]);
            Session::flash('success', 'Gửi điểm danh thành công');
        return true;
        


    }

    public function addnote($request) : bool {
        DB::table('register_lists')
        ->where('id_user', $request->input('id_user')) 
        ->where('id_activity', $request->input('id_activity')) 
        ->update([
            'note' => $request->input('note'),
        ]);
        Session::flash('success', 'Thêm ghi chú thành công');
        return true;
    }

    public function confirm($request) : bool {
        DB::table('register_lists')
        ->where('id_user', $request->input('id_user')) 
        ->where('id_activity', $request->input('id_activity')) 
        ->update([
            'status_attendance' => 2,
        ]);
        Session::flash('success', 'xác nhận điểm danh thành công');
        return true;
    }
}