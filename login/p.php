<?php
$uname=$_POST['u_name'];
$pass=$_POST['pass'];
$con=mysqli_connect("localhost","root","","web");
//if($con){echo "connected";}else{echo "notconnected";}

$q="INSERT INTO login( u_name, pass) VALUES ('$uname','$pass')";
mysqli_query($con,$q);
//echo "INSERT INTO login( u_name, pass) VALUES ('$uname','$pass')";

?>
<html>
<body>
<form method="POST">
    <input type="text" name="u_name">
    <input type="password" name="pass">
    <input type="submit" name="sub">
</form>
</body>