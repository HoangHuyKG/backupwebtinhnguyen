@extends('admin.main')
@section('content')
<div class="regular_form">
    <form id="form_add_activity" action="" class="form_add_member" method="POST">
        <div class="form_add">
            <div class="form_add_left">
                <div class="regular_input">
                    <label>Tên hoạt động</label>
                    <input type=text name="nameactivity" class="input_add_normal" autocomplete="off" required />
                </div>

                <div class="regular_input">
                    <label>Số lượng</label>
                    <input type=text name="limit" class="input_add_normal" autocomplete="off" required />
                </div>
                <div class="regular_input">
                    <label>Cách thức</label>
                    <input type=text name="method" class="input_add_normal" autocomplete="off" required />
                </div class="regular_input">

            </div>
            <div class="form_add_right">
                <div class="regular_input">
                    <label>Địa điểm</label>
                    <input type=text name="location" class="input_add_normal" autocomplete="off" required />
                </div>
                <div class="regular_input">
                    <label>Thời gian</label>
                    <input type=text name="time" class="input_add_normal" autocomplete="off" required />
                </div>
                <div class="regular_input">
                    <label>Trang phục</label>
                    <input type=text name="skin" class="input_add_normal" autocomplete="off" required />
                </div>
            </div>

        </div>
        <div class="regular_input div_content_input">
            <label>Nội dung</label>
            <textarea class="input_content" name="content"></textarea>
        </div>
        <div class="div_button_confirm">
            <input  type="submit" value="Xác nhận" name="confirm" class="button_confirm" />
        </div>
        @csrf
    </form>
</div>

@endsection