function clicklistmember (){
    var x = document.getElementsByClassName("sub_menu_listmember");
    for(var i = 0; i < x.length; i++)
    {
        if (x[i].style.display == "flex") {
            x[i].style.display = "none";
        } else {
            x[i].style.display = "flex";
        }
    }
    
}

function clickopenuploadimage (){
    var x = document.getElementsByClassName("change_image");
    for(var i = 0; i < x.length; i++)
    {
        if (x[i].style.display == "flex") {
            x[i].style.display = "none";
        } else {
            x[i].style.display = "flex";
        }
    }
    
}

function clickinfoadmin (){
    var x = document.getElementsByClassName("submenu_infoadmin");
    for(var i = 0; i < x.length; i++)
    {
        if (x[i].style.display == "initial") {
            x[i].style.display = "none";
        } else {
            x[i].style.display = "initial";
        }
    }
    
}

function clickaddnote (){
    var x = document.getElementsByClassName("div_addnote");
    for(var i = 0; i < x.length; i++)
    {
        if (x[i].style.display == "flex") {
            x[i].style.display = "none";
        } else {
            x[i].style.display = "flex";
        }
    }
    
}

function clickinfouser (){
    var x = document.getElementsByClassName("submenu_infouser");
    for(var i = 0; i < x.length; i++)
    {
        if (x[i].style.display == "initial") {
            x[i].style.display = "none";
        } else {
            x[i].style.display = "initial";
        }
    }
    
}

function clicksidebarmenumobile (){
    var x = document.getElementsByClassName("sidebarleft");
    for(var i = 0; i < x.length; i++)
    {

        if (x[i].style.display == "flex") {
            x[i].classList.add("hideNav");
            x[i].classList.remove("showNav");
            x[i].style.display = "none";
            

        } else {
            x[i].classList.add("showNav");
            x[i].classList.remove("hideNav");
            x[i].style.display = "flex";
        }
    }
}

function clicklistactivity (){
    var x = document.getElementsByClassName("sub_menu_listactivity");
    for(var i = 0; i < x.length; i++)
    {
        if (x[i].style.display == "flex") {
            x[i].style.display = "none";
            x[i].toggleClass("showNav");

        } else {
            x[i].style.display = "flex";
        }
    
    }

}
function clicklistmeeting (){
    var x = document.getElementsByClassName("sub_menu_listmeeting");
    for(var i = 0; i < x.length; i++)
    {
        if (x[i].style.display == "flex") {
            x[i].style.display = "none";
        } else {
            x[i].style.display = "flex";
        }
    
    }

}

// let getelement = document.querySelectorAll(".sidebarnormal")
// getelement.forEach(element => {
//     element.addEventListener('click', ()=>{
//         document.querySelector(".sidebaractive").classList.remove('sidebaractive')
//         element.classList.add('sidebaractive')
//     })
// });

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url)
{
    if(confirm('Xóa mà không thể khôi phục. Bạn có chắc ?')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id},
            url: url,
            success: function(result){
                if(result.error == false){
                    alert(result.message);
                    location.reload();
                } else {
                    alert("Xóa lỗi");
                }
            }
        })
    }
}

function choosefile(fileInput){
    if(fileInput.files && fileInput.files[0]){
        let reader = new FileReader();
        reader.onload = function (e) {
            $('#user_image').attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
}

function cancelRegister(id, url)
{
    if(confirm('Hủy Đăng ký, Bạn có chắc?')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id},
            url: url,
            success: function(result){
                if(result.error == false){
                    alert(result.message);
                    location.reload();
                } else {
                    alert("Hủy Đăng ký lỗi");
                }
            }
        })
    }
}
let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "flex";
  dots[slideIndex-1].className += " active";
}

let slideIndexx = 1;
showSlidess(slideIndexx);

// Next/previous controls
function plusSlidess(n) {
  showSlidess(slideIndexx += n);
}

// Thumbnail image controls
function currentSlides(n) {
  showSlidess(slideIndexx = n);
}

function showSlidess(n) {
  let i;
  let slides = document.getElementsByClassName("mySlidess");
  let dots = document.getElementsByClassName("dots");
  if (n > slides.length) {slideIndexx = 1}
  if (n < 1) {slideIndexx = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndexx-1].style.display = "flex";
  dots[slideIndexx-1].className += " active";
}

showSlidesauto();

function showSlidesauto() {
  let slides = document.getElementsByClassName("mySlidess");
  let dots = document.getElementsByClassName("dots");

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
    dots[i].className = dots[i].className.replace(" active", "");
  }
  
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "flex";
  dots[slideIndex-1].className += " active";
  setTimeout(showSlidesauto, 5000); 
}

