@extends('admin.main')
@section('content')
<div class="regular_form">
    <form action="" class="form_add_member" method="POST">
        <div class="form_add">
            <div class="form_add_left">
                <div class="regular_input">
                    <label>Tên đăng nhập</label>
                    <input type=text name="username" class="input_add_normal" autocomplete="off" required/>
                </div>
                <div class="regular_input">
                    <label>Mật khẩu</label>
                    <input type=text name="password" class="input_add_normal" autocomplete="off" required/>
                </div>
                <div class="regular_input">
                    <label>Mã số sinh viên</label>
                    <input type=text name="studentcode" class="input_add_normal" autocomplete="off" required/>
                </div>
                <div class="regular_input">
                    <label>Mã Đội viên</label>
                    <input type=text name="teammembercode" class="input_add_normal" autocomplete="off" required/>
                </div class="regular_input">
                
                <div class="regular_input">
                    <label>Ngày sinh</label>
                    <input type=date name="birthday" class="input_add_normal" autocomplete="off" required/>
                </div>
                <div class="regular_input">
                    <label>Ngày vào Đội</label>
                    <input type=date name="dateonteam" class="input_add_normal" autocomplete="off" required/>
                </div>
                <div class="regular_input">
                    <label>Giới tính</label>
                    <div>
                        <input id="male" type=radio name="sex" value="1" checked/>
                        <label for="male">Nam</label>
                        <input id="famale" type=radio name="sex" value="0"/>
                        <label for="famale">Nữ</label>
                    </div>
                </div>
               
            </div>
            <div class="form_add_right">
            <div class="regular_input">
                    <label>Họ và tên</label>
                    <input type=text name="fullname" class="input_add_normal" autocomplete="off" required/>
                </div>
            <div class="regular_input">
                    <label>Số điện thoại</label>
                    <input type=text name="numberphone" class="input_add_normal" autocomplete="off" required/>
                </div>
                <div class="regular_input">
                    <label>Email</label>
                    <input type=text name="email" class="input_add_normal" autocomplete="off" required/>
                </div>
                <div class="regular_input">
                    <label>Lớp</label>
                    <input type=text name="class" class="input_add_normal" autocomplete="off" required/>
                </div>
                <div class="regular_input">
                    <label>Khóa</label>
                    <input type=text name="course" class="input_add_normal" autocomplete="off" required/>
                </div>
                <div class="regular_input">
                    <label>Ngành</label>
                    <input type=text name="branch" class="input_add_normal" autocomplete="off" required/>
                </div>
                <div class="regular_input">
                    <label>Vai trò</label>
                    <div>
                        <input id="bdh" type=radio name="role" value="1"/>
                        <label for="bdh">Ban Điều Hành</label>
                        <input id="dv" type=radio name="role" value="2" checked/>
                        <label for="dv">Đội viên</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="div_button_confirm">
            <input type="submit" value="Xác nhận" name="confirm" class="button_confirm"/>
        </div>
        @csrf
    </form>
</div>
@endsection