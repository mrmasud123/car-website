<?php
include '../Database/config.inc.php';
// session_start();
// Admin Login
if (isset($_POST['adminLogin'])) {

    $login_email = $DB->escapeString($_POST['email']);
    $login_password = $DB->escapeString($_POST['password']);
    if (empty($login_email) || empty($login_password)) {
        echo json_encode(array('error' => 'E-mail or Password Can\'t be null'));
        exit;
    } else {
        $DB->select("admin_tbl", "*", null, "admin_email='$login_email' AND admin_password='$login_password'");
        $admin_data = $DB->getResult();
        if ($admin_data) {
            if($admin_data[0]['account_status']){
                $_SESSION['logged_admin_name'] = $admin_data[0]['admin_name'];
                $_SESSION['logged_admin_id'] = $admin_data[0]['id'];
                echo json_encode(array('success' => 1));
                exit;
            }else{
                echo json_encode(array('error' => 'Account is in hold.'));
            exit;
            }
        } else {
            echo json_encode(array('error' => 'Invalid E-mail or Password'));
            exit;
        }
    }
}

//Admin Logout
if (isset($_POST['logout'])) {
    session_start();
    session_unset();
    session_destroy();
    echo 1;
    exit;
}

//number check
function check_number($string)
{
    $pat = "/[0-9]/";
    $valid_string = preg_match_all($pat, $string);
    return $valid_string;
}

//String check
function check_string($string)
{
    // $pat = "/[()@#$~!<>()?,|{.}]/i";
    $pat = "/[^a-z .]/i";
    $valid_input = preg_match_all($pat, $string, $arr);
    return $valid_input;
}

//check alphanum
function check_alpha_num($string)
{
    $pat = "/[^a-z 0-9._-]/i";
    $valid_input = preg_match_all($pat, $string, $arr);
    return $valid_input;
}

//check email
function check_email($string)
{
    // $pat = "/[^a-z|@|.com]/i";
    $pat = "/[^a-z0-9@.]/i";
    $valid_input = preg_match_all($pat, $string, $arr);
    return $valid_input;
}

//Image processing
function masud($image_arr, $field_name)
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

//Add employee
if (isset($_POST['addEmployee'])) {
    $emp_name = $DB->escapeString($_POST['emp_name']);
    $emp_email = $DB->escapeString($_POST['emp_email']);
    $emp_joindate = $DB->escapeString($_POST['emp_joindate']);
    if (empty($emp_name) || preg_match_all("/[^a-z ]/", $emp_name)) {
        echo json_encode(array('error' => "Name Empty or contain special characters"));
        exit;
    } else {
        if (!empty($_POST['emp_contact'])) {
            $emp_phone = "01" . $DB->escapeString($_POST['emp_contact']);
            if ($emp_phone[2] == 1 || $emp_phone[2] == 0 || $emp_phone[2] == 2) {
                echo json_encode(array('error' => "Invalid contact"));
                exit;
            } else {
                if (strlen($emp_phone) != 11) {
                    echo json_encode(array('error' => "Contact should be 11 of digits"));
                    exit;
                } else if (check_number($emp_phone) != strlen($emp_phone)) {
                    echo json_encode(array('error' => "Invalid employee contact"));
                    exit;
                } else if (!isset($_POST['emp_designation']) || !isset($_POST['emp_salary'])) {
                    echo json_encode(array('error' => "Choose designation and salary status"));
                    exit;
                } else if (empty($_POST['emp_joindate'])) {
                    echo json_encode(array('error' => "Choose Join date"));
                    exit;
                } else {
                    $DB->select("employee", "*", null, "email='$emp_email' OR phone='$emp_phone'");
                    $emp_data = $DB->getResult();
                    if (count($emp_data) >= 1) {
                        if ($emp_data[0]['email'] == $emp_email) {
                            echo json_encode(array('error' => "E-mail  exists"));
                            exit;
                        } else {
                            echo json_encode(array('error' => "Phone exists"));
                            exit;
                        }
                    } else {
                        if (!empty($_FILES['emp_img']['name'])) {
                            $file_name = $_FILES['emp_img']['name'];
                            $file_tmp = $_FILES['emp_img']['tmp_name'];
                            $ext = explode('.', $file_name);
                            $file_ext = end($ext);
                            $extensions = ['png', 'jpg', 'jpeg'];
                            if (!in_array($file_ext, $extensions)) {
                                echo json_encode(array('error' => 'Invalid Image Type'));
                                exit;
                            } else {
                                $file_name = $_FILES['emp_img']['name'];
                                $emp_salary = $_POST['emp_salary'];
                                if (isset($_POST['emp_branch'])) {
                                    $emp_branch = $_POST['emp_branch'];
                                } else {
                                    $emp_branch = "";
                                }
                                $params = [
                                    'name' => $emp_name,
                                    'email' => $emp_email,
                                    'phone' => $emp_phone,
                                    'branch' => $emp_branch,
                                    'designation' => $_POST['emp_designation'],
                                    'salary_status' => $emp_salary,
                                    'join_date' => $emp_joindate,
                                    'img' => $file_name
                                ];
                                $DB->insert('employee', $params);
                                if ($DB->getResult()) {
                                    move_uploaded_file($file_tmp, "../images/employee_img/" . $file_name);
                                    echo json_encode(array('success' => 1));
                                    exit;
                                } else {
                                    echo json_encode(array('error' => "Something went wrong"));
                                    exit;
                                }
                            }
                        } else {
                            echo json_encode(array('error' => "Please upload an image"));
                            exit;
                        }
                    }
                }
            }
        } else {
            echo json_encode(array('error' => "Contact left blank"));
            exit;
        }
    }

}

//Update employee
if(isset($_POST['updateEmployee'])){
    $employee_id=$_POST['e_id'];
    $emp_name=$DB->escapeString($_POST['emp_name']);
    $emp_email=$DB->escapeString($_POST['emp_email']);
    $emp_contact=$DB->escapeString($_POST['emp_contact']);
    if(empty($emp_name) || preg_match_all("/[^a-z ]/i", $emp_name)){
        echo json_encode(array('error'=>"Name empty or contains special characters."));
        exit;
    }else if(empty($emp_email) || preg_match_all("/[^a-z0-9-@.]/i", $emp_email)){
        echo json_encode(array('error'=>"Email empty or contains special characters."));
        exit;
    }else if(empty($emp_contact) || preg_match_all("/[^0-9]/i" , $emp_contact)){    
        echo json_encode(array('error'=>"Contact empty or contains special characters."));
        exit;
    }else{

        if($emp_contact[2] == 1 || $emp_contact[2] == 0 || $emp_contact[2] == 2 || strlen($emp_contact) != 11){
            echo json_encode(array('error' => "Invalid contact or should be 11 digits."));
            exit;
        }else{
            $DB->select('employee',"count(phone) as res",null,"phone=$emp_contact and id != $employee_id");
            $e_dta=$DB->getResult();
            if($e_dta[0]['res'] >= 1){
                echo json_encode(array('error'=>"Employee contact exists."));
                exit;
            }else{
                $DB->select('employee',"count(email) as res",null, "email='$emp_email' and id != $employee_id");
                $existing_email=$DB->getResult();
                if($existing_email[0]['res'] >= 1){
                    echo json_encode(array('error'=>"Employee e-mail exists."));
                    exit;
                }else{
                    if(empty($_FILES['new_emp_img']['name'])){
                        $file_name=$_POST['old_emp_img'];
                    }else{
                        $emp_img=masud($_POST['img'], 'Employee image');
                        $file_name=$emp_img['file_name'][0];
                        $file_tmp=$emp_img['file_tmp_name'][0];    
                    }
                                        
                    $emp_params=[
                        'name'=>$emp_name,
                        'email'=>$emp_email,
                        'phone'=>$emp_contact,
                        'salary_status'=>$_POST['emp_salary'],
                        'join_date'=>$_POST['emp_join_date'],
                        'img'=>$file_name,
                    ];
                    $DB->update('employee',$emp_params,"id=$employee_id");

                    if (!empty($_FILES['new_emp_img']['name'])) {
                        if(file_exists("../images/employee_img/". $_FILES['new_emp_img']['name'] ."")){
                            echo json_encode(array('error'=>"Image exists."));
                            exit;
                        }else{
                            if(unlink("../images/employee_img/".$_POST['old_emp_img']."")){
                                if (move_uploaded_file($file_tmp, "../images/employee_img/" . $file_name)) {
                                    echo json_encode(array('success' => 1));
                                    exit;
                                }
                            }
                        }
                    }else{
                        echo json_encode(array('success'=>1));
                        exit;
                    }

                }
            }

        }
    }
}
//Add Car  
if (isset($_POST['addCar'])) {
    $disp_images = masud($_POST['disp_img_name_fields'], 'Display');
    $ext_images = masud($_POST['ext_img_name_fields'], 'Exterrior');
    $int_images = masud($_POST['int_img_name_fields'], 'Interrior');
    $car_img = masud($_POST['car_img'], 'Car Image');

    $car_name = $DB->escapeString($_POST['car_name']);
    $car_price = $DB->escapeString($_POST['car_price']);
    $t_1 = $DB->escapeString($_POST['t_1']);
    $d_1 = $DB->escapeString($_POST['d_1']);
    $t_2 = $DB->escapeString($_POST['t_2']);
    $d_2 = $DB->escapeString($_POST['d_2']);
    $t_3 = $DB->escapeString($_POST['t_3']);
    $d_3 = $DB->escapeString($_POST['d_3']);
    $t_4 = $DB->escapeString($_POST['t_4']);
    $d_4 = $DB->escapeString($_POST['d_4']);
    $t_5 = $DB->escapeString($_POST['t_5']);
    $d_5 = $DB->escapeString($_POST['d_5']);
    $t_6 = $DB->escapeString($_POST['t_6']);
    $d_6 = $DB->escapeString($_POST['d_6']);

    $car_desc = $DB->escapeString($_POST['car_desc']);
    $max_power = $DB->escapeString($_POST['max_power']);
    $max_torque = $DB->escapeString($_POST['max_torque']);
    $turning_radius = $DB->escapeString($_POST['turning_radius']);
    $cylinder_qty = $_POST['cylinder_qty'];
    $drive_type = $DB->escapeString($_POST['drive_type']);
    $turbo_charger = $DB->escapeString($_POST['turbo_charger']);
    $top_speed = $DB->escapeString($_POST['top_speed']);
    $gear = $DB->escapeString($_POST['gear']);
    $horse_power = $DB->escapeString($_POST['horse_power']);
    $tp_time = $DB->escapeString($_POST['tp_time']);
    $engine=$DB->escapeString($_POST['engine']);
    $milege=$DB->escapeString($_POST['milege']);
    $gear_type=$DB->escapeString($_POST['gear_type']);

    $ext_data = $DB->escapeString($_POST['ext_data']);
    $int_data = $DB->escapeString($_POST['int_data']);
    $safety_data = $DB->escapeString($_POST['safety_data']);
    $am_data = $DB->escapeString($_POST['am_data']);
    $tire = $DB->escapeString($_POST['tire']);
    $fuel = $DB->escapeString($_POST['fuel']);
    // $car_id = $_POST['car_type'];
    $car_qty = $_POST['car_qty'];
    $car_mfg_date = $_POST['mfg_date'];
    $car_name = $DB->escapeString($_POST['car_name']);
    if (!isset($_POST['car_type'])) {
        echo json_encode(array('error' => 'Choose car type'));
        exit;
    } else if (empty($car_name) || check_alpha_num($car_name)) {
        echo json_encode(array('error' => "Car name empty or contains special characters!"));
        exit;
    } else if (empty($_POST['car_price']) || $_POST['car_price'] <= 0) {
        echo json_encode(array('error' => "Invalid car price."));
        exit;
    } else if ((empty($t_1) || check_alpha_num($t_1)) || (empty($t_2) || check_alpha_num($t_2)) || (empty($t_3) || check_alpha_num($t_3)) || (empty($t_4) || check_alpha_num($t_4)) || (empty($t_5) || check_alpha_num($t_5)) || (empty($t_6) || check_alpha_num($t_6))) {
        echo json_encode(array('error' => "Title empty or contains special characters!"));
        exit;
    } else if ((empty($d_1) || check_alpha_num($d_1)) || (empty($d_2) || check_alpha_num($d_2)) || (empty($d_3) || check_alpha_num($d_3)) || (empty($d_4) || check_alpha_num($d_4)) || (empty($d_5) || check_alpha_num($d_5)) || (empty($d_6) || check_alpha_num($d_6))) {
        echo json_encode(array('error' => "Specification empty or contains special characters!"));
        exit;
    } else if (empty($ext_data) || check_alpha_num($ext_data)) {
        echo json_encode(array('error' => "Exterrior details empty or found special characters."));
        exit;
    } else if (empty($int_data) || check_alpha_num($int_data)) {
        echo json_encode(array('error' => "Interrior details empty or found special characters."));
        exit;
    } else if (empty($am_data) || check_alpha_num($am_data)) {
        echo json_encode(array('error' => "Audio multimedia details empty or found special characters."));
        exit;
    } else if (empty($safety_data) || check_alpha_num($safety_data)) {
        echo json_encode(array('error' => "Safety & convenience details empty or found special characters."));
        exit;
    } else if (empty($_POST['tire']) || check_alpha_num($_POST['tire'])) {
        echo json_encode(array('error' => "Tire field empty or contains special characters!"));
        exit;
    } else if (empty($_POST['fuel']) || check_alpha_num($_POST['fuel'])) {
        echo json_encode(array('error' => "Fuel field empty or contains special characters!"));
        exit;
    } else if (empty($_POST['car_qty']) || $_POST['car_qty'] <= 0) {
        echo json_encode(array('error' => "Invalid Car Quantity"));
        exit;
    } else if (count($disp_images['file_name']) == 0) {
        echo json_encode(array('error' => "Display images required"));
        exit;
    } else if (count($ext_images['file_name']) == 0) {
        echo json_encode(array('error' => "Exterrior images required"));
        exit;
    } else if (count($int_images['file_name']) == 0) {
        echo json_encode(array('error' => "Interrior images required"));
        exit;
    } else if (count($car_img['file_name']) == 0) {
        echo json_encode(array('error' => "Car image required"));
        exit;
    } else {
        $car_id = $_POST['car_type'];
        $disp_images_string = implode(",", $disp_images['file_name']);
        $ext_images_string = implode(",", $ext_images['file_name']);
        $int_images_string = implode(",", $int_images['file_name']);
        $sub_model_params = [
            'sub_model_name' => $car_name,
            'total_view' => '0',
            'drive_req' => '0',
            'mfg_date' => $car_mfg_date,
            'qty' => $car_qty,
            'model_id' => $car_id,
            'price' => $car_price,
            'sold_qty'=>0,
            'engine'=> $engine,
            'milege'=>$milege,
            'gear_type'=>$gear_type
        ];
        $DB->insert('sub_model', $sub_model_params);
        if ($DB->getResult()) {
            $DB->select('sub_model', "*", null, null, 'sub_model_id DESC', '1');
            $sub_model_id = $DB->getResult()[0]['sub_model_id'];
            $sub_model_title_params = [
                't_1' => $t_1,
                't_2' => $t_2,
                't_3' => $t_3,
                't_4' => $t_4,
                't_5' => $t_5,
                't_6' => $t_6,
                'sub_model_car_id' => $sub_model_id
            ];
            $DB->insert('sub_model_title', $sub_model_title_params);
            if ($DB->getResult()) {
                $sub_model_specs_params = [
                    'spec_1' => $d_1,
                    'spec_2' => $d_2,
                    'spec_3' => $d_3,
                    'spec_4' => $d_4,
                    'spec_5' => $d_5,
                    'spec_6' => $d_6,
                    'exterrior' => $ext_data,
                    'interrior' => $int_data,
                    'audio_multimedia' => $am_data,
                    'safety_conv' => $safety_data,
                    'tire' => $tire,
                    'fuel_type' => $fuel,
                    'sub_model_car_id' => $sub_model_id,
                    'description'=>$car_desc,
                    'max_power'=>$max_power,
                    'max_torque'=>$max_torque,
                    'turning_radius'=>$turning_radius,
                    'no_of_cylinder'=>$cylinder_qty,
                    'drive_type'=>$drive_type,
                    'turbo_charger'=>$turbo_charger,
                    'top_speed'=>$top_speed,
                    'gear'=>$gear,
                    'hp'=>$horse_power,
                    'tp_time'=>$tp_time
                ];
                $DB->insert('sub_model_specs', $sub_model_specs_params);
                if ($DB->getResult()) {
                    // $car_image_string = implode(",", $car_img['file_name']);
                    $car_imgs_params = [
                        'exterrior_img' => $ext_images_string,
                        'interrior_img' => $int_images_string,
                        'disp_img' => $disp_images_string,
                        'sub_model_car_id' => $sub_model_id,
                        'car_img' => $car_img['file_name'][0]
                    ];
                    $DB->insert('image_tbl', $car_imgs_params);
                    if ($DB->getResult()) {
                        $dcont = 0;
                        while (count($disp_images['file_name']) != $dcont) {
                            move_uploaded_file($disp_images['file_tmp_name'][$dcont], "../images/display_img/" . $disp_images['file_name'][$dcont]);
                            $dcont++;
                        }

                        $econt = 0;
                        while (count($ext_images['file_name']) != $econt) {
                            move_uploaded_file($ext_images['file_tmp_name'][$econt], "../images/exterrior_img/" . $ext_images['file_name'][$econt]);
                            $econt++;
                        }

                        $icont = 0;
                        while (count($int_images['file_name']) != $icont) {
                            move_uploaded_file($int_images['file_tmp_name'][$icont], "../images/interrior_img/" . $int_images['file_name'][$icont]);
                            $icont++;
                        }

                        if (move_uploaded_file($car_img['file_tmp_name'][0], "../images/car_img/" . $car_img['file_name'][0])) {
                            $DB->sql('UPDATE model SET sub_model_qty=sub_model_qty+' . $car_qty . ' where model_id=' . $car_id . '');
                            if ($DB->getResult()) {
                                move_uploaded_file($_FILES["car_video"]["tmp_name"], "../videos/". $_FILES['car_video']['name']);
                                echo json_encode(array('success' => 1));
                                exit;
                            }
                        } else {
                            echo json_encode(array('error' => "Failed to upload car image"));
                            exit;
                        }
                    }
                }
            }
        }
    }
}
//total sales
if (isset($_POST['total_sales'])) {
    $cid = $_POST['cid'];
    // $DB->select('sales_tbl',"*",null,"branch_id=$cid");
    // $DB->select('sales_tbl',"*","branches ON branches.branch_id=sales_tbl.branch_id","branch_id=$cid");
    $DB->sql("SELECT * from branches join sales_tbl ON branches.branch_id=sales_tbl.branch_id where sales_tbl.branch_id =$cid");
    $sales_data = $DB->getResult();
    $output = "";
    if (count($sales_data[0]) > 0) {
        foreach ($sales_data as $sale_d) {
            foreach ($sale_d as $sd) {
                $output .= "
                                     <tr class='text-light'>
                                         <td>" . $sd['sale_id'] . "</td>
                                         <td class='text-capitalize'>" . $sd['manager_name'] . "</td>
                                         <td class='text-capitalize'>" . $sd['branch_name'] . "</td>
                                         <td class='text-capitalize'>" . $sd['cus_name'] . "</td>
                                         <td class='text-capitalize'>" . $sd['cus_address'] . "</td>
                                         <td class='text-lowercase'>" . $sd['cus_email'] . "</td>
                                         <td class='text-uppercase'>" . $sd['car_name'] . "</td>
                                         <td><span class='badge bg-success'>" . $sd['payment_type'] . "</span></td>
                                     </tr>
             ";
            }
        }
    } else {
        $output .= "<tr><td colspan='8' class='text-light'>No data found</td></tr>";
    }
    echo json_encode(array('flag' => 1, 'data' => $output));
}
//calculate sale
if (isset($_POST['calculate_sale'])) {
    $car_reg_no = $DB->escapeString($_POST['car_reg_no']);
    $cus_name = $DB->escapeString($_POST['cus_name']);
    $car_qty = $DB->escapeString($_POST['car_qty']);
    $cus_email = $DB->escapeString($_POST['cus_email']);
    $cus_address = $DB->escapeString($_POST['cus_address']);
    $sale_details = "";
    $data_array = [];
    if (!isset($_POST['car_name'])) {
        echo json_encode(array('error' => "Choose car"));
        exit;
    } else if (!isset($_POST['branch_id'])) {
        echo json_encode(array('error' => "Choose Branch"));
        exit;
    } else if (empty($DB->escapeString($_POST['car_price']))) {
        echo json_encode(array('error' => "Car Price Empty"));
        exit;
    } else if (check_string($cus_name) || empty($cus_name)) {
        echo json_encode(array('error' => "Customer Name Empty or Contains Number or Special Character"));
        exit;
    } else if (empty($cus_email)) {
        echo json_encode(array('error' => "Customer E-mail Required"));
        exit;
    } else if (empty($cus_address) || preg_match_all("/[^a-z0-9 -]/i", $cus_address)) {
        echo json_encode(array('error' => "Customer Address empty or contains special characters"));
        exit;
    } else if (empty($car_reg_no) || preg_match_all("/[^a-z0-9-]/i", $car_reg_no)) {
        echo json_encode(array('error' => "Registration Number empty or contains special characters"));
        exit;
    } else if (empty($car_qty) || $car_qty <= 0) {
        echo json_encode(array('error' => "Car Quantity Required or Invalid"));
        exit;
    } else {
        $id = $_POST['car_id'];
        $DB->select('sales_tbl', "cus_email", null, "cus_email='$cus_email'");
        if (count($DB->getResult()) >= 1) {
            echo json_encode(array('error' => "Customer E-mail Exists"));
            exit;
        } else {
            $branch_id = $_POST['branch_id'];
            $DB->select('branches', "*", null, "branch_id=$branch_id");
            $cars = explode(",", $DB->getResult()[0]['cars']);
            $searched_car = [];
            foreach ($cars as $car) {
                if ($car == $id) {
                    array_push($searched_car, $car);
                }
            }
            if ($car_qty > count($searched_car)) {
                echo json_encode(array('error' => "Car Quantity Out Of Stock"));
                exit;
            } else {
                $DB->select('sales_tbl', "reg_no", null, "reg_no='$car_reg_no'");
                if (count($DB->getResult()) >= 1) {
                    echo json_encode(array('error' => "Registration Number Exists"));
                    exit;
                } else {
                    $_SESSION['form_data'] = $_POST;
                    $DB->select('branches', "*", null, "branch_id=$branch_id");
                    $bname = $DB->getResult()[0]['branch_name'];
                    $DB->select("sub_model", "sub_model_name", null, "sub_model_id=$id");
                    $cname = $DB->getResult()[0]['sub_model_name'];
                    $sale_details .= "
                            <tr>
                                <td>Customer Name</td>
                                <td class='text-capitalize'><span>" . $_POST['cus_name'] . "</span>(<span>" . $_POST['cus_address'] . "</span>)</td>
                            </tr>
                            <tr>
                                <td>Car Model</td>
                                <td class='text-capitalize'><span>" . $cname . "</span>(<span>" . $_POST['car_qty'] . "</span>)</td>
                            </tr>
                            <tr>
                                <td>Car Price</td>
                                <td class='car_price'>" . $_POST['car_price'] . "</td>
                            </tr>
                            <tr>
                                <td>VAT(10%)</td>
                                <td>" . ($_POST['car_price'] * $_POST['car_qty']) + ($_POST['car_price'] * 0.10) . "</td>
                            </tr>
                            <tr>
                                <td>Registration Number</td>
                                <td>" . $_POST['car_reg_no'] . "</td>
                            </tr>
                            <tr>
                                <td>Manager Name</td>
                                <td>" . $_POST['manager_name'] . "</td>
                            </tr>
                            <tr>
                                <td>Customer E-mail</td>
                                <td>" . $_POST['cus_email'] . "</td>
                            </tr>
                            <tr>
                                <td>Branch Name</td>
                                <td class='text-capitalize' >" . $bname . "</td>
                            </tr>
                            <tr>
                                <td><img src='../images/add-car.gif' alt=''></td>
                                <td><button class='btn btn-sm btn-primary sale_btn'>Add?</button></td>
                            </tr>
                            ";
                    array_push($data_array, $sale_details);
                    echo json_encode(array('success' => 1, 'data' => $data_array));
                }
            }
        }
    }
}
//Add sale
if (isset($_POST['add_sale'])) {
    date_default_timezone_set('Asia/Dhaka');
    $old_data = $_SESSION['form_data'];
    $id = $old_data['car_id'];
    $DB->select("sub_model", "sub_model_name", null, "sub_model_id=$id");
    $cname = $DB->getResult()[0]['sub_model_name'];
    $params = [
        'car_name' => $cname,
        'car_id' => $id,
        'price' => $old_data['car_price'],
        'cus_name' => $old_data['cus_name'],
        'manager_name' => $old_data['manager_name'],
        'cus_email' => $old_data['cus_email'],
        'cus_address' => $old_data['cus_address'],
        'payment_type' => $old_data['payment_type'],
        'date_time' => date("Y:M:d") . " " . date("h:i:sa"),
        'reg_no' => $old_data['car_reg_no'],
        'branch_id' => $old_data['branch_id'],
        'car_qty' => $old_data['car_qty']
    ];
    $car_qty = $old_data['car_qty'];
    $total_amnt = (int) (($old_data['car_price'] * $car_qty) + ($old_data['car_price'] * 0.10));
    $branch_id = $old_data['branch_id'];
    $DB->select('branches', "*", null, "branch_id=$branch_id");
    $cars = explode(",", $DB->getResult()[0]['cars']);
    $DB->insert('sales_tbl', $params);
    if ($DB->getResult()) {
        $init = 1;
        while ($init <= $car_qty) {
            unset($cars[array_search($id, $cars)]);
            $init++;
        }
        $new_cars = implode(",", $cars);
        $DB->sql("UPDATE branches SET cars='$new_cars',amount=amount+$total_amnt where branch_id=$branch_id");
        if ($DB->getResult()) {
            $DB->sql("UPDATE branches SET car_qty=car_qty-$car_qty WHERE branch_id=$branch_id");
            if ($DB->getResult()) {
                echo json_encode(array('success' => 1));
                exit;
            }
        }
    }
}
//Choose car
if (isset($_POST['choose_car'])) {
    $id = $_POST['car_id'];
    $array = [];
    $DB->select("sub_model", "qty,price", null, "sub_model_id=$id");
    // echo $DB->getResult()[0]['price'];
    $car_details = $DB->getResult();
    $array[0] = $car_details[0]['qty'];
    $array[1] = $car_details[0]['price'];
    // array_push($array, $car_details[0]['qty']);
    // array_push($array, $car_details[0]['price']);
    echo json_encode(array('data' => $array));
    exit;
}
//Choose Branch
if (isset($_POST['choose_branch'])) {
    $bid = $_POST['branch_id'];
    $DB->select("employee", "name", null, "assigned_branch_id=$bid");
    $data = $DB->getResult();
    foreach ($data as $dt) {
        if (count($dt) >= 1) {
            echo $dt['name'];
            exit;
        } else {
            echo "Manager not found";
            exit;
        }
    }
}
//Check car quantity
if (isset($_POST['qty_check'])) {
    $cqty = $_POST['cqty'];
    $cid = $_POST['cid'];
    if ($cqty <= 0) {
        echo "0";
        exit;
    } else {
        $DB->select('sub_model', "*", null, "sub_model_id=$cid AND qty >= $cqty");
        $flag = $DB->getResult();
        if (count($flag) == 0) {
            echo "0";
            exit;
        } else {
            return true;
        }
    }
}
//check instock car quantity
if (isset($_POST['instock_qty_check'])) {
    $available_qty = $_POST['available'];
    $newqty = $_POST['newqty'];
    $cid = $_POST['cid'];
    $lastVal = $_POST['lastVal'];
    $currentVal = $_POST['currentVal'];
    if ($newqty < 0 || $newqty > $available_qty) {
        echo '0';
        exit;
    } else {
        if ($lastVal <= -1 && $currentVal == 0) {
            $DB->select("sub_model", "qty", null, "sub_model_id=$cid");
            echo $updated_qty = $DB->getResult()[0]['qty'];
        } else if ($lastVal > $available_qty && $currentVal == $available_qty) {
            $DB->select("sub_model", "qty", null, "sub_model_id=$cid");
            echo $updated_qty = $DB->getResult()[0]['qty'];
        } else {
            if ($currentVal > $lastVal) {
                $DB->sql("UPDATE sub_model SET qty=qty-1 where sub_model_id=$cid");
                $DB->select("sub_model", "qty", null, "sub_model_id=$cid");
                echo $updated_qty = $DB->getResult()[0]['qty'];
            } else {
                $DB->sql("UPDATE sub_model SET qty=qty+1 where sub_model_id=$cid");
                $DB->select("sub_model", "qty", null, "sub_model_id=$cid");
                echo $updated_qty = $DB->getResult()[0]['qty'];
            }
        }
    }
}
// Add showroom
if (isset($_POST['showroom_add'])) {
    $branch_image = masud($_POST['img'], 'Branch image');
    $branch_location = $DB->escapeString($_POST['branch_location']);
    $car_names = $DB->escapeString($_POST['car_name_txt']);
    $car_qty = $DB->escapeString($_POST['qty_txt']);
    $salesmans = $DB->escapeString($_POST['salesman_txt']);
    $mechanics = $DB->escapeString($_POST['mechanic_txt']);
    if (empty($branch_location)) {
        echo json_encode(array('error' => "Branch required"));
        exit;
    } else if (!isset($_POST['manager_id'])) {
        echo json_encode(array('error' => "Manager Name Required"));
        exit;
    } else if (!isset($_POST['accountant_id'])) {
        echo json_encode(array('error' => "Accountant name required"));
        exit;
    } else if (empty($salesmans)) {
        echo json_encode(array('error' => "Please assign at least one salesman"));
        exit;
    } else if (empty($mechanics)) {
        echo json_encode(array('error' => "Please Choose car mechanic"));
        exit;
    } else if ($_POST['qty_txt'] == 0) {
        echo json_encode(array('error' => "Please Assign a Car"));
        exit;
    } else if (!isset($_POST['estd'])) {
        echo json_encode(array('error' => "Choose branch estd"));
        exit;
    } else {

        $DB->select("sub_model", "*", null, "qty>=1");
        $all_cars = $DB->getResult();
        $car_id_arr = [];
        $car_qty_arr = [];
        foreach ($all_cars as $car) {
            if (!empty($_POST['car' . $car['sub_model_id']])) {
                for ($i = 0; $i < $_POST['car' . $car['sub_model_id']]; $i++) {
                    array_push($car_id_arr, $car['sub_model_id']);
                }
            }
        }
        $car_id_txt = implode(",", $car_id_arr);
        $car_qty = count($car_id_arr);
        if (count($branch_image['file_name']) == 0) {
            echo json_encode(array('error' => "Upload an image"));
            exit;
        } else {
            if (file_exists("../images/branch_banners/" . $branch_image['file_name'][0] . "")) {
                echo json_encode(array('error' => "File exists, upload another image"));
                exit;
            } else {
                $manager_id = $_POST['manager_id'];
                $accountant_id = $_POST['accountant_id'];
                $DB->select("employee", "*", null, "id=$manager_id");
                $manager_name = $DB->getResult()[0]['name'];
                $DB->select("employee", "*", null, "id=$accountant_id");
                $accountant_name = $DB->getResult()[0]['name'];
                $branch_params = [
                    'branch_name' => $branch_location,
                    'cars' => $car_id_txt,
                    'car_qty' => $car_qty,
                    'amount' => 0,
                    'manager_name' => $manager_id,
                    'estd' => $_POST['estd'],
                    'thumb_img' => $branch_image['file_name'][0],
                    'accountant' => $accountant_id,
                    'salesmans' => $salesmans,
                    'mechanics' => $mechanics
                ];
                $DB->insert('branches', $branch_params);
                if ($DB->getResult()) {
                    $DB->sql("SELECT * from branches ORDER BY branch_id DESC");
                    $branch_id = $DB->getResult()[0][0]['branch_id'];
                    //update manager
                    $DB->update('employee', ['assigned_branch_id' => $branch_id, 'branch_assigned' => 1], "id=$manager_id OR id=$accountant_id");
                    if ($DB->getResult()) {
                        //update salesman and mechanic
                        $salesman_id_arr = explode(",", $salesmans);
                        $mechanic_id_arr = explode(",", $mechanics);
                        $sm_id_arr = array_merge($salesman_id_arr, $mechanic_id_arr);
                        $sm_id_txt = implode(",", $sm_id_arr);
                        $DB->update('employee', ['assigned_branch_id' => $branch_id, 'branch_assigned' => 1], "id in($sm_id_txt)");
                        if ($DB->getResult()) {
                            //Updating the qunatites
                            $car_id_len = array_count_values($car_id_arr);
                            foreach ($car_id_len as $key => $value) {
                                $DB->sql("SELECT * from sub_model JOIN model ON sub_model.model_id=model.model_id where sub_model.sub_model_id=$key");
                                $data = $DB->getResult();
                                if (empty($data)) {
                                    continue;
                                } else {
                                    foreach ($data as $dt) {
                                        if (!is_array($dt) && !is_object($dt)) {
                                            continue;
                                        }
                                        foreach ($dt as $d) {
                                            $new_qty = $d['sub_model_qty'] - $value;
                                            $mod_id = $d['model_id'];
                                            $DB->sql("UPDATE model SET sub_model_qty=$new_qty WHERE model_id=$mod_id");
                                        }
                                    }
                                }
                                $DB->sql("UPDATE sub_model SET qty=qty-$value WHERE sub_model_id=$key");
                            }

                            if (move_uploaded_file($branch_image['file_tmp_name'][0], "../images/branch_banners/" . $branch_image['file_name'][0])) {
                                echo json_encode(array('success' => 1));
                                exit;
                            }

                        }
                    }
                }
            }
        }
    }
}
// Update showroom
if (isset($_POST['showroom_update'])) {
    $branch_id = $_POST['branch_id'];
    $assigned_salesman=explode(",",$_POST['salesman_txt']);
    $assigned_mechanic=explode(",",$_POST['mechanic_txt']);
    $DB->select("branches","salesmans,mechanics","employee on branches.branch_id=employee.assigned_branch_id", "employee.id=$branch_id");
    $data=$DB->getResult();
    $existing_salesman=$data[0]['salesmans'];
    $existing_salesman_arr=explode(",",$existing_salesman);
    $existing_mechanic=$data[0]['mechanics'];
    $existing_mechanic_arr=explode(",",$existing_mechanic);
    $old_salesman=array_diff($existing_salesman_arr,$assigned_salesman);
    $new_salesman=array_diff($assigned_salesman,$existing_salesman_arr);
    $new_mechanic=array_diff($assigned_mechanic,$existing_mechanic_arr);
    $old_mechanic=array_diff($existing_mechanic_arr,$assigned_mechanic);
    if (empty($DB->escapeString($_POST['branch_location'])) || preg_match_all("/[^a-z-,0-9]/i", $DB->escapeString($_POST['branch_location']))) {
        echo json_encode(array('error' => "Branch name empty or contains special characters"));
        exit;
    } else if (empty($_POST['salesman_txt'])) {
        echo json_encode(array('error' => "Please assign a salesman"));
        exit;
    } else if (empty($_POST['mechanic_txt'])) {
        echo json_encode(array('error' => "Please assign a mechanic"));
        exit;
    } else {
        
        ///checking instock cars qty
        $DB->select("sub_model", "*", null, "qty>=1");
        $branch_cars = $DB->getResult();
        $instock_car_id_arr = [];
        foreach ($branch_cars as $car) {
            if (!empty($_POST['instock' . $car['sub_model_id']])) {
                for ($i = 0; $i < $_POST['instock' . $car['sub_model_id']]; $i++) {
                    array_push($instock_car_id_arr, $car['sub_model_id']);
                }
            }
        }
        $instock_car_id_txt = implode(",", $instock_car_id_arr);
        $instock_car_qty = count($instock_car_id_arr);

        //checking newly assigned cars from available cars
        $DB->select("sub_model", "*", null, "qty>=1");
        $all_cars = $DB->getResult();
        $new_car_id_arr = [];
        foreach ($all_cars as $car) {
            if (!empty($_POST['car' . $car['sub_model_id']])) {
                for ($i = 0; $i < $_POST['car' . $car['sub_model_id']]; $i++) {
                    array_push($new_car_id_arr, $car['sub_model_id']);
                }
            }
        }
        $new_car_id_txt = implode(",", $new_car_id_arr);
        $new_car_qty = count($new_car_id_arr);

        $updated_car_arr = array_merge($instock_car_id_arr, $new_car_id_arr);
        $updated_car_txt = implode(",", $updated_car_arr);
        if (count($updated_car_arr) <= 0) {
            echo json_encode(array('error' => "Please assign a car"));
            exit;
        } else {
            if (empty($_FILES['new_branch_img']['name'])) {
                $file_name = $_POST['old_branch_img'];
            } else {
                $branch_image = masud($_POST['img'], 'Branch image');
                $file_name = $branch_image['file_name'][0];
                $file_tmp = $branch_image['file_tmp_name'][0];
            }
            if (isset($_POST['new_manager_id'])) {
                $manager_id = $_POST['new_manager_id'];
                $DB->update('employee',["assigned_branch_id"=>$branch_id, 'branch_assigned'=>1], "id=$manager_id");
                $old_manager=$_POST['old_manager_id'];
                $DB->sql("UPDATE employee SET assigned_branch_id = NULL, branch_assigned = 0 WHERE id = $old_manager");
            } else {
                $manager_id = $_POST['old_manager_id'];
            }

            if (isset($_POST['new_accountant_id'])) {
                $accountant_id = $_POST['new_accountant_id'];
                $DB->update('employee',["assigned_branch_id"=>$branch_id, 'branch_assigned'=>1], "id=$accountant_id");
                $old_accountant=$_POST['old_accountant_id'];
                $DB->sql("UPDATE employee SET assigned_branch_id = NULL, branch_assigned = 0 WHERE id = $old_accountant");
            } else {
                $accountant_id = $_POST['old_accountant_id'];
            }


            $branch_params = [
                'branch_name' => $DB->escapeString($_POST['branch_location']),
                'cars' => $updated_car_txt,
                'car_qty' => count($updated_car_arr),
                'manager_name' => $manager_id,
                'thumb_img' => $file_name,
                'accountant' => $accountant_id,
                'salesmans' => $_POST['salesman_txt'],
                'mechanics' => $_POST['mechanic_txt']
            ];
            $DB->update('branches', $branch_params, "branch_id=$branch_id");
            if ($DB->getResult()) {
                // print_r(count($updated_car_arr));
                if (count($new_car_id_arr) != 0) {
                    $car_id_len = array_count_values($new_car_id_arr);
                    foreach ($car_id_len as $key => $value) {
                        $DB->sql("SELECT * from sub_model JOIN model ON sub_model.model_id=model.model_id where sub_model.sub_model_id=$key");
                        $data = $DB->getResult();
                        if (empty($data)) {
                            continue;
                        } else {
                            foreach ($data as $dt) {
                                if (!is_array($dt) && !is_object($dt)) {
                                    continue;
                                }
                                foreach ($dt as $d) {
                                    $new_qty = $d['sub_model_qty'] - $value;
                                    $mod_id = $d['model_id'];
                                    $DB->sql("UPDATE model SET sub_model_qty=$new_qty WHERE model_id=$mod_id");
                                }
                            }
                            $DB->sql("UPDATE sub_model SET qty=qty-$value WHERE sub_model_id=$key");
                        }
                    }
                }
                foreach($new_salesman as $salesman){
                    $DB->update('employee',['assigned_branch_id'=>$branch_id, 'branch_assigned'=>1],"id=$salesman");
                }
                foreach($old_salesman as $salesman){
                    $DB->sql("UPDATE employee SET assigned_branch_id = NULL, branch_assigned = 0 WHERE id = $salesman");
                }
                foreach($new_mechanic as $mechanic){
                    $DB->update('employee',['assigned_branch_id'=>$branch_id, 'branch_assigned'=>1],"id=$mechanic");
                }
                foreach($old_mechanic as $mechanic){
                    $DB->sql("UPDATE employee SET assigned_branch_id = NULL, branch_assigned = 0 WHERE id = $mechanic");
                }
                $DB->sql("UPDATE employee set assigned_branch_id=$branch_id, branch_assigned = 1 where id=$accountant_id");
                    if (!empty($_FILES['new_branch_img']['name'])) {
                        if(file_exists("../images/branch_banners/". $_FILES['new_branch_img']['name'] ."")){
                            echo json_encode(array('error'=>"Image exists."));
                            exit;
                        }else{
                            if(unlink("../images/branch_banners/".$_POST['old_branch_img']."")){
                                if (move_uploaded_file($file_tmp, "../images/branch_banners/" . $file_name)) {
                                    echo json_encode(array('success' => 1));
                                    exit;
                                }
                            }                            
                                // echo "Error uploading file.";
                                // // Check for specific errors
                                // if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
                                //     echo "Upload error: " . $_FILES['file']['error'];
                                // }
                            
                        }
                    } else {
                        echo json_encode(array('success' => 1));
                        exit;
                    }
            } else {
                echo "Something went wrong";
                exit;
            }
        }
        echo json_encode(array('success' => 1));
        exit;
    }
}
//remove img
if (isset($_POST['remove_img'])) {
    $img_id = $_POST['img_id'];
    $img_name = $_POST['img_name'];
    $field = $_POST['img_field'];
    $DB->select("image_tbl", "*", null, "img_id=$img_id");
    $images = $DB->getResult()[0][$field];
    $images_array = explode(",", $images);
    unset($images_array[array_search($img_name, $images_array)]);
    $updated_img = implode(",", $images_array);
    $DB->update("image_tbl", ["$field" => $updated_img], "img_id=$img_id");
    if ($DB->getResult()) {
        echo json_encode(array('success' => 1));
        exit;
    }
}
// Update car
if (isset($_POST['updateCar'])) {

    $disp_images = masud($_POST['disp_img_name_fields'], 'Display');
    $ext_images = masud($_POST['ext_img_name_fields'], 'Exterrior');
    $int_images = masud($_POST['int_img_name_fields'], 'Interrior');
    $car_img = masud($_POST['car_img'], 'Car image');
    $car_name = $DB->escapeString($_POST['car_name']);
    $car_price = $DB->escapeString($_POST['car_price']);
    $t_1 = $DB->escapeString($_POST['t_1']);
    $d_1 = $DB->escapeString($_POST['d_1']);
    $t_2 = $DB->escapeString($_POST['t_2']);
    $d_2 = $DB->escapeString($_POST['d_2']);
    $t_3 = $DB->escapeString($_POST['t_3']);
    $d_3 = $DB->escapeString($_POST['d_3']);
    $t_4 = $DB->escapeString($_POST['t_4']);
    $d_4 = $DB->escapeString($_POST['d_4']);
    $t_5 = $DB->escapeString($_POST['t_5']);
    $d_5 = $DB->escapeString($_POST['d_5']);
    $t_6 = $DB->escapeString($_POST['t_6']);
    $d_6 = $DB->escapeString($_POST['d_6']);

    $car_desc = $DB->escapeString($_POST['car_desc']);
    $max_power = $DB->escapeString($_POST['max_power']);
    $max_torque = $DB->escapeString($_POST['max_torque']);
    $turning_radius = $DB->escapeString($_POST['turning_radius']);
    $cylinder_qty = $_POST['cylinder_qty'];
    $drive_type = $DB->escapeString($_POST['drive_type']);
    $turbo_charger = $DB->escapeString($_POST['turbo_charger']);
    $top_speed = $DB->escapeString($_POST['top_speed']);
    $gear = $DB->escapeString($_POST['gear']);
    $horse_power = $DB->escapeString($_POST['horse_power']);
    $tp_time = $DB->escapeString($_POST['tp_time']);
    $engine=$DB->escapeString($_POST['engine']);
    $milege=$DB->escapeString($_POST['milege']);
    $gear_type=$DB->escapeString($_POST['gear_type']);

    $ext_data = $DB->escapeString($_POST['ext_data']);
    $int_data = $DB->escapeString($_POST['int_data']);
    $safety_data = $DB->escapeString($_POST['safety_data']);
    $am_data = $DB->escapeString($_POST['am_data']);
    $tire = $DB->escapeString($_POST['tire']);
    $fuel = $DB->escapeString($_POST['fuel']);
    $car_qty = $_POST['car_qty'];
    $car_mfg_date = $_POST['mfg_date'];
    $car_name = $DB->escapeString($_POST['car_name']);
    if (!isset($_POST['car_type'])) {
        echo json_encode(array('error' => 'Choose car type'));
        exit;
    } else if (empty($car_name) || check_alpha_num($car_name)) {
        echo json_encode(array('error' => "Car name empty or contains special characters!"));
        exit;
    } else if (empty($_POST['car_price']) || $_POST['car_price'] <= 0) {
        echo json_encode(array('error' => "Invalid car price."));
        exit;
    } else if ((empty($t_1) || check_alpha_num($t_1)) || (empty($t_2) || check_alpha_num($t_2)) || (empty($t_3) || check_alpha_num($t_3)) || (empty($t_4) || check_alpha_num($t_4)) || (empty($t_5) || check_alpha_num($t_5)) || (empty($t_6) || check_alpha_num($t_6))) {
        echo json_encode(array('error' => "Title empty or contains special characters!"));
        exit;
    } else if ((empty($d_1) || check_alpha_num($d_1)) || (empty($d_2) || check_alpha_num($d_2)) || (empty($d_3) || check_alpha_num($d_3)) || (empty($d_4) || check_alpha_num($d_4)) || (empty($d_5) || check_alpha_num($d_5)) || (empty($d_6) || check_alpha_num($d_6))) {
        echo json_encode(array('error' => "Specification empty or contains special characters!"));
        exit;
    } else if (empty($ext_data) || check_alpha_num($ext_data)) {
        echo json_encode(array('error' => "Exterrior details empty or found special characters."));
        exit;
    } else if (empty($int_data) || check_alpha_num($int_data)) {
        echo json_encode(array('error' => "Interrior details empty or found special characters."));
        exit;
    } else if (empty($am_data) || check_alpha_num($am_data)) {
        echo json_encode(array('error' => "Audio multimedia details empty or found special characters."));
        exit;
    } else if (empty($safety_data) || check_alpha_num($safety_data)) {
        echo json_encode(array('error' => "Safety & convenience details empty or found special characters."));
        exit;
    } else if (empty($_POST['tire']) || check_alpha_num($_POST['tire'])) {
        echo json_encode(array('error' => "Tire field empty or contains special characters!"));
        exit;
    } else if (empty($_POST['fuel']) || check_alpha_num($_POST['fuel'])) {
        echo json_encode(array('error' => "Fuel field empty or contains special characters!"));
        exit;
    } else if (empty($_POST['car_qty']) || $_POST['car_qty'] <= -1) {
        echo json_encode(array('error' => "Invalid Car Quantity"));
        exit;
    } else if (empty($_POST['old_display_images']) && count($disp_images['file_name']) == 0) {
        echo json_encode(array('error' => "Display images required"));
        exit;
    } else if (empty($_POST['old_exterrior_images']) && count($ext_images['file_name']) == 0) {
        echo json_encode(array('error' => "Exterrior images required"));
        exit;
    } else if (empty($_POST['old_interrior_images']) && count($int_images['file_name']) == 0) {
        echo json_encode(array('error' => "Interrior images required"));
        exit;
    } else {
        $sub_id=$_POST['cid'];
        $car_id = $_POST['car_type'];
        $d_img = explode(",", $_POST['old_display_images']);
        $new_disp_img_arr = array_merge($d_img, $disp_images['file_name']);
        $disp_images_string = implode(",", $new_disp_img_arr);
        $e_img = explode(",", $_POST['old_exterrior_images']);
        $new_ext_img_arr = array_merge($e_img, $ext_images['file_name']);
        $ext_images_string = implode(",", $new_ext_img_arr);
        $i_img = explode(",", $_POST['old_interrior_images']);
        $new_int_img_arr = array_merge($i_img, $int_images['file_name']);
        $int_images_string = implode(",", $new_int_img_arr);
        $new_disp_img_arr = array_filter($new_disp_img_arr);
        $new_ext_img_arr = array_filter($new_ext_img_arr);
        $new_int_img_arr = array_filter($new_int_img_arr);

        if (count($car_img['file_name']) == 0 ) {
            $car_featured_img = $_POST['car_old_img'];
        } else {
            $car_featured_img = $car_img['file_name'];
        }
        ///////
        $sub_model_params = [
            'sub_model_name' => $car_name,
            'total_view' => '0',
            'drive_req' => '0',
            'mfg_date' => $car_mfg_date,
            'qty' => $car_qty,
            'model_id' => $car_id,
            'price' => $car_price,
            'engine'=> $engine,
            'milege'=>$milege,
            'gear_type'=>$gear_type
        ];
        $DB->update('sub_model', $sub_model_params, "sub_model_id=$sub_id");
        if ($DB->getResult()) {
            // $DB->select('sub_model', "*", null, null, 'sub_model_id DESC', '1');
            // $sub_model_id= $DB->getResult()[0]['sub_model_id'];
            $sub_model_title_params = [
                't_1' => $t_1,
                't_2' => $t_2,
                't_3' => $t_3,
                't_4' => $t_4,
                't_5' => $t_5,
                't_6' => $t_6
                // 'sub_model_car_id' => $sub_id
            ];
            $DB->update('sub_model_title', $sub_model_title_params, "sub_model_car_id=$sub_id");
            if ($DB->getResult()) {
                $sub_model_specs_params = [
                    'spec_1' => $d_1,
                    'spec_2' => $d_2,
                    'spec_3' => $d_3,
                    'spec_4' => $d_4,
                    'spec_5' => $d_5,
                    'spec_6' => $d_6,
                    'exterrior' => $ext_data,
                    'interrior' => $int_data,
                    'audio_multimedia' => $am_data,
                    'safety_conv' => $safety_data,
                    'tire' => $tire,
                    'fuel_type' => $fuel,
                    'description'=>$car_desc,
                    'max_power'=>$max_power,
                    'max_torque'=>$max_torque,
                    'turning_radius'=>$turning_radius,
                    'no_of_cylinder'=>$cylinder_qty,
                    'drive_type'=>$drive_type,
                    'turbo_charger'=>$turbo_charger,
                    'top_speed'=>$top_speed,
                    'gear'=>$gear,
                    'hp'=>$horse_power,
                    'tp_time'=>$tp_time
                ];
                $DB->update('sub_model_specs', $sub_model_specs_params, "sub_model_car_id=$sub_id");
                if ($DB->getResult()) {
                    $car_imgs_params = [
                        'exterrior_img' => $ext_images_string,
                        'interrior_img' => $int_images_string,
                        'disp_img' => $disp_images_string,
                        // 'sub_model_car_id' => $sub_id,
                        'car_img' => $car_featured_img
                    ];
                    $DB->update('image_tbl', $car_imgs_params,"sub_model_car_id=$sub_id");
                    if ($DB->getResult()) {
                       //uploading image 

                        $dcont = 0;
                        while (count($disp_images['file_name']) != $dcont) {
                            move_uploaded_file($disp_images['file_tmp_name'][$dcont], "../images/display_img/" . $disp_images['file_name'][$dcont]);
                            $dcont++;
                        }

                        $econt = 0;
                        while (count($ext_images['file_name']) != $econt) {
                            move_uploaded_file($ext_images['file_tmp_name'][$econt], "../images/exterrior_img/" . $ext_images['file_name'][$econt]);
                            $econt++;
                        }

                        $icont = 0;
                        while (count($int_images['file_name']) != $icont) {
                            move_uploaded_file($int_images['file_tmp_name'][$icont], "../images/interrior_img/" . $int_images['file_name'][$icont]);
                            $icont++;
                        }
                        if(count($car_img['file_name']) != 0 ){
                            move_uploaded_file($car_img['file_tmp_name'][0], "../images/car_img/" . $car_img['file_name'][0]);
                        }
                        
                            $DB->sql('UPDATE model SET sub_model_qty=sub_model_qty+' . $car_qty . ' where model_id=' . $car_id . '');
                            if ($DB->getResult()) {
                                echo json_encode(array('success' => 1));
                                exit;
                            }
                    }
                }
            }
        }
    }
}

//update news status
if(isset($_POST['news_status_update'])){
    $id=$_POST['news_id'];
    $stats=$_POST['status'];
    $DB->sql("UPDATE news set post_status=$stats WHERE id=$id");
    echo 1;
    exit;
}

//Update admin status
if(isset($_POST['admin_status_update'])){
    $id=$_POST['admin_id'];
    $stats=$_POST['status'];
    $DB->sql("UPDATE admin_tbl set account_status=$stats WHERE id=$id");
    echo 1;
    exit;
}

//Addd post
if(isset($_POST['add_post'])){
    $auth_name=$_POST['author_name'];
    $post_title=$DB->escapeString($_POST['post_title']);
    $post_desc=$DB->escapeString($_POST['post_desc']);
    $post_img=masud($_POST['img'], 'Post image');
    if (empty($post_title) || preg_match("/[^a-z 0-9-]/i", $post_title)) {
        echo json_encode(array('error' => "Post title empty."));
        exit;
    } else if(empty($post_desc)){
        echo json_encode(array('error' => "Post description empty."));
        exit;
    }else if(!isset($_POST['post_type'])){
        echo json_encode(array('error' => "Select post type."));
        exit;
    }else if(!isset($_POST['post_publish'])){
        echo json_encode(array('error' => "Select post publish type."));
        exit;
    }else{
        
        if(count($post_img['file_name'])==0){
            echo json_encode(array('error' => "Choose post image."));
            exit;
        }else{
            $file_name=$post_img['file_name'][0];
            $file_tmp=$post_img['file_tmp_name'][0];
            $curr_admin_id=$_SESSION['logged_admin_id'];
            $params=[
                'auth_name'=>$auth_name,
                'auth_id'=>$_SESSION['logged_admin_id'],
                'title'=>trim($post_title),
                'post_desc'=>trim($post_desc),
                'post_type'=>$_POST['post_type'],
                'post_status'=>$_POST['post_publish'],
                'total_views'=>0,
                'publish_date'=>date("Y-m-d"),
                'post_img'=>$file_name
            ];

            $DB->insert("news",$params);
            if($DB->getResult()){
                if(move_uploaded_file($file_tmp, "../images/post_img/" . $file_name)){
                    $DB->sql("UPDATE admin_tbl SET total_post=total_post+1 where id=$curr_admin_id");
                    echo json_encode(array('success'=>1));
                    exit;
                }
            }
        }
    }
}

//Update post
if(isset($_POST['edit_post'])){
    $auth_name=$_POST['author_name'];
    $post_title=$DB->escapeString($_POST['post_title']);
    $post_desc=$DB->escapeString($_POST['post_desc']);
    $post_img=masud($_POST['img'], 'Post image');
    if (empty($post_title) || preg_match("/[^a-z 0-9-]/i", $post_title)) {
        echo json_encode(array('error' => "Post title empty or found special character."));
        exit;
    } else if(empty($post_desc)){
        echo json_encode(array('error' => "Post description empty."));
        exit;
    }else if(!isset($_POST['post_type'])){
        echo json_encode(array('error' => "Select post type."));
        exit;
    }else{
        
        if(count($post_img['file_name'])==0){
            $file_name=$_POST['old_post_img'];
        }else{
            if(file_exists("../images/post_img/". $_FILES['new_post_img']['name'] ."")){
                echo json_encode(array('error' => "Post images exists."));
                exit;
            }else{
                $file_name=$post_img['file_name'][0];
                $file_tmp=$post_img['file_tmp_name'][0];
                unlink("../images/post_img/".$_POST['old_post_img']."");
                move_uploaded_file($file_tmp, "../images/post_img/" . $file_name);                
            }
        }
            $params=[
                'title'=>trim($post_title),
                'post_desc'=>trim($post_desc),
                'post_type'=>$_POST['post_type'],
                'total_views'=>0,
                'post_img'=>$file_name
            ];
            $post_id=$_POST['post_id'];
            $DB->update("news",$params,"id=$post_id");
            if($DB->getResult()){
                echo json_encode(array('success'=>1));
                exit;
            }
        
    }
}

//Delete post
if(isset($_POST['del_post'])){
    $pid=$_POST['pid'];
    $DB->sql("DELETE news, comments_tbl
    FROM news
    LEFT JOIN comments_tbl ON news.id = comments_tbl.post_id
    WHERE news.id = $pid OR comments_tbl.post_id = $pid");
   
    if($DB->getResult()){
        echo "1";
    }
}

//Accept test drive
if(isset($_POST['accept_test_drive'])){
    $uid=$_POST['uid'];
    $tid=$_POST['tid'];
    $msg="Your request for test drive is accepted. Contact with us within 2 days or your application will be discarded.";

    $params=[
        'test_drive_id'=>$tid,
        'user_id'=>$uid,
        'response_msg'=>$msg
    ];
    $DB->insert("t_drive_response",$params);
    if($DB->getResult()){
        $DB->update("test_drive",['req_status'=>1], "id=$tid");
        if($DB->getResult()){
            echo "1";
            exit;
        }
    }
}

//Add admin 
if(isset($_POST['add_admin'])){
    $admin_name=$DB->escapeString($_POST['admin_name']);
    $admin_email=$DB->escapeString($_POST['admin_email']);
    $admin_password=$DB->escapeString($_POST['admin_password']);
    if(empty($admin_name) || preg_match("/[^a-z ]/i", $admin_name)){
        echo json_encode(array('error' => 'Name empty or found special character'));
        exit;
    }else if(empty($admin_email) || preg_match_all("/[^a-z0-9-@.]/i", $admin_email)){
        echo json_encode(array('error' => 'Invalid email'));
        exit;
    }else if(empty($admin_password)){
        echo json_encode(array('error' => 'Password empty'));
        exit;
    }else if(!isset($_POST['acc_status'])){
        echo json_encode(array('error' => 'Select account status'));
        exit;
    }
    else{
        $DB->select('admin_tbl',"count(admin_email) as res",null, "admin_email='$admin_email'");
        $existing_email=$DB->getResult();
        if($existing_email[0]['res'] >= 1){
            echo json_encode(array('error'=>"Admin e-mail exists."));
            exit;
        }else{
            $acc_status=$_POST['acc_status'];
            $DB->insert("admin_tbl",['admin_name'=>$admin_name, 'admin_email'=>$admin_email,'admin_password'=>$admin_password,'total_post'=>0,'account_status'=>$acc_status]);
            if($DB->getResult()){
                echo json_encode(array('success'=>1));
                exit;
            }
        }
    }
}

//update admin

if(isset($_POST['update_admin'])){
    $admin_name=$DB->escapeString($_POST['admin_name']);
    $admin_email=$DB->escapeString($_POST['admin_email']);
    $admin_password=$DB->escapeString($_POST['admin_password']);
    $aid=$_POST['aid'];
    $num_of_posts=$_POST['num_of_posts'];
    if(empty($admin_name) || preg_match("/[^a-z ]/i", $admin_name)){
        echo json_encode(array('error' => 'Name empty or found special character'));
        exit;
    }else if(empty($admin_email) || preg_match_all("/[^a-z0-9-@.]/i", $admin_email)){
        echo json_encode(array('error' => 'Invalid email'));
        exit;
    }else if(empty($admin_password)){
        echo json_encode(array('error' => 'Password empty'));
        exit;
    }else if($num_of_posts<0){
        echo json_encode(array('error' => 'Invalid post number'));
        exit;
    }
    else{
        $DB->select('admin_tbl',"count(admin_email) as res",null, "admin_email='$admin_email' and id!=$aid");
        $existing_email=$DB->getResult();
        if($existing_email[0]['res'] >= 1){
            echo json_encode(array('error'=>"Admin e-mail exists."));
            exit;
        }else{
            $DB->update("admin_tbl",['admin_name'=>$admin_name, 'admin_email'=>$admin_email,'admin_password'=>$admin_password,'total_post'=>$num_of_posts],"id=$aid");
            if($DB->getResult()){
                echo json_encode(array('success'=>1));
                exit;
            }
        }
    }
}
?>