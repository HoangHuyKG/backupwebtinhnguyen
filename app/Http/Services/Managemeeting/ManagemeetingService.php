<?php 

namespace App\Http\Services\ManageMeeting;

use App\Models\Meetings;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ManagemeetingService {
    public function getAll(){
        return Meetings::orderby('id')->paginate(10);
    }


    public function create($request){
        try {
            Meetings::create([
                'dateofmeeting' => (string) $request->input('dateofmeeting'),
                'location' => (string) $request->input('location'),
                'time' => (string) $request->input('time'),
                'fund' => (string) $request->input('fund'),
                'quantity' => (int) $request->input('quantity'),
                'attendance' => 0,
                'payment' => 0,
            ]);

            Session::flash('success', 'Thêm họp Đội thành công');
        } catch(\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request){
        $id = (int) $request->input('id');
        $meeting = Meetings::where('id', $id)->first();
        if($meeting){
            return Meetings::where('id', $id)->delete();
        }
        return false;
    }

    public function update($request, $meeting) : bool {
        $meeting->dateofmeeting =  (string) $request->input('dateofmeeting');
        $meeting->location =  (string) $request->input('location');
        $meeting->time =  (string) $request->input('time');
        $meeting->fund =  (string) $request->input('fund');
        $meeting->fund =  (int) $request->input('quantity');
        $meeting->attendance =  0;
        $meeting->payment =  0;
        $meeting->save();
        Session::flash('success', 'Sửa họp Đội thành công');
        return true;
    }

    public function getMember($id_user, $id_meeting){
        return DB::table('meeting_lists')
        ->join('users', 'users.id', '=', 'meeting_lists.id_user')
        ->join('meetings', 'meetings.id', '=', 'meeting_lists.id_meeting')
        ->where('users.id', '=', $id_user)
        ->where('meetings.id', '=',  $id_meeting)
        ->select('meeting_lists.*','meeting_lists.id as id_register', 'users.*', 'users.id as id_user', 'meetings.*')
        ->first();
         
     }

     public function getList($id_meeting){
        return DB::table('meeting_lists')
     ->join('users', 'users.id', '=', 'meeting_lists.id_user')
     ->join('meetings', 'meetings.id', '=', 'meeting_lists.id_meeting')
     ->where('meetings.id', '=',  $id_meeting)
     ->select('meeting_lists.*','meeting_lists.id as id_register', 'users.*', 'meetings.*')
     ->get();
         
     }
     public function activeattend($request) : bool {
        DB::table('meetings')
        ->where('id', $request->input('id_meeting')) 
        ->update([
            'attendance' => 1,
        ]);
        Session::flash('success', 'Mở điểm danh thành công');
        return true;
    }
    public function closeattend($request) : bool {
        DB::table('meetings')
        ->where('id', $request->input('id_meeting')) 
        ->update([
            'attendance' => 0,
        ]);
        Session::flash('success', 'Đóng điểm danh thành công');
        return true;
    }
    public function activepayment($request) : bool {
        DB::table('meetings')
        ->where('id', $request->input('id_meeting')) 
        ->update([
            'payment' => 1,
        ]);
        Session::flash('success', 'Mở đóng quỹ thành công');
        return true;
    }
    public function closepayment($request) : bool {
        DB::table('meetings')
        ->where('id', $request->input('id_meeting')) 
        ->update([
            'payment' => 0,
        ]);
        Session::flash('success', 'Đóng đóng quỹ thành công');
        return true;
    }
    public function registermeeting($request) : bool {
        DB::table('meetings')
        ->where('id', $request->input('id_meeting')) 
        ->update([
            'register' => 1,
        ]);
        Session::flash('success', 'Mở đăng ký thành công');
        return true;
    }
    public function closeregistermeeting($request) : bool {
        DB::table('meetings')
        ->where('id', $request->input('id_meeting')) 
        ->update([
            'register' => 0,
        ]);
        Session::flash('success', 'Đóng đăng ký thành công');
        return true;
    }
}