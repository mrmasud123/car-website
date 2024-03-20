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

  //input box append
  let ext_cnt = 0;
  $(".add_ext_box").on("click", function (e) {
    e.preventDefault();
    ext_cnt++;
    $(e.currentTarget).siblings().eq(0).append(`<input type="text" name="car_name" placeholder="Exterrior features ${ext_cnt + 1}" class="mb-2 form-control extbox${ext_cnt}">`);

    console.log("Append")
  });

  let int_cnt = 0;
  $(".add_int_box").on("click", function (e) {
    e.preventDefault();
    int_cnt++;
    $(e.currentTarget).siblings().eq(0).append(`<input type="text" name="car_name" placeholder="Interrior features ${int_cnt + 1}" class="mb-2 form-control intbox${int_cnt}">`);

    console.log("Append")
  });

  let am_cnt = 0;
  $(".add_am_box").on("click", function (e) {
    e.preventDefault();
    am_cnt++;
    $(e.currentTarget).siblings().eq(0).append(`<input type="text" name="car_name" placeholder="Audio/Multimedia features ${am_cnt + 1}" class="mb-2 form-control ambox${am_cnt}">`);

    console.log("Append")
  });

  let safety_cnt = 0;
  $(".add_safety_box").on("click", function (e) {
    e.preventDefault();
    safety_cnt++;
    $(e.currentTarget).siblings().eq(0).append(`<input type="text" name="car_name" placeholder="Safety and Convenience features ${safety_cnt + 1}" class="mb-2 form-control safetybox${safety_cnt}">`);

    console.log("Append")
  });

  let car_cnt = 0;
  $(".add_car_box").on("click", function (e) {
    e.preventDefault();
    car_cnt++;
    $(e.currentTarget).siblings().eq(0).append(`<input type="text" name="car_name" placeholder="Car name" class="mb-2 form-control carbox${car_cnt}"> <input type="number" name="car_name" placeholder="Car Quantity" class="mb-2 form-control carqty${car_cnt}">`);

    console.log("Append")
  });

  let salesman = 0;
  $(".add_salesman_box").on("click", function (e) {
    e.preventDefault();
    salesman++;
    $(e.currentTarget).siblings().eq(0).append(`<input type="text" name="car_name" placeholder="Salesman Name" class="mb-2 form-control salesmanbox${salesman}">`);

    console.log("Append")
  });

  let mechanic = 0;
  $(".add_mechanic_box").on("click", function (e) {
    e.preventDefault();
    salesman++;
    $(e.currentTarget).siblings().eq(0).append(`<input type="text" name="car_name" placeholder="Salesman Name" class="mb-2 form-control mechanicbox${mechanic}">`);
    
    console.log("Append")
  });

  let display_img = 0;
  $(".add_disp_img_box").on("click", function (e) {
    e.preventDefault();
    display_img++;
    $(e.currentTarget).siblings().eq(0).append(`<input type="file" name="car_name" class="mb-2 form-control displayimg${display_img}">`);
    
    console.log("Append")
  });

  let ext_img = 0;
  $(".add_ext_img_box").on("click", function (e) {
    e.preventDefault();
    ext_img++;
    $(e.currentTarget).siblings().eq(0).append(`<input type="file" name="car_name" class="mb-2 form-control extimg${ext_img}">`);
    
    console.log("Append")
  });
  $(".add_int_img_box").on("click", function (e) {
    e.preventDefault();
    var attrname=$(this).attr('data-name');
      console.log()
      $(e.currentTarget).siblings().eq(0).append(`<input type="file" name="car_name" class="mb-2 form-control ${attrname +"_"+ext_img}">`);
    });
  // let int_img = 0;
  // $(".add_int_img_box").on("click", function (e) {
  //   e.preventDefault();
  //   int_img++;
  //   $(e.currentTarget).siblings().eq(0).append(`<input type="file" name="car_name" class="mb-2 form-control intimg${int_img}">`);
  //   mechanic
  //   console.log("Append")
  // });
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

});