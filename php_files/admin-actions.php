<?php 
include '../Database/config.inc.php';
// Admin Login
if(isset($_POST['adminLogin'])){
    
    $login_email=$DB->escapeString($_POST['email']);
    $login_password=$DB->escapeString($_POST['password']);
    if(empty($login_email) || empty($login_password)){
        echo json_encode(array('error' => 'E-mail or Password Can\'t be null'));
        exit;
    }else{
        $DB->select("admin_tbl","*",null,"admin_email='$login_email' AND admin_password='$login_password'");
        $admin_data=$DB->getResult();
        if($admin_data){
            session_start();
            $_SESSION['logged_admin_name'] = $admin_data[0]['admin_name'];
            $_SESSION['logged_admin_id'] = $admin_data[0]['id'];
            echo json_encode(array('success'=>1));
        }else{
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

function check_number($string){
    $pat =  "/[0-9]/";
    $valid_string = preg_match_all($pat, $string);
    return $valid_string;
}

//Add employee
if(isset($_POST['addEmployee'])){
    $emp_name=$DB->escapeString($_POST['emp_name']);
    $emp_email=$DB->escapeString($_POST['emp_email']);
    $emp_joindate=$DB->escapeString($_POST['emp_joindate']);
    if(empty($emp_name) || empty($emp_email)){
        echo json_encode(array('error'=>"Name or E-mail has left blank"));
        exit;
    }else{
        
        if(!empty($_POST['emp_contact'])){
            $emp_phone="01".$DB->escapeString($_POST['emp_contact']);
            if($emp_phone[2] == 1 || $emp_phone[2]== 0 || $emp_phone[2]==2){
                echo json_encode(array('error'=>"Invalid contact"));
                exit;
            }else{

                if(strlen($emp_phone) != 11){
                    echo json_encode(array('error'=>"Contact should be 11 of digits"));
                    exit;
                }else if(check_number($emp_phone) != strlen($emp_phone)){
                    echo json_encode(array('error'=>"Invalid employee contact"));
                    exit;
                }else if(!isset($_POST['emp_branch'])){
                    echo json_encode(array('error'=>"Choose branch"));
                    exit;
                }else if(!isset($_POST['emp_designation'])||!isset($_POST['emp_salary'])){
                    echo json_encode(array('error'=>"Choose designation and salary status"));
                    exit;
                }else if(empty($_POST['emp_joindate'])){
                    echo json_encode(array('error'=>"Choose Join date"));
                    exit;
                }else{
                    $DB->select("employee","*",null,"email='$emp_email' OR phone='$emp_phone'");
                    $emp_data=$DB->getResult();
                    if(count($emp_data)>=1){
                        // $emp_data_check=$DB->getResult();
                        // echo count($emp_data);
                        // print_r($emp_data);
                        // die();
                        if($emp_data[0]['email']==$emp_email){
                            echo json_encode(array('error'=>"E-mail  exists"));
                            exit;
                        }else{
                            echo json_encode(array('error'=>"Phone exists"));
                            exit;
                        }
                        
                    }else{
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
                                $file_name = time() . str_replace(array(' ', '_'), '-', $file_name);
                                $emp_salary=$_POST['emp_salary'];
                        $params=[
                            'name'=>$emp_name,
                            'email'=>$emp_email,
                            'phone'=>$emp_phone,
                            'branch'=>$_POST['emp_branch'],
                            'designation'=>$_POST['emp_designation'],
                            'salary_status'=>$emp_salary,
                            'join_date'=>$emp_joindate,
                            'img'=>$file_name
                        ];
                        $DB->insert('employee',$params);
                        if($DB->getResult()){
                            move_uploaded_file($file_tmp, "../images/employee_img/" . $file_name);
                            echo json_encode(array('success'=>1));
                            exit;
                        }else{
                            echo json_encode(array('error'=>"Something went wrong"));
                            exit;
                        }
                            }

                        } else {
                            echo json_encode(array('error'=>"Please upload an image"));
                            exit;
                        }
                        
                    }
                    
                    
                }
            }
        }else{
            echo json_encode(array('error'=>"Contact left blank"));
            exit;
        }
    }
    
}








?>