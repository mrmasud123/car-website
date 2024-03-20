$(document).ready(function(){
    
    // $("#header").css("background-image","url(images/bg-light.jpg)");
    // setInterval(() => {
    //     $("#header").css("background-image","url(images/bg-light.jpg)");
    //     setTimeout(() => {
    //         $("#header").css("background-image","url(images/bg.jpg)");
    //     }, 1000);
    // }, 2200);

      $swiper = new Swiper(".feature-container", {
      loop:true,
      spaceBetween:24,
      grabCursor:true,
      slidesPerView:'auto',
        pagination: {
          el: ".swiper-pagination",
          dynamicBullets: true,
        },
        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 4,
            spaceBetween: 40,
          },
          1024: {
            slidesPerView: 5,
            spaceBetween: 50,
          },
        }
      });
    $swiper = new Swiper(".partner_container", {
      loop:true,
      spaceBetween:24,
      grabCursor:true,
      slidesPerView:'auto',
        pagination: {
          el: ".swiper-pagination",
          dynamicBullets: true,
        },
        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 4,
            spaceBetween: 40,
          },
          1024: {
            slidesPerView: 5,
            spaceBetween: 50,
          },
        }
      });

      $(document).scroll(function(e){
        $value=$(window).scrollTop();
        console.log($value);
        if($value>=1000){
          $('#scroll-top').css({"visibility":"visible", 'transition':"all 0.5s"});
          $(".car").css("animation","car_anim 2s forwards");
        }else{
          $('#scroll-top').css("visibility","hidden");
          $("img.car-wheel-1").removeClass("add-wheel-1-anim");
          $("img.car-wheel-2").removeClass("add-wheel-1-anim");
          $("#scroll-top").removeClass("add-scroll-top-anim");
          $(".headlight").css("box-shadow","0px 0px 0px 0px transparent");
        }
        if($value>=3300){
            $(".offer__img").css("animation","offerAnim forwards");
        }
        if($value>=500){
          $(".header-top").addClass("header-fix");
        }else{
          $(".header-top").removeClass("header-fix");
        }
    });
      $("#scroll-top").click(function(e){
        $("img.car-wheel-1").addClass("add-wheel-1-anim");
        $("img.car-wheel-2").addClass("add-wheel-1-anim");
        $(this).addClass("add-scroll-top-anim");
        $(".headlight").css("box-shadow","2px -12px 12px 5px white");
        setTimeout(()=>{
          $(document).scrollTop(0);
        },1500);
      });

      $interrior=$("#interrior");
      $exterrior=$("#exterrior");
      $("#interrior_btn").click(function(){
        $interrior.css({"visibility":"visible", "transition":"all 0.5s"});
        $exterrior.css({"visibility":"hidden", "transition":"all 0.5s"});
      });
      $("#exterrior_btn").click(function(){
        $interrior.css({"visibility":"hidden", "transition":"all 0.5s"});
        $exterrior.css({"visibility":"visible", "transition":"all 0.5s"});
      });

      

      $("#interrior .single_image img").on("click",function(){
        $image= $(this).attr("src");
        $(".interrior__selected__image img").attr("src",$image)
        });
        $("#exterrior .single_image img").on("click",function(){
          $image= $(this).attr("src");
        $(".exterrior__selected__image img").attr("src",$image)
      });

      $("#innovation .images-group .image img").on("click",function(){
        $image= $(this).attr("src");
        $("#innovation .selected__img img").attr("src",$image)
      });

      $(".expand_btn").on('click',function(e){
        $(this).siblings().css("visibility","visible");
        $(this).css("visibility","hidden");
        $(this).parent().parent().siblings().slideDown(1500);
        $(this).parent().parent().siblings().fadeIn();
      });
      $(".collapse_btn").on('click',function(e){
        $(this).siblings().css("visibility","visible");
        $(this).css("visibility","hidden");
        $(this).parent().parent().siblings().slideUp(1500);
        $(this).parent().parent().siblings().fadeOut();
      });

      $("#form-close").on('click',function(e){
        $(".drive-form-container").fadeOut(2000);
        $("#test-drive-form").css({"opacity":"0","z-index":"-1",'transition':"all 1s"});
        $(".drive-form-container").css({ 'transition':"all 1s",'top':"-100%"});
      });
      $("#apply-btn").on('click',function(e){
        $(".drive-form-container").fadeIn(2000);
        $("#test-drive-form").css({"opacity":"1","visibility":"visible","z-index":"1001",'transition':"all 1s"});
        $(".drive-form-container").css({ 'transition':"all 1s",'top':"50%"});
      });
      $("#user_btn").on("click",function(e){
        $(".user-options").slideToggle(1000);
       // $(".user-options").css("transition","all 2s");
      });

      $textbox=$(".position-absolute h1");
      $text=["M","R","C","A","R", " ","N","E","W","S"];
      $initcounter=0;
    
        setInterval(()=>{
          if($initcounter<$text.length){
            $textbox.append($text[$initcounter]);
            
          }else{
            $initcounter=-1;
            $textbox.text("");
          }
          
          $initcounter++;
        },500);
      
      console.log($textbox.text())

});