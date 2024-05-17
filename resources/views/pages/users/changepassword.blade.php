@extends('main')
@section('content')


<div class="div_changepassword">
    <div class="box_changepassword">
        <h1 class="changpassword_title">Đổi mật khẩu</h1>
        <div class="changpassword_box">
            <label>Email: </label>
            <input type="text" name="email" class="input_changepassword"/>
            <label>Mật khẩu cũ: </label>
            <input type="password" name="passwordold" class="input_changepassword"/>
            <label>Mật khẩu mới: </label>
            <input type="password" name="passwordnew" class="input_changepassword"/>
            <input type="button" name="submit" class="button_changepassword" value="Xác nhận"/>
        </div>
    </div>
</div>


@endsection
