$(document).ready(function () {
  $('#showPassword').click(function(){
    var passwordField = $('#password');
    
    if ($(this).is(':checked')) {
        passwordField.attr('type', 'text');
    } else {
        passwordField.attr('type', 'password');
    }
});
  $("#optionBtn").click(function () {
    $("#options").toggleClass("sh");
    console.log("Clickde");
  });

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

  //view sold cars list
  $("#form-close").on('click', function (e) {
    $(".drive-form-container").fadeOut(2000);
    $("#test-drive-form").css({ "opacity": "0", "z-index": "-1", 'transition': "all 1s" });
    $(".drive-form-container").css({ 'transition': "all 1s", 'top': "-100%" });
  });

  $(".view_sold_car").on('click', function (e) {
    cid = $(this).attr('data-branchId');
    formData = {};
    formData.total_sales = 1;
    formData.cid = cid;
    $.ajax({
      url: '../php_files/admin-actions.php',
      method: 'post',
      data: formData,
      dataType: 'json',
      success: function (response) {
        data = JSON.stringify(response);

        $("#sales_data").html(data);
        console.log(data)
      }
    });
    $(".drive-form-container").fadeIn(2000);

    $("#test-drive-form").css({ "opacity": "1", "visibility": "visible", "z-index": "1001", 'transition': "all 1s" });
    $(".drive-form-container").css({ 'transition': "all 1s", 'top': "50%" });
  });

  function appendBox(e, attrname, cnt) {
    if (attrname == "disp_img" || attrname == "exterrior_img" || attrname == "interrior_img") {
      $(e.currentTarget).siblings().eq(0).append(`<input type="file" name="${attrname + "_" + cnt}" class="mb-2 form-control ${attrname}">`);
    } else {
      $(e.currentTarget).siblings().eq(0).append(`<input type="text" value="" name="${attrname + "_" + cnt}" class="mb-2 form-control ${attrname}">`);
    }
  }
  var cnt = 0;
  $(".add_box").on('click', function (e) {
    e.preventDefault();
    cnt++;
    var attrname = $(this).attr('data-name');
    appendBox(e, attrname, cnt);
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

  //Update employee
  $("#employee-update").on('submit',function(e){
    e.preventDefault();
    $(document).scrollTop(0);
    var formData = new FormData(this);
    formData.append('updateEmployee', 1);
    formData.append('img','new_emp_img');
    submitForm(formData, "#employee-update", "Employee Updated", "employee.php");
  });

  //Add car
  $("#specs_form").on('submit', function (e) {
    e.preventDefault();

    $(document).scrollTop(0);
    var ext_value = [];
    var int_value = [];
    var safety_value = [];
    var audio_mult_value = [];
    $(".exterrior_d").each(function (index, element) {
      ext_value.push($(element).val());
    });
    $(".interrior_d").each(function (index, ele) {
      int_value.push($(ele).val());
    });
    $(".safety").each(function (index, elem) {
      safety_value.push($(elem).val());
    });
    $(".audio_mult").each(function (index, el) {
      audio_mult_value.push($(el).val());
    });
    var extText = ext_value.join(".");
    var intText = int_value.join(".");
    var safetyText = safety_value.join(".");
    var amText = audio_mult_value.join(".");
    var display_images = $('.display input[type="file"]').map(function () {
      return $(this).attr('name');
    }).get();
    var exterrior_images = $('.exterrior input[type="file"]').map(function () {
      return $(this).attr('name');
    }).get();
    var interrior_images = $('.interrior input[type="file"]').map(function () {
      return $(this).attr('name');
    }).get();
    var formData = new FormData(this);
    formData.append('ext_data', extText);
    formData.append('int_data', intText);
    formData.append('safety_data', safetyText);
    formData.append('am_data', amText);
    formData.append('disp_img_name_fields', display_images);
    formData.append('ext_img_name_fields', exterrior_images);
    formData.append('int_img_name_fields', interrior_images);
    formData.append('car_img', "car_img");
    formData.append('addCar', 1);
    submitForm(formData, ".warning-box", "Car Added", "models.php");
  });

  //Choose car name
  $("#choose_car").on('change', function (e) {
    cid = $(this).val();
    $(".car_id").val(cid);

    $.ajax({
      url: '../php_files/admin-actions.php',
      method: 'post',
      data: { 'choose_car': 1, 'car_id': cid },
      dataType: 'json',
      success: function (response) {
        $(".car_price").val(response.data[1]);
        $(".available_qty").val(response.data[0]);
        //  console.log(response.data[1]);
      }
    });
  });

  //Choose branch
  $("#choose_branch").on('change', function () {
    bid = $(this).val();
    $.ajax({
      url: '../php_files/admin-actions.php',
      method: 'post',
      data: { 'choose_branch': 1, 'branch_id': bid },
      success: function (response) {
        $(".manager_name").val(response);
      }
    });
  });

  // Calculate Sale
  $("#add_sale_form").on('submit', function (e) {
    e.preventDefault();
    $(document).scrollTop(0);
    var formData = new FormData(this);
    formData.append('calculate_sale', 1);
    $.ajax({
      url: '../php_files/admin-actions.php',
      method: 'post',
      contentType: false,
      processData: false,
      data: formData,
      dataType: 'json',
      success: function (response) {

        if (response.success) {
          $(".bill-container article").css('display', 'block');
          $(document).scrollTop($(document).height());
          $(".sale_btn").attr('disabled', false);
          $(".sale_data").html(response.data);
          //Add sale
          $(".sale_btn").on('click', function () {
            $(document).scrollTop(0);
            $.ajax({
              url: '../php_files/admin-actions.php',
              method: 'post',
              data: { 'add_sale': 1 },
              dataType: 'json',
              success: function (response) {
                if (response.success) {
                  $('.specs__container').prepend("<span class='rounded text-light mt-2 bg-success p-2'>Sales Added</span>");
                  setTimeout(() => { location.href = "total-sales.php" }, 2000);
                }
              }
            })
          });
        } else {
          $('.specs__container').prepend("<span class='text-light bg-danger p-2 rounded mt-3 alertMsg'>" + response.error + "</span>");
          $(".sale_btn").attr('disabled', true);
          setTimeout(function () { $('.alertMsg').remove(); }, 1500);
        }
      }
    });

  });

  //Loading all the years 
  var select = $("#estd");
  var currentYear = new Date().getFullYear();
  for (var i = currentYear; i >= 2005; i--) {
    select.append($("<option>").val(i).text(i));
  }
  //Car quantity check
  var car_qty_cnt = 0;
  $(".carqty").on('input', function (e) {
    $(e.currentTarget).focus();
    var cqty = $(this).val();
    var cid = $(this).attr('data-cid');
    $.ajax({
      url: '../php_files/admin-actions.php',
      method: 'post',
      data: { 'qty_check': 1, 'cqty': cqty, 'cid': cid },
      success: function (res) {
        if (res == "0") {
          // $(e.currentTarget).siblings().css('display',"block");
          $(e.currentTarget).siblings().text("Invalid Quantity");
          $("#add_showroom_btn").attr('disabled', true);
        } else {
          // $(e.currentTarget).siblings().css('display',"none");
          car_qty_cnt++;
          $(e.currentTarget).siblings().text("");
          $("#add_showroom_btn").attr('disabled', false);
        }
      }
    });
  });

  //instock car quantity
  $(".instock__car__qty").each(function () {
    var lastVal = parseInt($(this).val());
    $(this).on('input', function (e) {

      $(e.currentTarget).focus();
      var available_qty = $(this).attr('data-qty');
      var newqty = parseInt($(this).val());
      var cid = $(this).attr('data-cid');
      $.ajax({
        url: '../php_files/admin-actions.php',
        method: 'post',
        data: { 'instock_qty_check': 1, 'lastVal': lastVal, 'currentVal': newqty, 'available': available_qty, 'newqty': newqty, 'cid': cid },
        success: function (res) {
          if (res == "0") {
            $(e.currentTarget).siblings("p").text("Invalid Quantity");
            $("#add_showroom_btn").attr('disabled', true);
          } else {
            $(e.currentTarget).siblings("p").text("");
            $("#add_showroom_btn").attr('disabled', false);
            if ($('.reflect').hasClass(`reflect${cid}`)) {
              $(`.reflect${cid}`).text(res);
              console.log(res);
            }
          }
        }
      });
      lastVal = newqty;
    });
  });

  //salesman on change func
  var salesman_id_arr = [];
  var salesman_txt = "";
  var mechanic_id_arr = [];
  var mechanic_txt = "";
  $(".salesman_ids").on('change', function (e) {
    var value = $(e.currentTarget).val();
   
    if ($(e.currentTarget).prop('checked')) {
      salesman_id_arr.push(value);
    } else {
      salesman_id_arr = salesman_id_arr.filter((item) => {
        return item !== value;
      });
    }
    salesman_txt = salesman_id_arr.join(",");
    console.log("Salesman : "+salesman_txt);
  });
  ////checking the checked salesman and mechanics on load
  $(".salesman_ids").each(function (index, element) {
    if ($(element).prop('checked')) {
      salesman_id_arr.push($(this).val());
    }
  });
  // console.log(salesman_id_arr);
  $(".mechanic_ids").each(function (index, element) {
    if ($(element).prop('checked')) {
      mechanic_id_arr.push($(this).val());
    }
  });
  // console.log(mechanic_id_arr);
  ///////
  $(".mechanic_ids").on('change', function (e) {
    var value = $(e.currentTarget).val();
    if ($(e.currentTarget).prop('checked')) {
      mechanic_id_arr.push(value);
    } else {
      mechanic_id_arr = mechanic_id_arr.filter((item) => {
        return item !== value;
      });
    }
    mechanic_txt = mechanic_id_arr.join(",");
    // console.log("Mechanic : "+mechanic_txt);
  });

  //Add showroom
  $("#add_showroom_form").on('submit', function (e) {
    e.preventDefault();
    $(document).scrollTop(0);
    var car_name = [];
    var mechanic = [];
    var salesman = [];
    var car_qty = [];
    $(".car_box").each(function (index, element) {
      if ($(element).val() != null) {
        car_name.push($(element).val());
      }
    });
    $(".salesman_box").each(function (index, elem) {
      if ($(elem).val() != null) {

        salesman.push($(elem).val());
      }
    });
    $(".mechanic_box").each(function (index, el) {
      if ($(this).val() != null) {

        mechanic.push($(el).val());
      }
    });
    $(".carqty").each(function (index, elemt) {
      if ($(this).val() != null) {

        car_qty.push($(elemt).val());
      }
    });
    var car_name_text = car_name.join(".");
    console.log(car_name_text);
    var formData = new FormData(this);
    formData.append('showroom_add', 1);
    formData.append('img', 'branch_img');
    formData.append('car_name_txt', car_name_text);
    formData.append('salesman_txt', salesman_txt);
    formData.append('mechanic_txt', mechanic_txt);
    formData.append('qty_txt', car_qty_cnt);
    submitForm(formData, '#add_showroom_form', "Showroom Added", 'showroom.php');
  });

  //Update showroom
  $("#update_showroom_form").on('submit', function (e) {
    e.preventDefault();
    $(document).scrollTop(0);
    salesman_txt = salesman_id_arr.join(",");
    mechanic_txt = mechanic_id_arr.join(",");
    var instock_car_names = [];
    var instock__car__qty = [];
    var car_qty = [];
    var car_qty_txt = "";
    $(".instock_car_name").each(function (e) {
      instock_car_names.push($(this).val());
    });
    $(".instock__car__qty").each(function (e) {
      instock__car__qty.push($(this).val());
    });
    $(".carqty").each(function (index, elemt) {
      if ($(this).val() !== "") {
        car_qty.push($(elemt).val());
      }
      car_qty_txt = car_qty.join(".");
    });
    var formData = new FormData(this);
    formData.append('showroom_update', 1);
    formData.append('img', 'new_branch_img');
    formData.append('instock_car_names', instock_car_names);
    formData.append('instock__car__qty', instock__car__qty);
    formData.append('salesman_txt', salesman_txt);
    formData.append('mechanic_txt', mechanic_txt);
    formData.append('qty_txt', car_qty_txt);
    submitForm(formData, '#update_showroom_form', "Showroom Updated", 'showroom.php');
  });
  function removeImg(e) {
    e.preventDefault();
    var img_id = $(e.currentTarget).attr('data-img-id');
    var img_name = $(e.currentTarget).attr('data-img-name');
    var img_field = $(e.currentTarget).attr('data-img-field');
    console.log(img_id, img_name, img_field);
    $.ajax({
      url:"../php_files/admin-actions.php",
      method:"POST",
      data:{'remove_img':1, 'img_id':img_id, 'img_name':img_name,'img_field':img_field},
      dataType:'json',
      success:function(res){
        console.log(res.success);
        if(res.success==1){
          $(e.currentTarget).parent().remove();
          if($(e.currentTarget).parent().parent().parent().children().eq(1).children().length==0){
            $(e.currentTarget).parent().parent().parent().children().eq(1).append("<span class='badge bg-danger'>No image found</span>");
          }
          console.log($(e.currentTarget).parent().parent().parent());
        }else{
          console.log("Something went wrong");
        }
      }
    });
  }
  // Remove disp Img
  $(".remove__img").on('click', function (e) {
    removeImg(e);
  });
  //Update car
  $("#update_specs_form").on('submit', function (e) {
    e.preventDefault();

    $(document).scrollTop(0);
    var ext_value = [];
    var int_value = [];
    var safety_value = [];
    var audio_mult_value = [];
    $(".exterrior_d").each(function (index, element) {
      if($(element).val()!=""){
        ext_value.push($(element).val());
      }
    });
    $(".interrior_d").each(function (index, ele) {
      if($(ele).val()!=""){
      int_value.push($(ele).val());
      }
    });
    $(".safety").each(function (index, elem) {
      if($(elem).val()!=""){
      safety_value.push($(elem).val());
      }
    });
    $(".audio_mult").each(function (index, el) {
      if($(el).val()!=""){
      audio_mult_value.push($(el).val());
      }
    });
    var extText = ext_value.join(".");
    var intText = int_value.join(".");
    var safetyText = safety_value.join(".");
    var amText = audio_mult_value.join(".");
   
    // getting the new images
    var display_images = $('.display input[type="file"]').map(function () {
      return $(this).attr('name');
    }).get();
    var exterrior_images = $('.exterrior input[type="file"]').map(function () {
      return $(this).attr('name');
    }).get();
    var interrior_images = $('.interrior input[type="file"]').map(function () {
      return $(this).attr('name');
    }).get();
    //Getting the old images 
    var old_exterrior_images = $('.exterrior .car-group img').map(function () {
      return $(this).attr('data-src');
    }).get();
    var old_interrior_images = $('.interrior .car-group img').map(function () {
      return $(this).attr('data-src');
    }).get();
    var old_display_images = $('.display .car-group img').map(function () {
      return $(this).attr('data-src');
    }).get();
    var old_display_images = old_display_images.join(",");
    var old_exterrior_images = old_exterrior_images.join(",");
    var old_interrior_images = old_interrior_images.join(",");
    var formData = new FormData(this);
    formData.append('ext_data', extText);
    formData.append('int_data', intText);
    formData.append('safety_data', safetyText);
    formData.append('am_data', amText);
    formData.append('disp_img_name_fields', display_images);
    formData.append('ext_img_name_fields', exterrior_images);
    formData.append('int_img_name_fields', interrior_images);
    formData.append('old_display_images', old_display_images);
    formData.append('old_exterrior_images', old_exterrior_images);
    formData.append('old_interrior_images', old_interrior_images);
    formData.append('car_img', "car_img");
    // formData.append('car_old_img','car_old_img');
    formData.append('updateCar', 1);
    submitForm(formData, ".warning-box", "Car updated", "models.php");
  });

  //News status update
  $(".news__check").on('change',function(e){
    var status;
    var news_id=$(this).attr("data-news-id");
    if($(this).prop("checked")){
      status='1';
     }else if(!$(this).prop("checked")){
       status='0';
     }
     $.ajax({
      url:"../php_files/admin-actions.php",
      method:'post',
      data:{'news_status_update':1, 'news_id':news_id,'status':status},
      success:function(res){
        console.log(res);
      }
     });
  });

  //Admin status update
  $(".admin__check").on('change',function(e){
    var status;
    var admin_id=$(this).attr("data-admin-id");
    if($(this).prop("checked")){
      status='1';
     }else if(!$(this).prop("checked")){
       status='0';
     }
     $.ajax({
      url:"../php_files/admin-actions.php",
      method:'post',
      data:{'admin_status_update':1, 'admin_id':admin_id,'status':status},
      success:function(res){
        console.log(res);
      }
     });
  });


  //Add Post
  $("#add-post-form").on('submit',function(e){
    e.preventDefault();
    var formData=new FormData(this);
    formData.append('add_post',1);
    formData.append('img','post_img');
    submitForm(formData,"#add-post-form","Post Added","news.php");
  });

  //Update post
  $("#edit-post-form").on('submit',function(e){
    e.preventDefault();
    var formData=new FormData(this);
    formData.append('edit_post',1);
    formData.append('img','new_post_img');
    submitForm(formData,"#edit-post-form","Post Updated","news.php");
  });

  //Delete post
  $(document).on("click", ".delete_post", function(e){
    var pid = $(this).attr("data-post-id");
    var aid=$(this).attr("data-auth-id");
    $.ajax({
        url: '../php_files/admin-actions.php',
        method: 'post',
        data: { 'del_post': 1, 'pid': pid },
        success: function (res) {
            if(parseInt(res)){
              location.reload();
            }
        }
    });
});

//Accept test drive
$(document).on("click",".test_drive_accept",function(e){
  var td_id=$(this).attr('data-td-id');
  var user_id=$(this).attr('data-user-id');
  $.ajax({
    url: '../php_files/admin-actions.php',
    method: 'post',
    data: { 'accept_test_drive': 1, 'uid': user_id , 'tid': td_id},
    success: function (res) {
        if(parseInt(res)){
          location.reload();
        }
    }
});
});

///Add admin
$("#add_admin_form").on('submit',function(e){
  e.preventDefault();
    var formData=new FormData(this);
    formData.append('add_admin',1);
    submitForm(formData,"#add_admin_form","Admin added","admin.php");

});

//Update admin
$("#update_admin_form").on('submit',function(e){
  e.preventDefault();
    var formData=new FormData(this);
    formData.append('update_admin',1);
    submitForm(formData,"#update_admin_form","Admin updated","admin.php");

});

})