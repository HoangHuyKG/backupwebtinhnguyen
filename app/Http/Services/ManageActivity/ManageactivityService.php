<?php

namespace App\Http\Services\ManageActivity;

use App\Models\Activities;
use App\Models\RegisterLists;
use App\Models\Users;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ManageactivityService
{
    public function getAll()
    {
        return Activities::orderby('id')->paginate(10);
    }

    public function getList($id_activities)
    {
        return DB::table('register_lists')
            ->join('users', 'users.id', '=', 'register_lists.id_user')
            ->join('activities', 'activities.id', '=', 'register_lists.id_activity')
            ->where('activities.id', '=',  $id_activities)
            ->select('register_lists.*', 'register_lists.id as id_register', 'users.*', 'activities.*')
            ->get();
    }

    public function getActivitieshasgone($id_user)
    {
        return  DB::table('register_lists')
            ->join('activities', 'register_lists.id_activity', '=', 'activities.id')
            ->select('register_lists.*', 'activities.*')
            ->where('register_lists.id_user', $id_user)
            ->where('register_lists.status_attendance', 2)
            ->paginate(10);
    }
    public function getMember($id_user, $id_activities)
    {
        return DB::table('register_lists')
            ->join('users', 'users.id', '=', 'register_lists.id_user')
            ->join('activities', 'activities.id', '=', 'register_lists.id_activity')
            ->where('users.id', '=', $id_user)
            ->where('activities.id', '=',  $id_activities)
            ->select('register_lists.*', 'register_lists.id as id_register', 'users.*', 'users.id as id_user', 'activities.*')
            ->first();
    }
    public function create($request)
    {
        try {
            Activities::create([
                'nameactivity' => (string) $request->input('nameactivity'),
                'content' => (string) $request->input('content'),
                'limit' => (int) $request->input('limit'),
                'method' => (string) $request->input('method'),
                'location' => (string) $request->input('location'),
                'time' => (string) $request->input('time'),
                'skin' => (string) $request->input('skin'),
                'active_attend' => 0,
                'active_register' => 0,
            ]);
            
            Session::flash('success', 'Thêm họp hoạt động thành công');
        } catch(\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $activity = Activities::where('id', $id)->first();
        if ($activity) {
            return Activities::where('id', $id)->delete();
        }
        return false;
    }

    public function update($request, $activity): bool
    {
        $activity->nameactivity =  (string) $request->input('nameactivity');
        $activity->content =  (string) $request->input('content');
        $activity->limit =  (int) $request->input('limit');
        $activity->method =  (string) $request->input('method');
        $activity->location =  (string) $request->input('location');
        $activity->time =  (string) $request->input('time');
        $activity->skin =  (string) $request->input('skin');
        $activity->active_attend =  (int) $request->input('active_attend');
        $activity->save();
        Session::flash('success', 'Sửa hoạt động thành công');
        return true;
    }
    public function activeattend($request): bool
    {
        DB::table('activities')
            ->where('id', $request->input('id_activity'))
            ->update([
                'active_attend' => 1,
            ]);
        Session::flash('success', 'Mở điểm danh thành công');
        return true;
    }
    public function closeattend($request): bool
    {
        DB::table('activities')
            ->where('id', $request->input('id_activity'))
            ->update([
                'active_attend' => 0,
            ]);
        Session::flash('success', 'Đóng điểm danh thành công');
        return true;
    }
    public function activeregister($request): bool
    {
        DB::table('activities')
            ->where('id', $request->input('id_activity'))
            ->update([
                'active_register' => 1,
            ]);
        Session::flash('success', 'Mở đăng ký thành công');
        return true;
    }
    public function closeregister($request): bool
    {
        DB::table('activities')
            ->where('id', $request->input('id_activity'))
            ->update([
                'active_register' => 0,
            ]);
        Session::flash('success', 'Đóng đăng ký thành công');
        return true;
    }
}
