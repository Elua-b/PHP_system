<?php
include('../config/dbconn.php');
session_start();
if (isset($_POST['register_btn'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $check_email_query = "SELECT email from users where email= '$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['message'] = 'Email already exists';
        header('Location:../register.php');
    } else {

        if ($password == $cpassword) {
            $insert_query = " INSERT INTO users(name,email,phone,password) VALUES('$name','$email','$phone','$password')";
            $insert_query_run = mysqli_query($con, $insert_query);
            if ($insert_query_run) {
                $_SESSION['success'] = 'Account created successfully';
                header('Location:../login.php');
            } else {
                $_SESSION['message'] = 'Account not created';
                header('Location:../register.php');
            }
        } else {
            $_SESSION['message'] = 'passwords do not match';
            header('Location:../register.php');
            // echo "passwords do not match";   
        }
    }
} else if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $login_query = "SELECT * from users where email='$email' AND password='$password'";
    $login_query_run = mysqli_query($con, $login_query);
    if (mysqli_num_rows($login_query_run) > 0) {
        $_SESSION['auth'] = true;
        $userdata = mysqli_fetch_array($login_query_run);
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];
        $_SESSION['auth_user'] = [
            'name' => $username,
            'email' => $useremail
        ];
        $_SESSION['role_as'] = $role_as;
        if ($role_as == 1) {
            $_SESSION['message'] = "Logged in successfully";
            header('Location:../index.php');
        }else{
            $_SESSION['message'] = "Logged in successfully";
            header('Location:../server.php');
        }
        
    } else {
        $_SESSION['message'] = 'Email or password is incorrect';
        header('Location:../login.php');
    }
}
