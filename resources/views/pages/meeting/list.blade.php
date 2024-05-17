@extends('main')
@section('content')
<div class="table_activities_user">
  <h1 class="table_activities_user_title">Danh sách các buổi họp Đội</h1>
  <div class="main_content_middle">

    <div class="tableoverflow">
      <table class="table_regular">
        <tr class="table_tr">
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
          <td>{{$key+1}}</td>
          <td>{{date("d/m/Y", strtotime($meeting->dateofmeeting))}}</td>
          <td>{{$meeting->location}}</td>
          <td>{{$meeting->time}}</td>
          <td>{{$meeting->quantity}}</td>
          <td>{{$meeting->fund}}</td>
          <td>
            <a href="/pages/meeting/view/{{$meeting->id}}">
              <i class="fa-solid fa-eye icon_action icon_action_view"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </table>
      {{$meetings -> links()}}
    </div>
  </div>
</div>
</div>
@endsection