@extends('main')
@section('content')
<div class="about">
    <div class="about_div">
        <div class="col-30pc about_detail_div">
            <div class="about_detail">
                <h1 class="about_detail_title">"Vượt qua biên giới thông tin và khám phá thêm về chúng tôi! Nhấn vào nút 'Tìm Hiểu Thêm' để bắt đầu hành trình khám phá đầy hứng thú."</h1>
                <a class="about_detail_button">tìm hiểu thêm</a>
            </div>
        </div>
        <div class="col-70pc">
            <div class="slideshow-containers">
    
                <div class="mySlidess fade">
                    <img class="mySlidess_image" src="/template/admin/dist/img/img1.jpg" style="width:100%">
                </div>
    
                <div class="mySlidess fade">
                    <img class="mySlidess_image" src="/template/admin/dist/img/img2.jpg" style="width:100%">
                </div>
    
                <div class="mySlidess fade">
                    <img class="mySlidess_image" src="/template/admin/dist/img/img3.jpg" style="width:100%">
                </div>
                <div class="mySlidess fade">
                    <img class="mySlidess_image" src="/template/admin/dist/img/img4.jpg" style="width:100%">
                </div>
                <div class="mySlidess fade">
                    <img class="mySlidess_image" src="/template/admin/dist/img/img5.jpg" style="width:100%">
                </div>
            </div>
            <br>
    
            <!-- The dots/circles -->
            <div style="text-align:center">
                <span class="dots" onclick="currentSlides(1)"></span>
                <span class="dots" onclick="currentSlides(2)"></span>
                <span class="dots" onclick="currentSlides(3)"></span>
                <span class="dots" onclick="currentSlides(4)"></span>
                <span class="dots" onclick="currentSlides(5)"></span>
            </div>
        </div>
    </div>
</div>
@include('slideshow')
@include('footer')

@endsection