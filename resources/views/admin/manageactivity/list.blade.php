@extends('admin.main')
@section('content')

  <div class="main_content_middle_admin">
    <div class="tableoverflow">
      <table class="table_regular">
        <tr class="table_tr_label">
          <th >STT</th>
          <th >Tên hoạt động</th>
          <th >Địa điểm</th>
          <th >Thời gian</th>
          <th >Trang phục</th>
          <th >Số lượng</th>
          <th ></th>
        </tr>
        @foreach ($activities as $key => $activity)
        <tr>
          <td data-label="STT">{{$key+1}}</td>
          <td data-label="Tên hoạt động">{{$activity->nameactivity}}</td>
          <td data-label="Địa điểm">{{$activity->location}}</td>
          <td data-label="Thời gian">{{$activity->time}}</td>
          <td data-label="Trang phục">{{$activity->skin}}</td>
          <td data-label="Số lượng">{{$activity->limit}}</td>
          <td id="none_before">
            <a href="/admin/manageactivity/view/{{$activity->id}}">
              <i class="fa-solid fa-eye icon_action icon_action_view"></i>
            </a>
            <a href="/admin/manageactivity/edit/{{$activity->id}}">
              <i class="fa-solid fa-pen-to-square icon_action icon_action_edit"></i>
            </a>
            <a href="" onclick="removeRow('{{$activity->id}}', '/admin/manageactivity/destroy')">
              <i class="fa-solid fa-trash-can icon_action icon_action_delete"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </table>
      {{$activities -> links()}}
    </div>
  </div>
</div>
@endsection