@extends('admin.main')
@section('content')
<div class="regular_form">
    <form action="" class="form_add_member" method="POST">
        <div class="form_add">
            <div class="form_add_left">
                <div class="regular_input">
                    <label>Tên đăng nhập</label>
                    <input type=text name="username" value="{{$user->username}}" class="input_add_normal" autocomplete="off" />
                </div>
                <div class="regular_input">
                    <label>Mật khẩu</label>
                    <input type=text name="password" value="{{$user->password}}" class="input_add_normal" autocomplete="off" />
                </div>
                <div class="regular_input">
                    <label>Mã số sinh viên</label>
                    <input type=text name="studentcode" value="{{$user->studentcode}}" class="input_add_normal" autocomplete="off" />
                </div>
                <div class="regular_input">
                    <label>Mã Đội viên</label>
                    <input type=text name="teammembercode" value="{{$user->teammembercode}}" class="input_add_normal" autocomplete="off" />
                </div class="regular_input">
                
                <div class="regular_input">
                    <label>Ngày sinh</label>
                    <input type=date name="birthday" value="{{$user->birthday}}" class="input_add_normal" autocomplete="off" />
                </div>
                <div class="regular_input">
                    <label>Ngày vào Đội</label>
                    <input type=date name="dateonteam" value="{{$user->dateonteam}}" class="input_add_normal" autocomplete="off" />
                </div>
                <div class="regular_input">
                    <label>Giới tính</label>
                    <div>
                        <input id="male" type=radio name="sex" value="1" {{$user->sex == 1 ? 'checked=""': ''}}/>
                        <label for="male">Nam</label>
                        <input id="famale" type=radio name="sex" value="0" {{$user->sex == 0 ? 'checked=""': ''}}/>
                        <label for="famale">Nữ</label>
                    </div>
                </div>
               
            </div>
            <div class="form_add_right">
            <div class="regular_input">
                    <label>Họ và tên</label>
                    <input type=text name="fullname" value="{{$user->fullname}}" class="input_add_normal" autocomplete="off" />
                </div>
            <div class="regular_input">
                    <label>Số điện thoại</label>
                    <input type=text name="numberphone" value="{{$user->numberphone}}" class="input_add_normal" autocomplete="off" />
                </div>
                <div class="regular_input">
                    <label>Email</label>
                    <input type=text name="email" value="{{$user->email}}" class="input_add_normal" autocomplete="off" />
                </div>
                <div class="regular_input">
                    <label>Lớp</label>
                    <input type=text name="class" value="{{$user->class}}" class="input_add_normal" autocomplete="off" />
                </div>
                <div class="regular_input">
                    <label>Khóa</label>
                    <input type=text name="course" value="{{$user->course}}" class="input_add_normal" autocomplete="off" />
                </div>
                <div class="regular_input">
                    <label>Ngành</label>
                    <input type=text name="branch" value="{{$user->branch}}" class="input_add_normal" autocomplete="off" />
                </div>
                <div class="regular_input">
                    <label>Vai trò</label>
                    <div>
                        <input id="bdh" type=radio name="role" value="1" {{$user->role == 1 ? 'checked=""': ''}} />
                        <label for="bdh">Ban Điều Hành</label>
                        <input id="dv" type=radio name="role" value="2" {{$user->role == 2 ? 'checked=""': ''}} />
                        <label for="dv">Đội viên</label>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <input type="submit" value="Xác nhận" name="confirm" class="button_confirm"/>
        </div>
        @csrf
    </form>
</div>
@endsection