<?php
$server="localhost";
$username="root";
$password="";
$dbname="webproject";

$con = mysqli_connect($server,$username,$password,$dbname);
if(!$con)
{
    echo"connected";
}
$id=$_POST['idd'];
$name=$_POST['user_name'];
$email=$_POST['email'];
$password=$_POST['password'];

$sql="INSERT INTO `sign_in`(`idd`, `User_name`, `email`, `Password`) VALUES
 ('$id','$name','$email','$password')";

 $result=mysqli_query($con,$sql);
?>



e