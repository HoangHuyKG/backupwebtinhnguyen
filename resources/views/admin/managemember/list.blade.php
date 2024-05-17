@extends('admin.main')
@section('content')

<div class="main_content_middle_admin">
  <div class="tableoverflow">
    <table class="table_regular">
      <tr class="table_tr_label">
        <th>STT</th>
        <th>MSSV</th>
        <th>Họ và tên</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>Lớp</th>
        <th>Khóa</th>
        <th>&nbsp;</th>
      </tr>
      {!! \App\Helpers\Helper::user($users) !!}
    </table>
    {{$users -> links()}}
  </div>
</div>
</div>
@endsection