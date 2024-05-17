<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManageMember\CreateFormRequest;
use App\Http\Services\Managemember\ManagememberService;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageMemberController extends Controller
{

    protected $manageMemberService;
    public function __construct(ManagememberService $manageMemberService)
    {
        $this->manageMemberService = $manageMemberService;
    }
    public function index()
    {

        return view('admin.managemember.list', [
            'title' => 'Danh sách Đội viên',
            'users' => $this->manageMemberService->getAll(),

        ]);
    }
    public function create()
    {
        return view('admin.managemember.add', [
            'title' => 'Thêm Đội viên',

        ]);
    }
    public function store(CreateFormRequest $request)
    {
        $this->manageMemberService->create($request);
        return redirect()->back();
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->manageMemberService->destroy($request);
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

    public function edit(User $user)
    {
        return view('admin.managemember.edit', [
            'title' => 'Chỉnh sửa Đội viên ',
            'user' => $user
        ]);
    }

    public function update(User $user, CreateFormRequest $request)
    {
        $this->manageMemberService->update($request, $user);

        return redirect('/admin/managemember/list');
    }
    public function view(User $user)
    {
        return view('admin.managemember.view', [
            'title' => 'Thông tin Đội Viên',
            'user' => $user
        ]);
    }
    public function detailsinfo()
    {
        return view('pages.users.detailsinfo', [
            'title' => 'Thông tin cá nhân',
        ]);
    }
    
    public function changepassword()
    {
        return view('pages.users.changepassword', [
            'title' => 'Đổi mật khẩu',
        ]);
    }
    public function upload_image(Request $request)
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
