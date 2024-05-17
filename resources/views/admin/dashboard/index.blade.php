@extends('admin.main')
@section('content')
<div class="main_content_middle">
<div class="main_content_footer">
  <div class="main_content_footer_box">
    <div class="main_content_footer_box_top">
      <span class="footer_box_top_title">Số lượng thành viên</span>
      <i class="fa-solid fa-users-rectangle footer_box_top_icon"></i>
    </div>
    <span class="main_content_footer_box_middle">{{count($allUser)}}</span>
    <a class="main_content_footer_box_footer" href="/admin/managemember/list">Xem thêm</a>
  </div>
  <div class="main_content_footer_box">
    <div class="main_content_footer_box_top">
      <span class="footer_box_top_title">Tiền Quỹ</span>
      <i class="fa-solid fa-chart-line footer_box_top_icon"></i>
    </div>
    <span class="main_content_footer_box_middle">{{number_format($total, 0, ',', '.') . ' VNĐ'}}</span>
    <a class="main_content_footer_box_footer" href="/admin/managemeeting/list">Xem thêm</a>
  </div>
  <div class="main_content_footer_box">
    <div class="main_content_footer_box_top">
      <span class="footer_box_top_title">Tổng số hoạt động</span>
      <i class="fa-solid fa-clipboard-list footer_box_top_icon"></i>
    </div>
    <span class="main_content_footer_box_middle">{{count($allActivities)}}</span>
    <a class="main_content_footer_box_footer " href="/admin/manageactivity/list">Xem thêm</a>
  </div>
  <div class="main_content_footer_box">
    <div class="main_content_footer_box_top">
      <span class="footer_box_top_title">Tổng số cuộc họp</span>
      <i class="fa-solid fa-handshake footer_box_top_icon"></i>
    </div>
    <span class="main_content_footer_box_middle">{{count($allMeeting)}}</span>
    <a class="main_content_footer_box_footer" href="/admin/managemeeting/list">Xem thêm</a>
  </div>
</div>
  <h6 class="main_content_middle_title">Đội viên hoạt động tích cực:</h6>
  <div class="leaderboard_box">
    @foreach($getUserPositive as $key => $member)
    <div class="leaderboard_item">
    @if($member->image != "")
      <img class="leaderboard_item_image" src="/storage/images/{{$member->image}}" />
    @else 
      <img class="leaderboard_item_image" src="/template/admin/dist/img/userdefault.png" />
    @endif
      <span class="leaderboard_item_name">{{$member->fullname}}</span>
      <span class="leaderboard_item_top">Hạng {{$key+1}}</span>
      <span class="leaderboard_item_activity">{{$member->numberofactivity}} buổi hoạt động</span>
      <span class="leaderboard_item_position">Thành viên ưu tú</span>
      <span class="leaderboard_item_group">{{$member->class}}</span>
      <a href="/admin/managemember/view/{{$member->id}}">
              <i class="fa-solid fa-eye icon_action icon_action_view"></i>
            </a>
    </div>
    @endforeach
    

    
</div>

@endsection