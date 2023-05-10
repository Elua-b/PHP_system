<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="assets/css//boostrap.min.css" rel="stylesheet">
</head>

<body>

    <script src="assets/js/jquery-3.6.4.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php include('navbar.php');
session_start();
?>
<?php if (isset($_SESSION['message'])) { ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey !</strong> <?= $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php unset($_SESSION['message']);
} ?>
<h1>hello world</h1>