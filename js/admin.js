$(document).ready(function () {
  $("#optionBtn").click(function () {
    $("#options").toggleClass("sh");
    console.log("Clickde");
  });

  ////
  $(".close-btn").click(function () {
    $('.card.w-25').css('top', '10%');
    $('.card.w-25').css('transition', '0.6s');
    $(".card.w-25").fadeOut();
    $('.checkoutmodal').fadeOut();

    console.log("hioo")
  });
  $("#checkoutBtn").click(function () {
    $('.checkoutmodal').fadeIn();
    $(".card.w-25").fadeIn();
    $('.card.w-25').css('top', '50%');
    $('.card.w-25').css('transition', '0.6s');


  });

  $icon = $("#sidebarIcon");
  $leftContainer = $(".left-container");
  $icon.on('click', function () {
    $(".right-container").toggleClass('rightsh');
    $('#wrapper a p').toggleClass('link-sh');
    $leftContainer.toggleClass('sh');
    $leftContainer.on('mouseenter', function () {
      if ($leftContainer.hasClass('sh')) {
        $leftContainer.toggleClass('nsh');
        $("#wrapper a p").toggleClass('nlink-sh');
        $leftContainer.css('z-index', '1');
      }
    });

    $leftContainer.on('mouseleave', function () {
      if ($leftContainer.hasClass('nsh')) {
        $leftContainer.removeClass('nsh');
        $("#wrapper a p").removeClass('nlink-sh');
      }
    });
  });

  $("#adminBtn").click('click', function () {
    $(".btn-group").toggleClass('slide-btn-group');
  });

  //Employeee
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

  //view sold cars list
  $("#form-close").on('click', function (e) {
    $(".drive-form-container").fadeOut(2000);
    $("#test-drive-form").css({ "opacity": "0", "z-index": "-1", 'transition': "all 1s" });
    $(".drive-form-container").css({ 'transition': "all 1s", 'top': "-100%" });
  });
  $(".view_sold_car").on('click', function (e) {
    $(".drive-form-container").fadeIn(2000);
    $("#test-drive-form").css({ "opacity": "1", "visibility": "visible", "z-index": "1001", 'transition': "all 1s" });
    $(".drive-form-container").css({ 'transition': "all 1s", 'top': "50%" });
  });

  
  function appendBox(e,attrname,cnt) {
      if(attrname=="disp_img" || attrname=="exterrior_img" || attrname=="interrior_img"){
        $(e.currentTarget).siblings().eq(0).append(`<input type="file" name="${attrname+"_"+cnt}" class="mb-2 form-control ${attrname}">`);
      }else{
        $(e.currentTarget).siblings().eq(0).append(`<input type="text" name="${attrname+"_"+cnt}" class="mb-2 form-control ${attrname}">`);
      }
  }
  var cnt=0;
  $(".add_box").on('click',function(e){
    e.preventDefault();
    cnt++;
    var attrname=$(this).attr('data-name');
    appendBox(e,attrname,cnt);
  });
  
  /* Edit admin section code */
  $("#form-close").on('click', function (e) {
    $(".drive-form-container").fadeOut(2000);
    $("#test-drive-form").css({ "opacity": "0", "z-index": "-1", 'transition': "all 1s" });
    $(".drive-form-container").css({ 'transition': "all 1s", 'top': "-100%" });
  });
  $(".edit_admin").on('click', function (e) {
    $(".drive-form-container").fadeIn(2000);
    $("#test-drive-form").css({ "opacity": "1", "visibility": "visible", "z-index": "1001", 'transition': "all 1s" });
    $(".drive-form-container").css({ 'transition': "all 1s", 'top': "50%" });
  });

  //Get alert message
  function getAlert($message, $show_error_location, $success_msg, $location = null) {
    if ($message.success == 1) {
      $('' + $show_error_location + '').prepend("<span class='rounded text-light mt-2 bg-success p-2'>" + $success_msg + "</span>");
      if ($location == null) {
        location.reload();
      } else {
        setTimeout(() => { location.href = $location }, 2000);
      }

    } else {
      $('' + $show_error_location + '').prepend("<span class='text-light bg-danger p-2 rounded mt-3 alertMsg'>" + $message.error + "</span>");
      setTimeout(function () { $('.alertMsg').remove(); }, 1500);
    }
  }

  //Form Submit
  function submitForm(formData, show_error_location, success_msg, redirect_location = null) {

    $.ajax({
      url: '../php_files/admin-actions.php',
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
          $('' + show_error_location + '').prepend("<span class='text-light bg-danger p-2 rounded mt-3 alertMsg'>" + message.error + "</span>");
          setTimeout(function () { $('.alertMsg').remove(); }, 1500);
        }

      }
    });
  }
  //Admin login
  $("#adminLoginForm").on('submit', function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('adminLogin', 1);
    $.ajax({
      url: '../php_files/admin-actions.php',
      method: 'post',
      contentType: false,
      processData: false,
      data: formData,
      dataType: 'json',
      success: function (response) {
        var data = response;
        getAlert(data, "#adminLoginForm", "Login Success", "index.php");
      }
    });
  });

  //Admin logout
  $(".adminlogoutBtn").on('click', (e) => {
    $.ajax({
      url: '../php_files/admin-actions.php',
      type: 'post',
      data: { 'logout': 1 },
      success: function ($response) {
        if ($response) {
          location.href = 'admin-login.php';
        }
      }
    });
  });

  //Add employee
  $("#AddEmpForm").on("submit", function (e) {
    e.preventDefault();
    $(document).scrollTop(0);
    var formData = new FormData(this);
    formData.append('addEmployee', 1);
    submitForm(formData, "#AddEmpForm", "Employee Added", "employee.php");
  });

  //Add car
  $("#specs_form").on('submit', function(e){
    e.preventDefault();
    $(document).scrollTop(0);
    var formData = new FormData(this);
    console.log(formData)
    // formData.append('addCar', 1);
    // submitForm(formData, "#specs_form", "Car Added", "models.php");
  });
});