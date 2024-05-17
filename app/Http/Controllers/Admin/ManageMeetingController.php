<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\ManageMeeting\ManagemeetingService;
use App\Http\Requests\ManageMeeting\CreateFormRequest;
use App\Models\Activities;
use App\Models\Meetings;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ManageMeetingController extends Controller
{
    protected $manageMeetingService;
    public function __construct(ManagemeetingService $manageMeetingService)
    {
        $this->manageMeetingService = $manageMeetingService;
    }
    public function index(){
        return view('admin.managemeeting.list', [
            'title' => 'Danh sách họp Đội',
            'meetings' => $this->manageMeetingService->getAll(),
        ]);
    }
    public function indexuser(){
        return view('pages.meeting.list', [
            'title' => 'Danh sách các buổi họp Đội',
            'meetings' => $this->manageMeetingService->getAll(),
        ]);
    }
    public function create()
    {

        return view('admin.managemeeting.add', [
            'title' => 'Thêm họp Đội',

        ]);
    }
    public function store(CreateFormRequest $request)
    {
        $this->manageMeetingService->create($request);
        return redirect()->back();
    }
    public function destroy(Request $request): JsonResponse
    {
        $result = $this->manageMeetingService->destroy($request);
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
    public function edit(Meetings $meeting){
        return view('admin.managemeeting.edit', [
            'title' => 'Chỉnh sửa họp Đội',
            'meetings' => $meeting
        ]);
    }

    public function update(Meetings $meeting, CreateFormRequest $request){
        $this->manageMeetingService->update($request, $meeting);

        return redirect('/admin/managemeeting/list');
    }

    public function view(Meetings $meeting){
        return view('admin.managemeeting.view', [
            'title' => 'Chi tiết họp Đội',
            'meeting' => $meeting,
            'listregister' => $this->manageMeetingService->getList($meeting->id),

        ]);
    }
    public function viewuser(Meetings $meeting){
        return view('pages.meeting.view', [
            'title' => 'Chi tiết họp Đội',
            'meeting' => $meeting,
            'listregister' => $this->manageMeetingService->getList($meeting->id),
            'memberlogin' => $this->manageMeetingService->getMember(Auth::user()->id, $meeting->id ),
        ]);
    }
    public function activeattend(Meetings $meeting, CreateFormRequest $request){
        $this->manageMeetingService->activeattend($request, $meeting);
        return redirect('/admin/managemeeting/view/'. $request->input('id_meeting'));
    }
    public function closeactiveattend (Meetings $meeting, CreateFormRequest $request){
        $this->manageMeetingService->closeattend($request, $meeting);
        return redirect('/admin/managemeeting/view/'. $request->input('id_meeting'));
    }
    public function activepayment(Meetings $meeting, CreateFormRequest $request){
        $this->manageMeetingService->activepayment($request, $meeting);
        return redirect('/admin/managemeeting/view/'. $request->input('id_meeting'));
    }
    public function closeactivepayment (Meetings $meeting, CreateFormRequest $request){
        $this->manageMeetingService->closepayment($request, $meeting);
        return redirect('/admin/managemeeting/view/'. $request->input('id_meeting'));
    }
    public function registermeeting (Meetings $meeting, CreateFormRequest $request){
        $this->manageMeetingService->registermeeting($request, $meeting);
        return redirect('/admin/managemeeting/view/'. $request->input('id_meeting'));
    }
    public function closeregistermeeting (Meetings $meeting, CreateFormRequest $request){
        $this->manageMeetingService->closeregistermeeting($request, $meeting);
        return redirect('/admin/managemeeting/view/'. $request->input('id_meeting'));
    }
}
