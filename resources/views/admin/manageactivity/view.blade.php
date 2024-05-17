@extends('admin.main')
@section('content')
<div class="infomation_member_fulldiv">
    <div class="button_back_div_admin">
        <a href="/admin/manageactivity/list" class="button_back">Trở lại</a>
    </div>

    <div class="infomation_activity_divdetails">
        <div>
            <h1 class="info_activity_title">{{$activity->nameactivity}}</h1>
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
        <div class="div_button">
        @if($activity->active_register == 0)
            <a class="button_green" onclick="document.getElementById('frm-activeregister').submit();">Mở Đăng Ký</a>
            <form id="frm-activeregister" action="/admin/manageactivity/activeregister" method="POST" style="display: none;">
                <input type=text name="id_activity" class="input_add_normal" value="{{$activity->id}}" />
                @csrf
            </form>
            @elseif($activity->active_register == 1)
            <a class="button_red_admin" onclick="document.getElementById('frm-closeactiveregister').submit();">Đóng Đăng Ký</a>
            <form id="frm-closeactiveregister" action="/admin/manageactivity/closeactiveregister" method="POST" style="display: none;">
                <input type=text name="id_activity" class="input_add_normal" value="{{$activity->id}}" />
                @csrf
            </form>
            @endif
            @if($activity->active_attend == 0)
            <a class="button_green" onclick="document.getElementById('frm-activeattend').submit();">Mở Điểm Danh</a>
            <form id="frm-activeattend" action="/admin/manageactivity/activeattend" method="POST" style="display: none;">
                <input type=text name="id_activity" class="input_add_normal" value="{{$activity->id}}" />
                @csrf
            </form>
            @elseif($activity->active_attend == 1)
            <a class="button_red_admin" onclick="document.getElementById('frm-closeactiveattend').submit();">Đóng Điểm Danh</a>
            <form id="frm-closeactiveattend" action="/admin/manageactivity/closeactiveattend" method="POST" style="display: none;">
                <input type=text name="id_activity" class="input_add_normal" value="{{$activity->id}}" />
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
                            <th>Ghi chú</th>
                            <th>Trạng thái</th>
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
                            <td data-label="Ghi chú">{{$member->note}}</td>
                                @if($member->status_attendance == 1)
                                <td data-label="Điểm danh">
                                    <a class="button_attend" onclick="document.getElementById('frm-confirm').submit();">Xác nhận</a>
                                    <form id="frm-confirm" action="/admin/manageactivity/confirm" method="POST" style="display: none;">
                                        <input type=text name="id_user" class="input_add_normal" value="{{$member->id_user}}" />
                                        <input type=text name="id_activity" class="input_add_normal" value="{{$activity->id}}" />
                                        <input type=text name="status_attendance" class="input_add_normal" value="2" />
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