<?php 
$host="localhost";
$username="elua";
$password="bugingo111";
$database="ecommerce";
$con=mysqli_connect($host,$username,$password,$database);
if(!$con)
{
    die("connection failed:".mysqli_connect_error());
}else{
    echo "connected successfully";
}

?>