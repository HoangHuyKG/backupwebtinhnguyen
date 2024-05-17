@extends('admin.main')
@section('content')
<div class="regular_form">
    <form action="" class="form_add_member" method="POST">
        <div class="form_add">
            <div class="form_add_left">
                <div class="regular_input">
                    <label>Ngày họp Đội</label>
                    <input type=date name="dateofmeeting" class="input_add_normal" autocomplete="off" required/>
                </div>

                <div class="regular_input">
                    <label>Địa điểm</label>
                    <input type=text name="location" class="input_add_normal" autocomplete="off" required/>
                </div>
                <div class="regular_input">
                    <label>Thời gian</label>
                    <input type=text name="time" class="input_add_normal" autocomplete="off" required/>
                </div class="regular_input">

            </div>
            <div class="form_add_right">
                <div class="regular_input">
                    <label>Số tiền đóng quỹ</label>
                    <input type=text name="fund" class="input_add_normal" autocomplete="off" required/>
                </div>
                <div class="regular_input">
                    <label>Số lượng</label>
                    <input type=text name="quantity" class="input_add_normal" autocomplete="off" required/>
                </div>
            </div>

        </div>
        
        <div class="div_button_confirm">
            <input type="submit" value="Xác nhận" name="confirm" class="button_confirm" />
        </div>
        @csrf
    </form>
</div>
@endsection