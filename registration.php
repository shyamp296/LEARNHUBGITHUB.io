<?php 

session_start();


$con=mysqli_connect('localhost','root');

if ($con) 
  {
		echo "connection successful";
  }
else
	{
		echo "no connection";
	}

 mysqli_select_db($con,'dsddb');
 $name=$_POST['name'];
 $pass=$_POST['password'];
 $email=$_POST['email'];

 $q="select * from login where username='$name' && password='$pass'";

 $result=mysqli_query($con,$q);
 $num=mysqli_num_rows($result);
 if ($num==1)
  {
 	"duplicate data";
 	header('location:signup.html');
 }
 else
 {
 	$qy="insert into login(username,password,email) values('$name','$pass','$email')";
        $email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
}
 	mysqli_query($con,$qy);
 	echo "inserted";
 	header('location:login.php');
 }





 ?>