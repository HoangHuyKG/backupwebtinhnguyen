<?php 

namespace App\Http\Services\MeetingList;

use App\Models\MeetingList;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class MeetingListService {
    public function getAll(){
        return MeetingList::orderby('id');
    }

    public function create($request){
            try {
                MeetingList::create([
                    'id_user' => (int) $request->input('id_user'),
                    'id_meeting' => (int) $request->input('id_meeting'),
                    'status_payment' => 0,
                    'status_attendance' => 0,
                ]);
                return true;
                Session::flash('success', 'Đăng ký họp Đội thành công');

            } catch(\Exception $err) {
                Session::flash('error', $err->getMessage());

                return false;
            }
        }

    public function destroy($request){
        $id = (int) $request->input('id');
        $list = MeetingList::where('id', $id)->first();
        if($list){
            return MeetingList::where('id', $id)->delete();
        }
        return false;
    }
    
    public function attend($request) : bool {
            DB::table('meeting_lists')
            ->where('id_user', $request->input('id_user')) 
            ->where('id_meeting', $request->input('id_meeting')) 
            ->update([
                'status_attendance' => 1,
            ]);
            Session::flash('success', 'Gửi điểm danh thành công');
        return true;
    }
        public function payment($request) : bool {
            DB::table('meeting_lists')
            ->where('id_user', $request->input('id_user')) 
            ->where('id_meeting', $request->input('id_meeting')) 
            ->update([
                'status_payment' => 1,
            ]);
            Session::flash('success', 'Gửi điểm danh thành công');
        return true;
    }
    

    public function confirm($request) : bool {
        DB::table('meeting_lists')
        ->where('id_user', $request->input('id_user')) 
        ->where('id_meeting', $request->input('id_meeting')) 
        ->update([
            'status_attendance' => 2,
        ]);
        Session::flash('success', 'xác nhận điểm danh thành công');
        return true;
    }

    public function confirmpayment($request) : bool {
        DB::table('meeting_lists')
        ->where('id_user', $request->input('id_user')) 
        ->where('id_meeting', $request->input('id_meeting')) 
        ->update([
            'status_payment' => 2,
        ]);
        Session::flash('success', 'xác nhận điểm danh thành công');
        return true;
    }
}