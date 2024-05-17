<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManageActivity\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\RegisterList\RegisterListService;
use App\Http\Services\ManageActivity\ManageactivityService;
use App\Models\Activities;
use App\Models\RegisterLists;
use App\Models\Users;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ManageActivityController extends Controller
{
    protected $manageActivityService;
    public function __construct(ManageactivityService $manageActivityService)
    {
        $this->manageActivityService = $manageActivityService;
    }
    public function index(){
        return view('admin.manageactivity.list', [
            'title' => 'Danh sách hoạt động',
            'activities' => $this->manageActivityService->getAll(),
        ]);
    }
    public function indexuser(){
        return view('pages.registeractivities.list', [
            'title' => 'Danh sách các hoạt động',
            'activities' => $this->manageActivityService->getAll(),
        ]);
    }
    public function activitieshasgone(){
        return view('pages.activityhasgone.list', [
            'title' => 'Danh sách hoạt động đã đi',
            'activities' => $this->manageActivityService->getActivitieshasgone(Auth::user()->id),
        ]);
    }
    public function create()
    {

        return view('admin.manageactivity.add', [
            'title' => 'Thêm hoạt động',

        ]);
    }
    public function store(CreateFormRequest $request)
    {
        $this->manageActivityService->create($request);
        return redirect()->back();
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->manageActivityService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => "Xóa thành công"
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
    public function edit(Activities $activity){
        return view('admin.manageactivity.edit', [
            'title' => 'Chỉnh sửa hoạt động',
            'activities' => $activity
        ]);
    }

    public function update(Activities $activity, CreateFormRequest $request){
        $this->manageActivityService->update($request, $activity);

        return redirect('/admin/manageactivity/list');
    }
    public function activeattend(Activities $activity, CreateFormRequest $request){
        $this->manageActivityService->activeattend($request, $activity);
        return redirect('/admin/manageactivity/view/'. $request->input('id_activity'));
    }
    public function closeactiveattend (Activities $activity, CreateFormRequest $request){
        $this->manageActivityService->closeattend($request, $activity);
        return redirect('/admin/manageactivity/view/'. $request->input('id_activity'));
    }
    public function activeregister(Activities $activity, CreateFormRequest $request){
        $this->manageActivityService->activeregister($request, $activity);
        return redirect('/admin/manageactivity/view/'. $request->input('id_activity'));
    }
    public function closeactiveregister (Activities $activity, CreateFormRequest $request){
        $this->manageActivityService->closeregister($request, $activity);
        return redirect('/admin/manageactivity/view/'. $request->input('id_activity'));
    }
    
    public function view(Activities $activity){
        return view('admin.manageactivity.view', [
            'title' => 'Chi tiết hoạt động',
            'activity' => $activity,
            'listregister' => $this->manageActivityService->getList($activity->id),

        ]);
    }

    public function viewuser(Activities $activity){
        return view('pages.registeractivities.view', [
            'title' => 'Chi tiết hoạt động',
            'activity' => $activity,
            'listregister' => $this->manageActivityService->getList($activity->id),
            'memberlogin' => $this->manageActivityService->getMember(Auth::user()->id, $activity->id ),
        ]);
    }
    public function getActivities(Request $request)
    {
        $activities = $this->manageActivityService->getAll()->paginate(10);
        return response()->json($activities);
    }

}
