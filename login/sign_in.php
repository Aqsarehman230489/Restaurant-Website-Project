<?php
 $id = $_POST['ID'];
 $user_name = $_POST['User_Name'];
 $email = $_POST['Email'];
 $password = $_POST['Password'];
 $con = mysqli_connect("localhost", "root", "", "sign_in");

 $q = "INSERT INTO `signin`(`id`, `user name`, `email`, `password`) VALUES ('$id','$user_name','$email',$password)";

mysqli_query($con,$q);
?>

