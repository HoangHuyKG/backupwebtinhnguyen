@extends('main')
@section('content')
<div class="infomation_member_fulldiv_user">

    <div class="infomation_member_fulldiv_user">

        <div class="button_back_div">
            <a href="/pages/registeractivities/list" class="button_back">Trở lại</a>
        </div>

        <div class="infomation_activity_divdetails">
            <div>
                <h1 class="info_activity_title">Đăng ký hoạt động</h1>
            </div>
            <div class="infomation_activity_div">
                <div class="infomation_activity_div_left">
                    <div class="infomation_activity_box">
                        <label>Tên hoạt động: </label>
                        <span>{{$activity->nameactivity}}</span>
                    </div>
                    <div class="infomation_activity_box">
                        <label>Địa điểm: </label>
                        <span>{{$activity->location}}</span>
                    </div>
                    <div class="infomation_activity_box">
                        <label>Ngày họp: </label>
                        <span>{{$activity->time}}</span>

                    </div>


                </div>
                <div class="infomation_activity_div_left">
                    <div class="infomation_activity_box">
                        <label>Cách thức tham gia: </label>
                        <span>{{$activity->method}}</span>
                    </div>
                    <div class="infomation_activity_box">
                        <label>Trang phục: </label>
                        <span>{{$activity->skin}}</span>
                    </div>
                    <div class="infomation_activity_box">
                        <label>Số lượng: </label>
                        <span>{{$activity->limit}}</span>
                    </div>
                </div>



            </div>
            <div>
                <div class="infomation_activity_box">
                    <label>Nội dung: </label>
                    <span class="infomation_activity_content">{{$activity->content}}</span>
                </div>
            </div>
            @if(count($listregister) < $activity->limit)
                @if($activity->active_register == 1)
                @if($memberlogin == null)
                <div class="div_button">
                    <a class="button_green" onclick="document.getElementById('frm-register').submit();">Đăng Ký</a>
                </div>
                @else

                <div class="div_button">
                    <a class="button_red" onclick="cancelRegister('{{$memberlogin->id_register}}', '/pages/registeractivities/destroy')">Hủy Đăng Ký</a>
                    <a class="button_yellow" onclick="clickaddnote()">Thêm ghi chú</a>
                </div>

                @endif
                @elseif($activity->active_register == 0)
                @endif
                @else
                <div class="announce_full_div">
                    <span class="announce_full">Đã đủ số lượng đăng ký</span>
                </div>
                @if($memberlogin != null)
                <div class="div_button">
                    <a class="button_red" onclick="cancelRegister('{{$memberlogin->id_register}}', '/pages/registeractivities/destroy')">Hủy Đăng Ký</a>
                    <a class="button_yellow" onclick="clickaddnote()">Thêm Ghi Chú</a>
                </div>
                @endif
                @endif
        </div>
    </div>

    <div class="list_user_attend">
        <div class="main_content_middle">
            <div class="tableoverflow tableflowx">
                <div class="padding_table_user">
                    <h1 class="info_activity_title">Danh sách tham gia</h1>

                    <table class="table_regular">
                        <tr class="table_tr">
                            <th>STT</th>
                            <th>MSSV</th>
                            <th>Họ và tên</th>
                            <th>Giới tính</th>
                            <th>Lớp</th>
                            <th>Khóa</th>
                            <th>Ghi chú</th>
                            @if($activity->active_attend == 0)
                            @elseif($activity->active_attend == 1)
                            <th>Trạng thái</th>
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
                            <td>{{$member->note}}</td>
                            @if(Auth::user()->id == $member->id_user)
                            @if($activity->active_attend == 0)
    
                            @elseif($activity->active_attend == 1)
                            @if($memberlogin->status_attendance == 0)
                            <td>
                                <a class="button_attend" onclick="document.getElementById('frm-attend').submit();">Điểm danh</a>
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
                            @else
                            <td></td>
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
<div class="div_addnote">
    <div class="close_form">
        <i class="fa-solid fa-x close_icon" onclick="clickaddnote()"></i>
    </div>
    <h1 class="div_addnote_title">Thêm Ghi Chú</h1>
    <form id="frm-addnote" action="/pages/registeractivities/addnote" method="POST">
        <input type=text name="id_user" class="input_add_normal" value="{{Auth::user()->id}}" style="display: none;" />
        <input type=text name="id_activity" class="input_add_normal" value="{{$activity->id}}" style="display: none;" />
        <textarea class="note_area" type=text name="note"></textarea>
        <input type=submit name="submit" class="button_addnote" value="Xác nhận" />
        @csrf
    </form>
</div>
<form id="frm-attend" action="/pages/registeractivities/attend" method="POST" style="display: none;">
    <input type=text name="id_user" class="input_add_normal" value="{{Auth::user()->id}}" />
    <input type=text name="id_activity" class="input_add_normal" value="{{$activity->id}}" />
    @csrf
</form>
<form id="frm-register" action="" class="" method="POST" style="display: none;">
    <input type=text name="id_user" class="input_add_normal" value="{{Auth::user()->id}}" />
    <input type=text name="id_activity" class="input_add_normal" value="{{$activity->id}}" />
    <input type=text name="limit" class="input_add_normal" value="{{$activity->limit}}" />
    @csrf
</form>
@endsection