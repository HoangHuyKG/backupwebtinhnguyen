@extends('admin.main')
@section('content')
<div class="infomation_member_fulldiv">
    <div class="button_back_div_admin">
        <a href="/admin/managemeeting/list" class="button_back">Trở lại</a>
    </div>

    <div class="infomation_activity_divdetails">
        <div>
            <h1 class="info_activity_title">Chi tiết họp Đội</h1>
        </div>
        <div class="infomation_activity_div">
            <div class="infomation_activity_div_left">
                <div class="infomation_activity_box">
                    <label>Địa điểm: </label>
                    <span>{{$meeting->location}}</span>
                </div>
                <div class="infomation_activity_box">
                    <label>Ngày họp: </label>
                    <span>{{date("d/m/Y", strtotime($meeting->dateofmeeting))}}</span>
                </div>
                <div class="infomation_activity_box">
                    <label>Thời gian: </label>
                    <span>{{$meeting->time}}</span>
                </div>

            </div>
            <div class="infomation_activity_div_left">
                <div class="infomation_activity_box">
                    <label>Số tiền quỹ mỗi người: </label>
                    <span>{{$meeting->fund}}</span>
                </div>
                <div class="infomation_activity_box">
                    <label>Số lượng: </label>
                    <span>{{$meeting->quantity}}</span>
                </div>
            </div>



        </div>
        <div class="div_button">
        @if($meeting->register == 0)
            <a class="button_green" onclick="document.getElementById('frm-registermeeting').submit();">Mở Đăng Ký</a>
            <form id="frm-registermeeting" action="/admin/managemeeting/registermeeting" method="POST" style="display: none;">
                <input type=text name="id_meeting" class="input_add_normal" value="{{$meeting->id}}" />
                @csrf
            </form>
            @elseif($meeting->register == 1)
            <a class="button_red_admin" onclick="document.getElementById('frm-closeregistermeeting').submit();">Đóng Đăng ký</a>
            <form id="frm-closeregistermeeting" action="/admin/managemeeting/closeregistermeeting" method="POST" style="display: none;">
                <input type=text name="id_meeting" class="input_add_normal" value="{{$meeting->id}}" />
                @csrf
            </form>
            @endif
            @if($meeting->attendance == 0)
            <a class="button_green" onclick="document.getElementById('frm-activeattend').submit();">Mở Điểm Danh</a>
            <form id="frm-activeattend" action="/admin/managemeeting/activeattend" method="POST" style="display: none;">
                <input type=text name="id_meeting" class="input_add_normal" value="{{$meeting->id}}" />
                @csrf
            </form>
            @elseif($meeting->attendance == 1)
            <a class="button_red_admin" onclick="document.getElementById('frm-closeactiveattend').submit();">Đóng Điểm Danh</a>
            <form id="frm-closeactiveattend" action="/admin/managemeeting/closeactiveattend" method="POST" style="display: none;">
                <input type=text name="id_meeting" class="input_add_normal" value="{{$meeting->id}}" />
                @csrf
            </form>
            @endif
            @if($meeting->payment == 0)
            <a class="button_green" onclick="document.getElementById('frm-activepayment').submit();">Mở Đóng Quỹ</a>
            <form id="frm-activepayment" action="/admin/managemeeting/activepayment" method="POST" style="display: none;">
                <input type=text name="id_meeting" class="input_add_normal" value="{{$meeting->id}}" />
                @csrf
            </form>
            @elseif($meeting->payment == 1)
            <a class="button_red_admin" onclick="document.getElementById('frm-closeactivepayment').submit();">Tắt Đóng Quỹ</a>
            <form id="frm-closeactivepayment" action="/admin/managemeeting/closeactivepayment" method="POST" style="display: none;">
                <input type=text name="id_meeting" class="input_add_normal" value="{{$meeting->id}}" />
                @csrf
            </form>
            @endif
        </div>
        <div>
            <h1 class="info_activity_title">Danh sách tham gia</h1>
            <div class="main_content_middle">
                <div class="tableoverflow tableflowx">
                    <table class="table_regular">
                        <tr class="table_tr_label">
                            <th>STT</th>
                            <th>MSSV</th>
                            <th>Họ và tên</th>
                            <th>Giới tính</th>
                            <th>Lớp</th>
                            <th>Khóa</th>
                            <th>Điểm danh</th>
                            <th>Đóng Quỹ</th>
                        </tr>
                        @foreach ($listregister as $key => $member)

                        <tr>
                            <td data-label="STT">{{$key+1}}</td>
                            <td data-label="MSSV">{{$member->studentcode}}</td>
                            <td data-label="Họ và tên">{{$member->fullname}}</td>
                            @if($member->sex == 1 )
                            <td data-label="Giới tính">Nam</td>
                            @else
                            <td data-label="Giới tính">Nữ</td>
                            @endif
                            <td data-label="Lớp">{{$member->class}}</td>
                            <td data-label="Khóa">{{$member->course}}</td>
                            @if($member->status_attendance == 1)
                            <td data-label="Điểm danh">
                                <a class="button_attend" onclick="document.getElementById('frm-confirm').submit();">Xác nhận</a>
                                <form id="frm-confirm" action="/admin/managemeeting/confirm" method="POST" style="display: none;">
                                    <input type=text name="id_user" class="input_add_normal" value="{{$member->id_user}}" />
                                    <input type=text name="id_meeting" class="input_add_normal" value="{{$meeting->id}}" />
                                    @csrf
                                </form>
                            </td>
                            @elseif($member->status_attendance == 2)
                            <td data-label="Điểm danh">
                                <i class="fa-solid fa-check icon_checkdone"></i>
                            </td>
                            @elseif($member->status_attendance == 0)
                            <td data-label="Điểm danh">
                                <span class="status_waiting">Chờ điểm danh</span>
                            </td>
                            @else
                            <td data-label="Điểm danh">Không xác định</td>
                            @endif


                            @if($member->status_payment == 1)
                            <td data-label="Đóng quỹ">
                                <a class="button_attend" onclick="document.getElementById('frm-confirmpayment').submit();">Xác nhận</a>
                                <form id="frm-confirmpayment" action="/admin/managemeeting/confirmpayment" method="POST" style="display: none;">
                                    <input type=text name="id_user" class="input_add_normal" value="{{$member->id_user}}" />
                                    <input type=text name="id_meeting" class="input_add_normal" value="{{$meeting->id}}" />
                                    @csrf
                                </form>
                            </td>
                            @elseif($member->status_payment == 2)
                            <td data-label="Đóng quỹ">
                                <i class="fa-solid fa-check icon_checkdone"></i>
                            </td>
                            @elseif($member->status_payment == 0)
                            <td data-label="Đóng quỹ">
                                <span class="status_waiting">Chờ đóng quỹ</span>
                            </td>
                            @else
                            <td data-label="Đóng quỹ">Không xác định</td>
                            @endif
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


</div>

@endsection