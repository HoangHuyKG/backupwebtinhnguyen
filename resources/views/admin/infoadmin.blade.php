@extends('admin.main')
@section('content')
<div class="infomation_member_fulldiv">
    <div class="button_back_div_admin">
        <a href="/admin/managemember/list" class="button_back">Trở lại</a>
    </div>
    <div class="infomation_member_admin">
        <div class="infomation_member_divimage" onclick="clickopenuploadimage()">
            @if(Auth::user()->image != "")
            <image class="infomation_member_image" src="/storage/images/{{Auth::user()->image}}" />
            @else 
            <image  class="infomation_member_image" src="/template/admin/dist/img/userdefault.png" />
            @endif
        </div>
        <div class="infomation_member_divdetails">
            <div class="infomation_member_divdetails_left">
                <div class="infomation_member_divdetails_box">
                    <label>Họ và tên: </label>
                    <span class="infomation_member_infouser">{{Auth::user()->fullname}}</span>
                </div>
                <div class="infomation_member_divdetails_box">
                    <label>MSSV: </label>
                    <span class="infomation_member_infouser">{{Auth::user()->studentcode}}</span>
                </div>
                <div class="infomation_member_divdetails_box">
                    <label>Lớp: </label>
                    <span class="infomation_member_infouser">{{Auth::user()->class}}</span>
                </div>
                <div class="infomation_member_divdetails_box">
                    <label>Khóa: </label>
                    <span class="infomation_member_infouser">{{Auth::user()->course}}</span>
                </div>
                <div class="infomation_member_divdetails_box">
                    <label>Ngành: </label>
                    <span class="infomation_member_infouser">{{Auth::user()->branch}}</span>
                </div>
            </div>
            <div class="infomation_member_divdetails_right">
                <div class="infomation_member_divdetails_box">
                    <label>Giới tính: </label>
                    @if(Auth::user()->sex == 1 )
                    <span class="infomation_member_infouser">Nam</span>
                    @else
                    <span class="infomation_member_infouser">Nữ</span>
                    @endif
                </div>
                <div class="infomation_member_divdetails_box">
                    <label>Ngày sinh: </label>
                    <span class="infomation_member_infouser">{{date("d/m/Y", strtotime(Auth::user()->birthday))}}</span>
                </div>
                <div class="infomation_member_divdetails_box">
                    <label>Ngày vào Đội: </label>
                    <span class="infomation_member_infouser">{{date("d/m/Y", strtotime(Auth::user()->dateofteam))}}</span>
                </div>
                <div class="infomation_member_divdetails_box">
                    <label>Số điện thoại: </label>
                    <span class="infomation_member_infouser">{{Auth::user()->numberphone}}</span>
                </div>
                <div class="infomation_member_divdetails_box">
                    <label>Email: </label>
                    <span class="infomation_member_infouser">{{Auth::user()->email}}</span>
                </div>
            </div>
        </div>
    </div>
    
</div>
<div class="change_image">
    <div class="change_image_div">
        <div class="close_form" onclick="clickopenuploadimage()">
            <i class="fa-solid fa-x close_icon"></i>
        </div>
        <label class="button_change" for="fileimage">Chọn hình ảnh</label>
        <form id="formuploadimage" action="/admin/upload_imgadmin" method="POST" enctype="multipart/form-data">
            <input type="file" name="image" id="fileimage" onchange="choosefile(this)"/>
            @csrf
        </form>
        <div class="box_userchangeimage">
            <img class="user_changeimage" id="user_image" src="">
        </div>

        <button id="button_upload" class="button_submit_upload">Xác nhận</button>
    </div>

</div>
<script>
    $(document).ready(function() {
        $('#button_upload').click(function() {
            var formData = new FormData($('#formuploadimage')[0]);

            $.ajax({
                url: '/admin/upload_imgadmin',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert("Đổi hình đại diện thành công")
                    location.reload();
                },
                error: function(xhr, textStatus, errorThrown) {
                    // Xử lý lỗi
                    console.log('Error:', errorThrown);
                    location.reload();
                }
            });
        });
    });
</script>
@endsection