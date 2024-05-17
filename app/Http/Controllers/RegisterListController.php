<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterList\CreateFormRequest;
use App\Http\Services\RegisterList\RegisterListService;
use App\Models\RegisterLists;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class RegisterListController extends Controller
{
    protected $registerListService;
    public function __construct(RegisterListService $registerListService)
    {
        $this->registerListService = $registerListService;
    }

    public function store(CreateFormRequest $request)
    {
        $this->registerListService->create($request);
        return redirect()->back();
        
    }
    public function destroy(Request $request): JsonResponse
    {
        $result = $this->registerListService->destroy($request);
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

    public function attend(CreateFormRequest $request, RegisterLists $registerList){
        $this->registerListService->attend($request, $registerList);
        
        return redirect('/pages/registeractivities/view/'. $request->input('id_activity'));
        
    }

    public function addnote(CreateFormRequest $request, RegisterLists $registerList){
        $this->registerListService->addnote($request, $registerList);
        
        return redirect('/pages/registeractivities/view/'. $request->input('id_activity'));
        
    }

    public function confirm(CreateFormRequest $request, RegisterLists $registerList){
        $this->registerListService->confirm($request, $registerList);
        
        return redirect('/admin/manageactivity/view/'. $request->input('id_activity'));
    }

    
}
