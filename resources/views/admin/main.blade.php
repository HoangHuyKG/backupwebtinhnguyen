<!DOCTYPE html>
<html lang="en">

<head>

  @include('admin.head')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- /.navbar -->

    @include('admin.sidebar')
    <div class="main_content">
      <div class="main_content_admin">

        <div class="main_content_top">
          <div class="sidebarmenumobilediv">
            <i class="fa-solid fa-bars sidebarmenumobile" onclick="clicksidebarmenumobile()"></i>
          </div>
          <div class="dashboard_title_div">
            <h1 class="dashboard_title">{{ $title }}</h1>
          </div>
          <!-- <div class="dashboard_search">
            <input class="dashboard_search_input" placeholder="Search" />
            <i class="fa-solid fa-magnifying-glass dashboard_search_icon"></i>
          </div>
          <div class="displaynone">
            <i class="fa-solid fa-bell notify_icon"></i>
          </div> -->
          <div class="info_admin" onclick="clickinfoadmin()">
            @if(Auth::user()->image != "")
            <image class="header_navigation_login_image" src="/storage/images/{{Auth::user()->image}}" />
            @else 
            <image  class="header_navigation_login_image" src="/template/admin/dist/img/userdefault.png" />
            @endif
            <span class="info_admin_name">{{Auth::user()->fullname}}</span>
            <i class="fa-solid fa-chevron-down icon_down"></i>
            <div class="submenu_infoadmin">
              <ul class="submenu_infoadmin_list">
              <li class="submenu_infouser_item">
                <a href="/admin/infoadmin" class="submenu_infouser_link">
                <i class="fa-solid fa-user"></i> Thông tin cá nhân
                </a>
              </li>
                <li class="submenu_infoadmin_item" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                  <a class="submenu_infoadmin_link">
                  <i class="fa-solid fa-right-from-bracket"></i> Đăng xuất
                  </a>
                  <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
        @yield('content')
      </div>
      </div>

  </div>
  @include('admin.footer')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  <script src="/template/admin/dist/js/chart.js"></script>
</body>

</html>