<?php
include '../Database/config.inc.php';
// session_start();
date_default_timezone_set('Asia/Dhaka');

//Load image
function fetch_image($image_arr, $field_name)
{
    $images = array(
        'file_name' => [],
        'file_tmp_name' => []
    );
    $array = explode(",", $image_arr);
    foreach ($array as $ar) {
        $file_name = $_FILES[$ar]['name'];
        $file_tmp_name = $_FILES[$ar]['tmp_name'];
        $file_extension = explode(".", $file_name);
        $file_extension = end($file_extension);
        $extensions = array("png", "jpg", "jpeg");
        if (!empty($file_name)) {
            if (in_array($file_extension, $extensions)) {
                $file_name = $_FILES[$ar]['name'];
                array_push($images['file_name'], $file_name);
                array_push($images['file_tmp_name'], $file_tmp_name);
            } else {
                echo json_encode(array('error' => $field_name . " image not valid"));
                exit;
            }
        }
    }
    return $images;
}
///User Login
if (isset($_POST['user_login'])) {
    $user_email = $DB->escapeString($_POST['email']);
    $user_password = $DB->escapeString($_POST['password']);
    if (preg_match_all("/[^a-z0-9-@.]/i", $user_email) || empty($user_email)) {
        echo json_encode(array('error' => "Invalid E-mail"));
        exit;
    } else if (empty($user_password)) {
        echo json_encode(array('error' => "Password can't be empty"));
        exit;
    } else {
        $DB->select("users", "*", null, "email='$user_email' AND password='$user_password'");
        $user_details = $DB->getResult();
        if (count($user_details) != 1) {
            echo json_encode(array('error' => "Invalid E-mail or Password"));
            exit;
        } else {
            foreach ($user_details as $user) {
                $_SESSION['logged_user_id'] = $user['id'];
                $_SESSION['logged_user_email'] = $user['email'];
                $_SESSION['logged_user_name'] = $user['first_name'];
                echo json_encode(array('success' => 1));
                exit;
            }
        }
    }
}

//User registration
if(isset($_POST['user_reg'])){
    $fname = $DB->escapeString($_POST['fname']);
    $lname = $DB->escapeString($_POST['lname']);
    $remail = $DB->escapeString($_POST['remail']);
    $rpassword = $DB->escapeString($_POST['rpassword']);
    if(empty($fname) ||preg_match("/[^a-z ]/i", $fname)){
        echo json_encode(array('error'=>"First name invalid."));
        exit;
    }else if(empty($lname) ||preg_match("/[^a-z ]/i", $lname)){
        echo json_encode(array('error'=>"First name invalid."));
        exit;
    }else if (empty($remail) || preg_match_all("/[^a-z0-9-@.]/i", $remail) || empty($remail)) {
        echo json_encode(array('error' => "Invalid E-mail"));
        exit;
    }else if(empty($rpassword)){
        echo json_encode(array('error' => "Password left empty."));
        exit;
    }else if(!isset($_POST['city'])){
        echo json_encode(array('error' => "City left empty."));
        exit;
    }else{
        $DB->select("users","email",null,"email='$remail'");
        $ex_mail=$DB->getResult();
        if(count($ex_mail) >= 1){
            echo json_encode(array('error' => "E-mail exists"));
            exit;
        }else{
            $reg_params=[
                'first_name'=>$fname,
                'last_name'=>$lname,
                'email'=>$remail,
                'password'=>$rpassword,
                'city'=>$_POST['city'],
                'car_viewed'=>"0",
                'drive_requests'=>0,
                'viewed_cars'=>""
            ];
            $DB->insert("users",$reg_params);
            $DB->select("users", "*", null, "email='$remail' AND password='$rpassword'");
                $user_details = $DB->getResult();
                    foreach ($user_details as $user) {
                        $_SESSION['logged_user_id'] = $user['id'];
                        $_SESSION['logged_user_name'] = $user['first_name'];
                        echo json_encode(array('success' => 1));
                        exit;
                    }
                
        }

    }

}

//User logout
if (isset($_POST['logout'])) {
    session_start();
    session_unset();
    session_destroy();
    echo 1;
    exit;
}
//Load Models
if (isset($_POST['loadModel'])) {
    $mod_id = $_POST['mod_id'];
    $DB->select('sub_model', "*", "image_tbl on sub_model.sub_model_id=image_tbl.sub_model_car_id", "model_id=$mod_id");
    $all_models = $DB->getResult();
    $output = "";
    if (count($all_models) != 0) {
        foreach ($all_models as $model) {
            $output .= '
            <div class="cars">
            <div class="car_img">
                <img src="images/' . $model['car_img'] . '" alt="">
            </div>
            <div class="car_details">
                <table>
                    <tr>
                        <td>Name : </td>
                        <td><span class="badge bg-success text-capitalize">' . $model['sub_model_name'] . '</span></td>
                    </tr>
                    <tr>
                        <td>Gear Type : </td>
                        <td><span class="badge bg-success text-capitalize">' . $model['gear_type'] . '</span></td>
                    </tr>
                    <tr>
                            <td>Engine : </td>
                            <td><span class="badge bg-success text-capitalize">' . $model['engine'] . '</span></td>
                        </tr>
                    <tr>
                        <td>Milege : </td>
                        <td><span class="badge bg-success">' . $model['milege'] . ' KM</span></td>
                    </tr>
                    <tr>
                        <td>Price : </td>
                        <td><span class="badge bg-success">' . $model['price'] . '</span></td>
                    </tr>
                    <tr class="text-center">
                            <td><a href="single-car.php?mid=' . $model['sub_model_id'] . '" data-view-cid=' . $model['sub_model_id'] . ' class="view__btn btn-sm btn btn-primary">View?</a></td>
                        </tr>
                </table>
            </div>
        </div>
            ';
        }
    } else {
        $output .= '<div class="text-center"><h5>No car found</h5> <img src="images/view.gif"/></div>';
    }
    echo $output;
}

//Load serach models
if (isset($_POST['loadFilteredModel'])) {
    $search_type = strtoupper($_POST['search_type']);
    $DB->sql("SELECT * from sub_model JOIN image_tbl ON sub_model.sub_model_id=image_tbl.sub_model_car_id ORDER BY sub_model.price $search_type");
    $all_models = $DB->getResult();

    $output = "";
    if (count($all_models) != 0) {
        foreach ($all_models as $models) {
            foreach ($models as $model) {
                $output .= '
            <div class="car-list mb-5">
            <div class="car-image">
                <img src="images/' . $model['car_img'] . '" alt="">
            </div>
            <div class="car-details">
                <h2 class="text-uppercase">' . $model['sub_model_name'] . '</h2>
                <hr>
                <table>
                    <tr>
                        <td><i class="fa fa-cog" aria-hidden="true"></i></td>
                        <td>' . $model['engine'] . '</td>
                    </tr>
                    <td>
                        <i class="fa fa-money" aria-hidden="true"></i></td>
                        <td><span class="badge bg-success">' . $model['price'] . '</span></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-calendar" aria-hidden="true"></i></td>
                        <td>' . $model['mfg_date'] . '</td>
                    </tr>
                    <tr>
                    <td><i class="fa fa-cog" aria-hidden="true"></i></td>
                        <td>' . $model['gear_type'] . '</td>
                    </tr>
                    <td>
                        <i class="fa fa-car" aria-hidden="true"></i></td>
                        <td>' . $model['milege'] . 'kmpl</td>
                    </tr>
                    <td>
                        <i class="fa fa-money" aria-hidden="true"></i></td>
                        <td><span class="badge bg-success">EMI available</span></td>
                    </tr>
                    <tr>
                        <td colspan="2"><a href="single-car.php?mid=' . $model['sub_model_id'] . '" data-view-cid=' . $model['sub_model_id'] . ' class="view__btn btn btn-primary btn-sm">View?</a>  <a class="btn btn-primary btn-sm apply__btn" href="javascript:void(0)" data-cid="' . $model['sub_model_id'] . '" data-cname="' . $model['sub_model_name'] . '" class="ms-4 btn btn-info btn-sm">Apply?</a></td>
                    </tr>
                </table>
            </div>
        </div>
            ';
            }
        }
    }
    echo $output;
}

//Test drive form submit
if (isset($_POST['req_test_drive'])) {
    $userid = $_SESSION['logged_user_id'];
    $cid = $_POST['carid'];
    $td_name = $DB->escapeString($_POST['td_name']);
    $td_email = $DB->escapeString($_POST['td_email']);
    $td_address = $DB->escapeString($_POST['td_address']);
    $td_phone = $DB->escapeString($_POST['td_phone']);
    $phone = "01" . $td_phone;
    $td_schedule = str_replace('T', ' ', $_POST['td_schedule']);
    if (empty($td_name) || preg_match_all("/[^a-z ]/i", $td_name)) {
        echo json_encode(array('error' => 'Invalid name'));
        exit;
    } else if (empty($td_email) || preg_match_all("/[^a-z0-9-@.]/i", $td_email)) {
        echo json_encode(array('error' => 'Invalid email'));
        exit;
    } else if (empty($td_address) || preg_match_all("/[^a-z0-9-, ]/i", $td_address)) {
        echo json_encode(array('error' => 'Invalid Address'));
        exit;
    } else if (empty($td_phone) || $phone[2] == 1 || $phone[2] == 0 || $phone[2] == 2 || strlen($phone) != 11 | preg_match_all('/[^0-9]/', $phone)) {
        echo json_encode(array('error' => "Invalid contact or should be 11 digits."));
        exit;
    } else if (empty($_POST['td_schedule'])) {
        echo json_encode(array('error' => "Schedule Required."));
        exit;
    } else {
        
        $DB->select('test_drive',"user_phone",null,"user_phone='$phone' and visibility=1");
        if(count($DB->getResult()) >= 1){
            echo json_encode(array('error'=>'phone exists.'));
            exit;
        }else{
            $ts = explode(" ", $td_schedule);
            $current_date = date("Y-m-d");
            if ($ts[0] <= $current_date) {
                echo json_encode(array('error' => "Enter a valid date"));
                exit;
            } else {
                $DB->select('test_drive', "drive_schedule", null,"visibility=1");
                $existing_schedule = $DB->getResult();
                foreach ($existing_schedule as $existing) {
                    foreach ($existing as $exist) {
                        $existing_arr = explode(" ", $exist);
                        if ($existing_arr[0] == $ts[0]) {
                            echo json_encode(array('error' => "Schedule is not available."));
                            exit;
                        }
                    }
                }
                $params = [
                    'user_name' => $td_name,
                    'user_email' => $td_email,
                    'user_address' => $td_address,
                    'user_phone' => $phone,
                    'car_id' => $cid,
                    'requested_user' => $userid,
                    'drive_schedule' => $td_schedule
                ];
                $DB->insert('test_drive', $params);
                if ($DB->getResult()) {
                    $DB->sql("UPDATE sub_model SET drive_req=drive_req+1 where sub_model_id=$cid");
                    if ($DB->getResult()) {
                        echo json_encode(array('success' => 1));
                        exit;
                    }
                }
            }
        } 
    }
}

//Increment view
if (isset($_POST['viewInc'])) {
    $id = $_POST['view_id'];
    if(isset($_SESSION['logged_user_id'])){
        $user_id=$_SESSION['logged_user_id'];
        $view_arr=[];
        $DB->select("users","viewed_cars",null,"id=$user_id");
        $viewed_cars=$DB->getResult();
        if(!empty($viewed_cars[0]['viewed_cars'])){
            $viewed_car=explode(",", $viewed_cars[0]['viewed_cars']);
            $new_viewed_car_arr=array_merge($viewed_car,$_POST['newly_viewed']);
            $new_viewed_car_arr=array_unique($new_viewed_car_arr);
            $new_viewed_car_txt=implode(",", $new_viewed_car_arr);
            $DB->sql("UPDATE users SET viewed_cars='$new_viewed_car_txt' where id=$user_id");
        }else{
            $new_viewed_car_txt=implode(",", $_POST['newly_viewed']);
            $DB->sql("UPDATE users SET viewed_cars='$new_viewed_car_txt' where id=$user_id");
        }
    }
    $DB->sql("UPDATE sub_model SET total_view=total_view+1 where sub_model_id=$id");
    if ($DB->getResult()) {
        echo 1;
    }
}

//News view increment
if(isset($_POST['NewsViewInc'])){
    $nid=$_POST['n_id'];
    $DB->sql("UPDATE news SET total_views=total_views+1 where id=$nid");
    if ($DB->getResult()) {
        return true;
    }
}

//Check test drive 
if(isset($_POST['check_test_drive'])){
    $id=$_POST['user_id'];
    $DB->select("test_drive","*",null,"requested_user=$id AND req_status=0");
    $drive_req=$DB->getResult();
    if(count($drive_req)==0){
        echo "0";
    }else{
        echo "1";
    }
}

//Load like and dislikes
if(isset($_POST['load_comments'])){
    $pid=$_POST['pid'];
    $DB->sql("SELECT comments_tbl.*, news.id,users.user_img,users.first_name,users.last_name from comments_tbl JOIN news ON news.id=comments_tbl.post_id JOIN users on users.id=comments_tbl.user_id WHERE news.id=$pid ORDER BY comments_tbl.comment_id DESC");
    $all_comments=$DB->getResult();
    $output="";
    foreach($all_comments as $comments){
        foreach($comments as $comment){
            include '../cmntn.php';
        }
    }
    echo $output;
}

//comment
if(isset($_POST['cmnt'])){
    $comment=$DB->escapeString($_POST['comment_txt']);
    $post_id=$_POST['post_id'];
    $user_id=$_SESSION['logged_user_id'];
    $params=[
        'post_id'=>$post_id,
        'user_id'=>$user_id,
        'user_comment'=>$comment,
        'comment_like'=>0,
        'comment_dislike'=>0,
        'comment_date'=>date("Y-m-d")
    ];
    $DB->insert("comments_tbl",$params);
    $DB->sql("SELECT * from comments_tbl JOIN news ON news.id=comments_tbl.post_id JOIN users on users.id=comments_tbl.user_id WHERE news.id=$post_id ORDER BY comments_tbl.comment_id DESC");
    $all_comments=$DB->getResult()[1];
    $output="";
    foreach($all_comments as $comment){
        include '../cmntn.php';
    }
    echo $output;
}
//Like comment
if(isset($_POST['cmnt_like'])){
    $arr=array();
    $inc_type=$_POST['inc_type'];
    $cmnt_id=$_POST['cmnt_id'];
    if($inc_type=='like'){
        $DB->sql("UPDATE comments_tbl set comment_like=comment_like+1 where comment_id=$cmnt_id");
    }else{
        $DB->sql("UPDATE comments_tbl set comment_dislike=comment_dislike+1 where comment_id=$cmnt_id");
    }
    $DB->select("comments_tbl",'comment_like,comment_dislike',null,"comment_id=$cmnt_id");
    $ld=$DB->getResult();
    $like=$ld[0]['comment_like'];
    $dislike=$ld[0]['comment_dislike'];
    array_push($arr, $like);
    array_push($arr, $dislike);
    echo json_encode(array('arr'=>$arr));
}

//Delete comments
if(isset($_POST['delete_comments'])){
    // $uid=$_POST['uid'];
    $cmnt_id=$_POST['cmnt_id'];
    $pid=$_POST['pid'];
    $DB->delete("comments_tbl", "comment_id=$cmnt_id");
    $DB->sql("SELECT * from comments_tbl JOIN news ON news.id=comments_tbl.post_id JOIN users on users.id=comments_tbl.user_id WHERE news.id=$pid ORDER BY comments_tbl.comment_id DESC");
    $all_comments=$DB->getResult()[1];
    $output="";
    foreach($all_comments as $comment){
        include '../cmntn.php';
    }
    echo $output;
}


//Remove viewed car
if(isset($_POST['remove_viewed_car'])){
    $cid=$_POST['cid'];
    $user_id=$_SESSION['logged_user_id'];
    $DB->select("users","viewed_cars",null,"id=$user_id");
    $exist_images=$DB->getResult();
    foreach($exist_images as $exist_img){
        $images_array = explode(",", $exist_img['viewed_cars']);
        unset($images_array[array_search($cid, $images_array)]);
        $updated_img = implode(",", $images_array);
        $DB->update("users", ["viewed_cars" => $updated_img], "id=$user_id");
        if ($DB->getResult()) {
            $output="";
           if(empty($images_array)){
            $output.="<span class='badge bg-danger'>No cars viewed.</span>";
           }else{
            $DB->sql("SELECT * from image_tbl WHERE sub_model_car_id in($updated_img)");
            $viewed_cars = $DB->getResult();
            foreach ($viewed_cars as $car_info) {
                foreach ($car_info as $car) {
                    $output.='<div class="viewed__cars">
                    <div class="v_car" style="width:200px; height:80px">
                        <img class="w-100" style="height:100%;object-fit:cover" src="images/car_img/'.$car["car_img"].'" alt="">
                    </div>
                    <button data-remove-car-id="'.$car['sub_model_car_id'].'" class="btn btn-sm btn-danger mt-2 remove_viewed_car"><i class="fa fa-trash"></i></button>
                </div>';
                }
            }
           }
           echo $output;
        }
    }
}

//Remove test drive 
if(isset($_POST['remove_test_drive'])){
    $t_id=$_POST['t_id'];
    // $DB->select("test_drive","req_status",null,"id=$t_id");
    // $req_status=$DB->getResult();
    // if($req_status[0]['req_status']){
        $DB->sql("UPDATE test_drive SET visibility=0 where id=$t_id");
    // }
    // else{
    //     $DB->sql("DELETE from test_drive where id=$t_id");
    // }
    echo 1;
    exit;
}
//Update profile
if(isset($_POST['update_profile'])){
    $user_id=$_SESSION['logged_user_id'];
    $fname=$DB->escapeString($_POST['f_name']);
    $lname=$DB->escapeString($_POST['l_name']);
    $email=$DB->escapeString($_POST['email']);
    $password=$DB->escapeString($_POST['password']);
    $city=$_POST['city'];
    if (empty($fname) || preg_match_all("/[^a-z ]/i", $fname)) {
        echo json_encode(array('error' => 'Invalid first name'));
        exit;
    }else if(empty($lname) || preg_match_all("/[^a-z ]/i", $lname)){
        echo json_encode(array('error' => 'Invalid last name'));
        exit;
    }else if (empty($email) || preg_match_all("/[^a-z0-9-@.]/i", $email)) {
        echo json_encode(array('error' => 'Invalid email'));
        exit;
    } else {
        $imgs=fetch_image($_POST['img'],"User image");
        if(count($imgs['file_name'])==0){
            $file_name=$_POST['old_user_img'];
        }else{
            if(file_exists("../images/users_img/". $_FILES['new_user_img']['name'] ."")){
                echo json_encode(array('error' => "User image exists."));
                exit;
            }else{
                $file_name=$imgs['file_name'][0];
                $file_tmp=$imgs['file_tmp_name'][0];
                if(!empty($_POST['old_user_img'])){
                    unlink("../images/users_img/".$_POST['old_user_img']."");
                }
                move_uploaded_file($file_tmp, "../images/users_img/" . $file_name);                
            }
        }
        $user_params=[
            'first_name'=>$fname,
            'last_name'=>$lname,
            'email'=>$email,
            'password'=>$password,
            'city'=>$city,
            'user_img'=>$file_name,
        ];
        $DB->update("users",$user_params,"id=$user_id");

        echo json_encode(array('success'=>1));
    }
}

///Submit contact form
if(isset($_POST['contact_form_submit'])){
    $name=$DB->escapeString($_POST['contact_name']);
    $email=$DB->escapeString($_POST['contact_email']);
    $msg=$DB->escapeString($_POST['contact_msg']);
    if(empty($name) || preg_match("/[^a-z ]/i", $name)){
        echo json_encode(array('error' => 'Name empty or found special character'));
        exit;
    }else if(empty($email) || preg_match("/[^a-z0-9-@.]/i", $email)){
        echo json_encode(array('error' => 'Invalid email'));
        exit;
    }else if(empty($msg) || preg_match("/[^a-z ]/i", $msg)){
        echo json_encode(array('error' => 'Message empty or found special character'));
        exit;
    }else{
        $DB->insert("contact_tbl",['contact_name'=>$name, 'contact_email'=>$email, 'msg'=>$msg]);
        echo json_encode(array('success'=>1));
        exit;
    }
    
}
?>