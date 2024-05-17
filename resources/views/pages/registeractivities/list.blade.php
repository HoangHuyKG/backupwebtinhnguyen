@extends('main')
@section('content')


<div class="table_activities_user">
  <h1 class="table_activities_user_title">Danh sách các hoạt động</h1>
  <div class="main_content_middle">
    <div class="tableoverflow">
        <table class="table_regular" id="activities-table">
          <tr class="table_tr">
            <th>STT</th>
            <th>Tên hoạt động</th>
            <th>Địa điểm</th>
            <th>Thời gian</th>
            <th>Trang phục</th>
            <th>Số lượng</th>
            <th></th>
          </tr>
          @foreach ($activities as $key => $activity)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$activity->nameactivity}}</td>
            <td>{{$activity->location}}</td>
            <td>{{$activity->time}}</td>
            <td>{{$activity->skin}}</td>
            <td>{{$activity->limit}}</td>
            <td>
              <a href="/pages/registeractivities/view/{{$activity->id}}">
                <i class="fa-solid fa-eye icon_action icon_action_view"></i>
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