<?php
$sever="localhost";
$usename="root";
$pasword="";
$dbnam="webproject";

$con = mysqli_connect($sever,$usename,$pasword,$dbnam);
if(!$con)
{
    echo"connected";
}
$id=$_POST['id'];
$name=$_POST['new_user_name'];
$email=$_POST['new_email'];
$password=$_POST['new_password'];

$sql="INSERT INTO `log_in`(`id`, `New_user_name`, `New_email`, `New_password`) VALUES
 ('$id','$name','$email','$password')";


echo "INSERT INTO `log_in`(`id`, `New_user_name`, `New_email`, `New_password`) VALUES
 ('$id','$name','$email','$password')";


 $result=mysqli_query($con,$sql);
?>



