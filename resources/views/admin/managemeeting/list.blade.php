@extends('admin.main')
@section('content')



<div class="main_content_middle_admin">

  <div class="tableoverflow">
    <table class="table_regular">
      <tr class="table_tr_label">
        <th>STT</th>
        <th>Ngày họp</th>
        <th>Địa điểm</th>
        <th>Thời gian</th>
        <th>Số lượng tham dự</th>
        <th>Số tiền đóng quỹ</th>
        <th></th>
      </tr>
      @foreach ($meetings as $key => $meeting)
      <tr>
        <td data-label="STT">{{$key+1}}</td>
        <td data-label="Ngày họp">{{date("d/m/Y", strtotime($meeting->dateofmeeting))}}</td>
        <td data-label="Địa điểm">{{$meeting->location}}</td>
        <td data-label="Thời gian">{{$meeting->time}}</td>
        <td data-label="Số lượng tham dự">{{$meeting->quantity}}</td>
        <td data-label="Số tiền đóng quỹ">{{$meeting->fund}}</td>
        <td id="none_before">
          <a href="/admin/managemeeting/view/{{$meeting->id}}">
            <i class="fa-solid fa-eye icon_action icon_action_view"></i>
          </a>
          <a href="/admin/managemeeting/edit/{{$meeting->id}}">
            <i class="fa-solid fa-pen-to-square icon_action icon_action_edit"></i>
          </a>
          <a href="" onclick="removeRow('{{$meeting->id}}', '/admin/managemeeting/destroy')">
            <i class="fa-solid fa-trash-can icon_action icon_action_delete"></i>
          </a>
        </td>
      </tr>
      @endforeach
    </table>
    {{$meetings -> links()}}
  </div>
</div>
</div>
@endsection