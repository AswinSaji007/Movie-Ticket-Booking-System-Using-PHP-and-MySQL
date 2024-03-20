<?php
include('connection.php');
session_start();
$email = $_POST["email"];
$pass = $_POST["password"];
$qry=mysqli_query($conn,"select * from login where email='$email' and password='$pass'");
if(mysqli_num_rows($qry))
{
	$usr=mysqli_fetch_array($qry);
	if($usr['user_type']==1)
	{
		$_SESSION['logged_in']=true;
		$_SESSION['email']=$usr['email'];
			header('location:index.php');
	}
	else
	{
		
		header("location:admin/");
	}
	
}
else
{
	$_SESSION['error']="Login Failed!";
	header("location:login.php");
}
?>