@extends('main')
@section('content')

<div class="infomation_member_fulldiv_user">
    <div class="infomation_member_fulldiv_user">
        <div class="button_back_div">
            <a href="/pages/meeting/list" class="button_back">Trở lại</a>
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
                @elseif($meeting->register == 1)
                @if($memberlogin == null)
                <a class="button_green" onclick="document.getElementById('frm-registermeeting').submit();">Đăng ký</a>
                @else
                <a class="button_red" onclick="cancelRegister('{{$memberlogin->id_register}}', '/pages/meeting/destroy')">Hủy đăng ký</a>
                @endif
                @endif
            </div>
            </div>
            </div>

            <div class="list_user_attend">
                <div class="main_content_middle">
                    <div class="tableoverflow tableflowx">
                        <div class="padding_table_user">
                    <h1 class="info_activity_title_list">Danh sách tham gia</h1>

                        <table class="table_regular">
                            <tr class="table_tr">
                                <th>STT</th>
                                <th>MSSV</th>
                                <th>Họ và tên</th>
                                <th>Giới tính</th>
                                <th>Lớp</th>
                                <th>Khóa</th>
                                @if($meeting->attendance == 0)
                                @elseif($meeting->attendance == 1)
                                <th>Điểm danh</th>
                                @endif
                                @if($meeting->payment == 0)
                                @elseif($meeting->payment == 1)
                                <th>Đóng Quỹ</th>
                                @endif
                            </tr>
                            @foreach ($listregister as $key => $member)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$member->studentcode}}</td>
                                <td>{{$member->fullname}}</td>
                                @if($member->sex == 1 )
                                <td>Nam</td>
                                @else
                                <td>Nữ</td>
                                @endif
                                <td>{{$member->class}}</td>
                                <td>{{$member->course}}</td>
                                @if(Auth::user()->id == $member->id_user)
                                @if($meeting->attendance == 0)
                                @elseif($meeting->attendance == 1)
                                @if($memberlogin->status_attendance == 0)
                                <td>
                                    <a class="button_attend" onclick="document.getElementById('frm-attendmeeting').submit();">Điểm danh</a>
                                </td>
                                @elseif($memberlogin->status_attendance == 1)
                                <td>
                                    <span class="status_waiting">Chờ xác nhận</span>
                                </td>
                                @elseif($memberlogin->status_attendance == 2)
                                <td>
                                    <i class="fa-solid fa-check icon_checkdone"></i>
                                </td>
                                @else
                                <td>Không xác định</td>
                                @endif
                                @endif
                                @if($meeting->payment == 0)
                                @elseif($meeting->payment == 1)
                                @if($memberlogin->status_payment == 0)
                                <td>
                                    <a class="button_attend" onclick="document.getElementById('frm-paymentmeeting').submit();">Đóng quỹ</a>
                                </td>
                                @elseif($memberlogin->status_payment == 1)
                                <td>
                                    <span class="status_waiting">Chờ xác nhận</span>
                                </td>
                                @elseif($memberlogin->status_attendance == 2)
                                <td>
                                    <i class="fa-solid fa-check icon_checkdone"></i>
                                </td>
                                @else
                                <td>Không xác định</td>
                                @endif
                                @endif
                                @else
                                @if($meeting->payment == 0)
                                @elseif($meeting->payment == 1)
                                <td></td>
                                <td></td>
                                @endif

                                @endif
                            </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>



<form id="frm-registermeeting" action="" class="" method="POST" style="display: none;">
    <input type=text name="id_user" class="input_add_normal" value="{{Auth::user()->id}}" />
    <input type=text name="id_meeting" class="input_add_normal" value="{{$meeting->id}}" />
    @csrf
</form>
<form id="frm-attendmeeting" action="/pages/meeting/attend" method="POST" style="display: none;">
    <input type=text name="id_user" class="input_add_normal" value="{{Auth::user()->id}}" />
    <input type=text name="id_meeting" class="input_add_normal" value="{{$meeting->id}}" />
    @csrf
</form>
<form id="frm-paymentmeeting" action="/pages/meeting/payment" method="POST" style="display: none;">
    <input type=text name="id_user" class="input_add_normal" value="{{Auth::user()->id}}" />
    <input type=text name="id_meeting" class="input_add_normal" value="{{$meeting->id}}" />
    @csrf
</form>
@endsection