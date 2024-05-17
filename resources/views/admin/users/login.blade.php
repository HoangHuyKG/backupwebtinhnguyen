<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.head')

</head>

<body class="">
  <div class="container_login">
    <div class="col-30">
      <div class="container_login_left">
        <div class="container_login_top">
          <img class="login_logo" src="/template/admin/dist/img/logodoitinhnguyen.png">
        </div>
        <div class="container_login_bottom">
          <h2 class="login_title">Đăng nhập hệ thống</h2>
          <div class="login_form">
          <form action="/admin/users/login/store" method="post">
            <div class="login-input-box">
              <div class="login_box_input">
              <svg class="login_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                <input type="username" name="username" class="input_login" placeholder="Tên đăng nhập" required>
              </div>
              <div class="login_box_input">
                <svg class="login_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
                <input type="password" name="password" class="input_login" placeholder="Mật khẩu" required>
              </div>
            </div>
            <div class="box-bottom">
              <button type="submit" class="btnloginadmin">Đăng nhập</button>
            </div>
            
        </div>
        @csrf
        </form>

          </div>
      </div>
    </div>
  <div class="col-70">
    <div class="container_login_right">
      <img class="login_image" src="/template/admin/dist/img/login_image.jpg">
    </div>
  </div>
  </div>
  <div class="blurbackgound">

  </div>
</body>

</html>