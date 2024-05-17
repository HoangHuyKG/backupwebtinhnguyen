<?php

namespace App\Http\Controllers;
use App\Http\Requests\MeetingList\CreateFormRequest;
use App\Http\Services\MeetingList\MeetingListService;
use App\Models\MeetingList;
use App\Models\RegisterLists;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MeetingListController extends Controller
{
    protected $meetingListService;
    public function __construct(MeetingListService $meetingListService)
    {
        $this->meetingListService = $meetingListService;
    }
    public function store(CreateFormRequest $request)
    {
        $this->meetingListService->create($request);
        return redirect()->back();
        
    }
    public function destroy(Request $request): JsonResponse
    {
        $result = $this->meetingListService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => "Hủy thành công"
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
    public function attend(CreateFormRequest $request, MeetingList $meetingList){
        $this->meetingListService->attend($request, $meetingList);
        return redirect('/pages/meeting/view/'. $request->input('id_meeting'));
    }
    public function payment(CreateFormRequest $request, MeetingList $meetingList){
        $this->meetingListService->payment($request, $meetingList);
        return redirect('/pages/meeting/view/'. $request->input('id_meeting'));
    }
    public function confirm(CreateFormRequest $request, MeetingList $meetingList){
        $this->meetingListService->confirm($request, $meetingList);
        
        return redirect('/admin/managemeeting/view/'. $request->input('id_meeting'));
    }
    public function confirmpayment(CreateFormRequest $request, MeetingList $meetingList){
        $this->meetingListService->confirmpayment($request, $meetingList);
        
        return redirect('/admin/managemeeting/view/'. $request->input('id_meeting'));
    }
}
