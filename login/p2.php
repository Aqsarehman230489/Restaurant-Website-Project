<?php
 $Id = $_POST['id'];
 $Newusername = $_POST['new_user_name'];
 $Newpassword = $_POST['new_password'];
 $Newemail = $_POST['new_email'];
 $con = mysqli_connect("localhost", "root", "", "google_class_room");

 $q = "INSERT INTO sign_in ( ID, New_user_name,New_password,New_email) VALUES ('$Id','$Newusername',' $Newpassword','$Newemail')";

mysqli_query($con,$q);
?>

 <html>
<body>
<form method="POST">
    <input type="text" name="id">
    <input type="text" name="new_user_name">
    <input type="text" name="new_password">
    <input type="text" name="new_email">
    <input type="submit" name="sub">
</form>
</body>


