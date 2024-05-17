<div class="header">
    <a class="header_logo" href="/">
        <image class="header_logo_image" src="/template/admin/dist/img/logodoitinhnguyen.png" />
        <h1 class="header_logo_title">đội tình nguyện ctut</h1>
    </a>
    <div class="header_navigation">
      <div class="header_navigation_link">
        
        <a id="list_activities" class="header_navigation_item" href="/pages/registeractivities/list"> <i class="fa-solid fa-list-check header_navigation_icon"></i> Danh sách hoạt động</a>
      </div>
      <div class="header_navigation_link">
        
        <a class="header_navigation_item" href="/pages/activityhasgone/list">  <i class="fa-solid fa-clock-rotate-left header_navigation_icon"></i>Hoạt động đã đi</a>
      </div>
      <div class="header_navigation_link">
        
        <a class="header_navigation_item" href="/pages/meeting/list">  <i class="fa-solid fa-dollar-sign header_navigation_icon"></i>Họp đội và quỹ Đội</a>
      </div>
    </div>
    <div class="header_navigation_login">
        @if(Auth::user())
        <div class="header_navigation_login_div" onclick="clickinfouser()">
        @if(Auth::user()->image != "")
            <image class="header_navigation_login_image" src="/storage/images/{{Auth::user()->image}}" />
            @else 
            <image  class="header_navigation_login_image" src="/template/admin/dist/img/userdefault.png" />
            @endif
          <a class="header_navigation_login_button" >{{Auth::user()->fullname}} </a>         
        </div>
            <div class="submenu_infouser">
            <ul class="submenu_infouser_list">
            <li class="submenu_infouser_item">
                <a href="/pages/users/detailsinfo" class="submenu_infouser_link">
                <i class="fa-solid fa-user"></i> Thông tin cá nhân
                </a>
              </li>
            <li class="submenu_infouser_item">
                <a href="/pages/users/changepassword" class="submenu_infouser_link">
                <i class="fa-solid fa-key"></i> Đổi mật khẩu
                </a>
              </li>
              <li class="submenu_infouser_item" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                <a class="submenu_infouser_link">
                <i class="fa-solid fa-right-from-bracket"></i> Đăng xuất
                </a>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </div>
        @else 
            <a class="header_navigation_login_button" href="/admin/users/login">Đăng nhập</a>
        @endif
    </div>
    <div class="header_submenu">
        <svg class="header_submenu_vector" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
            <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
        </svg>
    </div>
</div>