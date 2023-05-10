 <?php
if(isset($_SESSION['auth'])){
    if($_SESSION['role_as'] !=1){
        $_SESSION['message'] = "You are not allowed to access this page";
        header('Location:../server.php');
    }

}else{
    $_SESSION['message'] = "login to continue";
    header('Location:./index.php');
}

?> 