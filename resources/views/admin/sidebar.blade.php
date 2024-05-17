  <!-- Main Sidebar Container -->
  <div class="main-sidebar sidebar-dark-primary elevation-4 sidebarleft hideNav">
      <!-- Brand Logo -->
        <div class="mobilebackmenu">
            <i class="fa-solid fa-arrow-left mobilebackmenuicon" onclick="clicksidebarmenumobile()"></i>
        </div>
      <a href="/admin/dashboard/index" class="dashboard_logo">
          <img src="/template/admin/dist/img/logodoitinhnguyen.png" alt="doitinhnguyen Logo" class="dashboard_logo_image">
      </a>
      <!-- Sidebar -->
      <div class="">
          <!-- Sidebar Menu -->
          
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column list_nav" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item menu-open">
                      <a href="/admin/dashboard/index"  class="nav-link {{ request()->is('admin/dashboard/index') ? 'sidebaractive sidebarnormal' : 'sidebarnormal' }}">
                      <i class="fa-solid fa-table sidebaricon"></i>
                          <p>
                              Bảng điều khiển
                          </p>
                      </a>
                  </li>
                  <li class="nav-item menu-open">
                      <a  class="nav-link sidebarnormal" onclick="clicklistmember()">
                          <i class="fa-solid fa-users sidebaricon"></i>
                          <p>
                              Quản lý Đội viên
                          </p>
                          <i class="fa-solid fa-chevron-down sidebaricon "></i>
                      </a>
                      <ul class="nav nav-pills nav-sidebar flex-column list_nav sub_menu_listmember">
                      <li class="nav-item menu-open sub_menu_open">
                        <a href="/admin/managemember/list" class="nav-link  {{ request()->is('admin/managemember/list') ? 'sidebarnormal_submenuactive sidebarnormal_submenu' : 'sidebarnormal_submenu' }}">
                            <i class="fa-solid fa-clipboard-list sidebaricon sidebaricon_submenu"></i>
                            <p>
                                Danh sách Đội viên
                            </p>
                        </a>
                        </li>
                        <li class="nav-item menu-open sub_menu_open">
                        <a href="/admin/managemember/add" class="nav-link {{ request()->is('admin/managemember/add') ? 'sidebarnormal_submenuactive sidebarnormal_submenu ' : 'sidebarnormal_submenu' }}">
                            <i class="fa-solid fa-circle-plus sidebaricon sidebaricon_submenu"></i>
                            <p>
                                Thêm Đội viên
                            </p>
                        </a>
                        </li>
                    
                      </ul>
                  </li>
                  <li class="nav-item menu-open">
                      <a  class="nav-link sidebarnormal" onclick="clicklistactivity()">
                          <i class="fa-regular fa-rectangle-list sidebaricon"></i>
                          <p>
                              Quản lý hoạt động
                          </p>
                          <i class="fa-solid fa-chevron-down sidebaricon "></i>
                      </a>
                      <ul class="nav nav-pills nav-sidebar flex-column list_nav sub_menu_listactivity">
                      <li class="nav-item menu-open sub_menu_open">
                        <a href="/admin/manageactivity/list" class="nav-link {{ request()->is('admin/manageactivity/list') ? 'sidebarnormal_submenuactive sidebarnormal_submenu ' : 'sidebarnormal_submenu' }}">
                            <i class="fa-solid fa-clipboard-list sidebaricon sidebaricon_submenu"></i>
                            <p>
                                Danh sách hoạt động
                            </p>
                        </a>
                        </li>
                        <li class="nav-item menu-open sub_menu_open">
                        <a href="/admin/manageactivity/add" class="nav-link {{ request()->is('admin/manageactivity/add') ? 'sidebarnormal_submenuactive sidebarnormal_submenu ' : 'sidebarnormal_submenu' }}">
                            <i class="fa-solid fa-circle-plus sidebaricon sidebaricon_submenu"></i>
                            <p>
                                Thêm hoạt động
                            </p>
                        </a>
                        </li>
                      </ul>
                  </li>
                  <li class="nav-item menu-open">
                      <a  class="nav-link sidebarnormal" onclick="clicklistmeeting()">
                          <i class="fa-solid fa-handshake sidebaricon"></i>
                          <p>
                              Quản lý họp Đội
                          </p>
                          <i class="fa-solid fa-chevron-down sidebaricon "></i>
                      </a>
                      <ul class="nav nav-pills nav-sidebar flex-column list_nav sub_menu_listmeeting">
                      <li class="nav-item menu-open sub_menu_open">
                        <a href="/admin/managemeeting/list" class="nav-link {{ request()->is('admin/managemeeting/list') ? 'sidebarnormal_submenuactive sidebarnormal_submenu ' : 'sidebarnormal_submenu' }}">
                            <i class="fa-solid fa-clipboard-list sidebaricon sidebaricon_submenu"></i>
                            <p>
                                Danh sách họp Đội
                            </p>
                        </a>
                        </li>
                        <li class="nav-item menu-open sub_menu_open">
                        <a href="/admin/managemeeting/add" class="nav-link {{ request()->is('admin/managemeeting/add') ? 'sidebarnormal_submenuactive sidebarnormal_submenu ' : 'sidebarnormal_submenu' }}">
                            <i class="fa-solid fa-circle-plus sidebaricon sidebaricon_submenu"></i>
                            <p>
                                Thêm họp Đội
                            </p>
                        </a>
                        </li>
                      </ul>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </div>