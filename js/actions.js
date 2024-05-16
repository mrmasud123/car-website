$(document).ready(function () {
  console.log("JS activated");
  $("#header").css("background-image", "url(images/bg-light.jpg)");
  setInterval(() => {
    $("#header").css("background-image", "url(images/bg-light.jpg)");
    setTimeout(() => {
      $("#header").css("background-image", "url(images/bg.jpg)");
    }, 1000);
  }, 2200);
  $('.carousel').carousel({
    interval: 1000
  })

  $('#showPassword').click(function(){
    var passwordField = $('#password');
    
    if ($(this).is(':checked')) {
        passwordField.attr('type', 'text');
    } else {
        passwordField.attr('type', 'password');
    }
});

  $(".mv__car__1").mouseenter(function(e){
    $(this).find('.mv-details').fadeIn(1000);
  });
  $swiper = new Swiper(".feature-container", {
    loop: true,
    spaceBetween: 24,
    grabCursor: true,
    slidesPerView: 'auto',
    pagination: {
      el: ".swiper-pagination",
      dynamicBullets: true,
    },
    breakpoints: {
      640: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 1,
        spaceBetween: 40,
      },
      1024: {
        slidesPerView: 2,
        spaceBetween: 50,
      },
    }
  });
  $swiper = new Swiper(".partner_container", {
    loop: true,
    spaceBetween: 24,
    grabCursor: true,
    slidesPerView: 'auto',
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

  $('#carImg').okzoom({
    width: 200,
    height: 200,
    scaleWidth: 800
  });
  
  $('#news-img').okzoom({
    width: 200,
    height: 200,
    scaleWidth: 1000
  });
  
  //Login form
    $login_form = $("#l-form");
    $reg_form = $("#r-form");
    $('#reg-button').click(function () {
      $login_form.css("right", '-100%');
      $reg_form.css("right", '2%');
    });
    $('#log-button').click(function () {
      $login_form.css("right", '2%');
      $reg_form.css("right", '-100%');
    });

  $(document).scroll(function (e) {
    $value = $(window).scrollTop();
    if ($value >= 3300) {
      $(".offer__img").css("animation", "offerAnim forwards");
    }
    if ($value >= 400) {
      $(".header-top").addClass("head__fix");
      $("#scroll-top").css('visibility','visible');
    } else {
     
      $("#scroll-top").css('visibility','hidden');
      $("img.car-wheel-1").removeClass("add-wheel-1-anim");
      $("img.car-wheel-2").removeClass("add-wheel-1-anim");
      $('#scroll-top').removeClass("add-scroll-top-anim");
      $(".headlight").css("box-shadow", "none");
      $(".header-top").removeClass("head__fix"); 
    }
  });
  $("#scroll-top").click(function (e) {
    $("img.car-wheel-1").addClass("add-wheel-1-anim");
    $("img.car-wheel-2").addClass("add-wheel-1-anim");
    $(this).addClass("add-scroll-top-anim");
    $(".headlight").css("box-shadow", "2px -12px 12px 5px white");
    setTimeout(() => {
      $(document).scrollTop(0);
    }, 1500);
  });

  $interrior = $("#interrior");
  $exterrior = $("#exterrior");
  $("#interrior_btn").click(function () {
    $interrior.css({ "visibility": "visible", "transition": "all 0.5s" });
    $exterrior.css({ "visibility": "hidden", "transition": "all 0.5s" });
  });
  $("#exterrior_btn").click(function () {
    $interrior.css({ "visibility": "hidden", "transition": "all 0.5s" });
    $exterrior.css({ "visibility": "visible", "transition": "all 0.5s" });
  });


  $("#interrior .single_image img").on("click", function () {
    $image = $(this).attr("src");
    $(".interrior__selected__image img").attr("src", $image)
  });
  $("#exterrior .single_image img").on("click", function () {
    $image = $(this).attr("src");
    $(".exterrior__selected__image img").attr("src", $image)
  });

  $("#innovation .images-group .image img").on("click", function () {
    $image = $(this).attr("src");
    $("#innovation .selected__img img").attr("src", $image)
  });

  $(".expand_btn").on('click', function (e) {
    $(this).siblings().css("visibility", "visible");
    $(this).css("visibility", "hidden");
    $(this).parent().parent().siblings().slideDown(1500);
    $(this).parent().parent().siblings().fadeIn();
  });
  $(".collapse_btn").on('click', function (e) {
    $(this).siblings().css("visibility", "visible");
    $(this).css("visibility", "hidden");
    $(this).parent().parent().siblings().slideUp(1500);
    $(this).parent().parent().siblings().fadeOut();
  });

  $("#form-close").on('click', function (e) {

    $(".drive-form-container").fadeOut(2000);
    $("#test-drive-form").css({ "opacity": "0", "z-index": "-1", 'transition': "all 1s" });
    $(".drive-form-container").css({ 'transition': "all 1s", 'top': "-100%" });
    setTimeout(() => {
      location.reload();
    }, 1500);
  });

  $("#user_btn").on("click", function (e) {
    $(".user-options").slideToggle(1000);
  });

  $textbox = $(".position-absolute h1");
  $text = ["M", "R", "C", "A", "R", " ", "N", "E", "W", "S"];
  $initcounter = 0;

  setInterval(() => {
    if ($initcounter < $text.length) {
      $textbox.append($text[$initcounter]);

    } else {
      $initcounter = -1;
      $textbox.text("");
    }

    $initcounter++;
  }, 500);
  //////////////////////////////////////////////////////////        
  //Form Submit
  function submitForm(formData, show_error_location, success_msg, redirect_location = null) {
    $.ajax({
      url: 'php_files/user-actions.php',
      method: 'post',
      contentType: false,
      processData: false,
      data: formData,
      dataType: 'json',
      success: function (response) {
        var message = response;
        console.log(message)
        if (message.success == 1) {
          $('' + show_error_location + '').prepend("<span class='rounded text-light mt-2 bg-success p-2'>" + success_msg + "</span>");
          if (redirect_location == null) {
            location.reload();
          } else {
            setTimeout(() => { location.href = redirect_location }, 2000);
          }

        } else {
          $('' + show_error_location + '').prepend("<span class='text-light bg-danger p-2 rounded alertMsg'>" + message.error + "</span>");
          setTimeout(function () { $('.alertMsg').remove(); }, 1500);
        }
      }
    });
  }

  //User login
  $("#loginform").on('submit', function (e) {
    e.preventDefault();
    
    var redirected_loc=$(".redirected_page").text();
    var formData = new FormData(this);
    formData.append('user_login', 1);
    submitForm(formData, "#loginform", "Login success", redirected_loc);
  });

  //Usser Registration
  $("#regForm").on('submit',function(e){
    e.preventDefault();
    console.log("Reg Form");
    var redirected_loc=$(".redirected_page").text();
    var formData=new FormData(this);
    formData.append('user_reg',1);
    submitForm(formData, "#regForm","Registration success", redirected_loc);
  });

  //User logout
  $("#logout").on('click', function (e) {
    $.ajax({
      url: 'php_files/user-actions.php',
      method: 'POST',
      data: { 'logout': 1 },
      success: function (res) {
        if (res) {
          location.reload();
        }
      }
    });
  });

  //Like and dislike on comments
  function like_dislike(){
    $(".thumb").on('click',function(e){
      var inc_type=$(this).attr('data-inc-type');
      var cmnt_id=$(this).attr('data-post-id');
      $.ajax({
        url: 'php_files/user-actions.php',
        method: 'post',
        data: { 'cmnt_like': 1, 'cmnt_id': cmnt_id, 'inc_type': inc_type },
        dataTye:'json',
        success: function (res) {
          var ld=JSON.parse(res);
          var like=ld.arr[0];
          var dislike=ld.arr[1];
          if($(e.currentTarget).parent().hasClass('like')){
            $(e.currentTarget).siblings().text(like);
          }else{
            $(e.currentTarget).siblings().text(dislike);
          }
        }
      });
    });
  }
  var view_arr=[];
  function IncView(){
    $(".view__btn").on('click',function(e){
      var view_id=$(this).attr('data-view-cid');
      view_arr.push(view_id);
      $.ajax({
        url:'php_files/user-actions.php',
        method:'POST',
        data:{'viewInc':1,'view_id':view_id,'newly_viewed':view_arr},
        success:function(res){
          console.log(res);
        }
      });
    });
  }

  ///inc news view
  // function incNewsView(){
    $(".inc_news").on("click",function(e){
      // e.preventDefault();
      var n_id=$(this).attr("data-news-id");
      $.ajax({
        url:'php_files/user-actions.php',
        method:'POST',
        data:{'NewsViewInc':1,'n_id':n_id},
        success:function(res){
            return true;
        }
      });
    });
  // }
  // incNewsView();
  IncView();
  //Check if already request test drive
  function checkTestDrive(){
    var id=$(".active_id").val();
    if(id != "0"){
      $.ajax({
        url: 'php_files/user-actions.php',
        method: 'post',
        data: { 'check_test_drive': 1, 'user_id': id },
        success: function (res) {
          console.log(res)
          if(parseInt(res)==1){
            $("#test_drive_form").css('display',"none");
            $('.test-drive-form-container').append("<h2><span class='badge bg-danger'>Already applied for a test drive.</span></h2>");
          }else{
            $("#test_drive_form").css('display',"block");
          }
        }
        });

        if($(".page_url").val()=="read-more-news.php"){
          var pid=$(".pid").val();
          $.ajax({
              url: 'php_files/user-actions.php',
              method: 'post',
              data: { 'load_comments': 1,'pid':pid},
              success: function (res) {
                $(".commentators").html(res);
                like_dislike();
                delete_comments();
              }
          });
        }
    }else{
      $(".news").append("<br><span class='badge bg-danger mt-3'>Login to view or comment on post</span>");
      $(".news-comment").css("display","none");
      console.log("not logged in");
    }
  }

  //Delete commnets
  function delete_comments(){
    $(".comment_delete").on('click', function(e){
      var pid=$(".pid").val();
      var cmnt_id=$(this).attr("data-comment-id");
      $.ajax({
        url: 'php_files/user-actions.php',
        method: 'post',
        data: { 'delete_comments': 1,'cmnt_id':cmnt_id, 'pid':pid},
        success: function (res) {
          $(".commentators").html(res);
          delete_comments();
          like_dislike();
        }
      });
    });
  }
  // delete_comments();
  checkTestDrive();
  //Load all models
  $("select[name='car-type']").on("change", function (e) {
    e.preventDefault();
    var mod_id = $(this).val();
    $.ajax({
      url: 'php_files/user-actions.php',
      method: 'post',
      data: { 'loadModel': 1, 'mod_id': mod_id },
      success: function (res) {
        $(".sub_model_list").html(res);
        IncView();
      }
    });
  });

  //purchase models by searching
  $("select[name='search_type']").on("change", function (e) {
    e.preventDefault();
    var search_type = $(this).val();
    console.log(search_type);
    $.ajax({
      url: 'php_files/user-actions.php',
      method: 'post',
      data: { 'loadFilteredModel': 1, 'search_type': search_type },
      success: function (res) {
        $(".car-list-content").html(res);
        //Increment view
        IncView();
        //Check user session
        $(".apply__btn").on('click',function(e){
          var active_user=$(".active__user").text();
          var c_id=$(this).attr('data-cid');
          if(active_user==""){
            alert("You need to login first");
          }else{
            location.href=`test-drive.php?id='${c_id}'`;
          }
        });
      }
    });
  });
  //Submit the test drive form
  $("#test_drive_form").on('submit', function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('req_test_drive', 1);
    console.log(formData);
    submitForm(formData, ".show-err", "Form Submitted", null);
  });

  //Comment form submit
  $("#commentForm").on('submit',function(e){
    e.preventDefault();
    var formData=new FormData(this);
    formData.append('cmnt',1);
    $.ajax({
      url:'php_files/user-actions.php',
      method:'POST',
      contentType:false,
      processData:false,
      data:formData,
      success:function(res){
        $(".commentators").html(res);
        $("#commentForm")[0].reset();
        like_dislike();
        delete_comments();
      }
    });
  });

  //Remove viewed cars
  function remImg(cid){
  $.ajax({
            url:'php_files/user-actions.php',
            method:'POST',
            data:{'remove_viewed_car':1, 'cid':cid},
            success:function(res){
              $('.view_car').html(res);
            }
        });
  }
  $(document).on("click",".remove_viewed_car",function(e){
    var cid=$(this).attr("data-remove-car-id");
    remImg(cid);
});
$(document).on("click",".cancel_test_drive", function(e){
  var t_id=$(this).attr("data-test-drive-id");
  $.ajax({
    url:'php_files/user-actions.php',
    method:'POST',
    data:{'remove_test_drive':1, 't_id':t_id},
    success:function(res){
      if(res){
        location.reload();
      }
    }
});
});
  //update profile
  $("#update_profile").on('submit',function(e){
    e.preventDefault();
    $(document).scrollTop(600);
    var formData=new FormData(this);
    formData.append('update_profile',1);
    formData.append('img',"new_user_img");
    submitForm(formData,"#update_profile","Profile Updated",null);
  });

  //Contact form submit
  // $(document).on("submit","#contact_form",function(e){
    $("#contact_form").on('submit',function(e){
    e.preventDefault();
    console.log('form');
    var formData=new FormData(this);
    formData.append('contact_form_submit',1);
    submitForm(formData,"#contact_form","Form submitted",null);
  });

});