@extends('admin.main')
@section('content')
<div class="infomation_member_fulldiv">
    <div class="button_back_div_admin">
        <a href="/admin/managemember/list" class="button_back">Trở lại</a>
    </div>
    <div class="infomation_member_admin">
        <div class="infomation_member_divimage">
        @if($user->image != "")
            <image class="infomation_member_imagea" src="/storage/images/{{$user->image}}" />
            @else 
            <image  class="infomation_member_imagea" src="/template/admin/dist/img/userdefault.png" />
            @endif
        </div>
        <div class="infomation_member_divdetails">
            <div class="infomation_member_divdetails_left">
                <div class="infomation_member_divdetails_box">
                    <label>Họ và tên: </label>
                    <span class="infomation_member_infouser">{{$user->fullname}}</span>
                </div>
                <div class="infomation_member_divdetails_box">
                    <label>MSSV: </label>
                    <span class="infomation_member_infouser">{{$user->studentcode}}</span>
                </div>
                <div class="infomation_member_divdetails_box">
                    <label>Lớp: </label>
                    <span class="infomation_member_infouser">{{$user->class}}</span>
                </div>
                <div class="infomation_member_divdetails_box">
                    <label>Khóa: </label>
                    <span class="infomation_member_infouser">{{$user->course}}</span>
                </div>
                <div class="infomation_member_divdetails_box">
                    <label>Ngành: </label>
                    <span class="infomation_member_infouser">{{$user->branch}}</span>
                </div>
            </div>
            <div class="infomation_member_divdetails_right">
                <div class="infomation_member_divdetails_box">
                    <label>Giới tính: </label>
                    @if($user->sex == 1 )
                    <span class="infomation_member_infouser">Nam</span>
                    @else
                    <span class="infomation_member_infouser">Nữ</span>
                    @endif
                </div>
                <div class="infomation_member_divdetails_box">
                    <label>Ngày sinh: </label>
                    <span class="infomation_member_infouser">{{date("d/m/Y", strtotime($user->birthday))}}</span>
                </div>
                <div class="infomation_member_divdetails_box">
                    <label>Ngày vào Đội: </label>
                    <span class="infomation_member_infouser">{{date("d/m/Y", strtotime($user->dateofteam))}}</span>
                </div>
                <div class="infomation_member_divdetails_box">
                    <label>Số điện thoại: </label>
                    <span class="infomation_member_infouser">{{$user->numberphone}}</span>
                </div>
                <div class="infomation_member_divdetails_box">
                    <label>Email: </label>
                    <span class="infomation_member_infouser">{{$user->email}}</span>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection