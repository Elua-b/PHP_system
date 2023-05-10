<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/css//boostrap.min.css" rel="stylesheet">

</head>

<body>
    <script src="assets/js/jquery-3.6.4.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php  

if(isset($_SESSION['auth'])){
    $_SESSION['message'] = "You are already logged in";
    header('location: server.php');
    exit();
}
?>
<?php
session_start();
include('navbar.php');

?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if (isset($_SESSION['message'])) { ?>
                    
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey !</strong> <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php unset($_SESSION['message']); } ?>
                <div class="card">
                    <div class="card-header">
                        <h2>Login form</h2>


                    </div>
                    <div class="card-body">
                        <form action="./functions/authCode.php" method="POST">
                           
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter your email" id="exampleInputEmail1" aria-describedby="emailHelp">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter your password" id="exampleInputPassword1">
                            </div>
                            

                            <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>