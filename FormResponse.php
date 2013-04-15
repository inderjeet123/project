<?php
function actionDone($_POST)
{
$fullName=$_POST['Fname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$Saddress=$_POST['Saddress'];
$city=$_POST['city'];
$state=$_POST['state'];
validateForm($_POST);

$dbConn=mysql_connect("localhost","root","") or die("could not connect to database");
mysql_select_db("Seller",$dbConn) or die("could not select database");
$sql="insert into form(fname,email,phone,Address,city,state) values('$fullName','$email','$phone','$Saddress','$city','$state')";

if(mysql_query($sql,$dbConn))
{

$from="support@seller.com";
$subject="Test mail";
$to=$email;
$body="your full name is".$fullName."\n".
		"your email id is=".$email."\n".
		"your phone no is=".$phone."\n".
		"your Street Address is=".$Saddress."\n".
		"your city is=".$city."\n".
		"your state is=".$state;
if(mail($to,$subject,$body,"From:".$from))
{
	header("Location:home.html");
}		
else
{
	header("Location:emailError.html");
}
}
}
function validateForm($data)
{
	$error=array();
	if(!preg_match("/^[A-Za-z]+$/",$data['Fname']))
	{
		echo "please enter a valid first name";
		//$error['Fname']="please enter a valid first name";
	}
	if(!preg_match("/^[0-9]+$/",$data['phone']))
	{
		echo "please enter a valid mobile number";
		//$error['Fname']="please enter a valid phone number";
	}
	if(!preg_match("/^[A-Za-z]+$/",$data['city']))
	{
		echo "please enter a vaid city";
		//$error['Fname']="please enter a valid city";
	}
	if(!preg_match("/^[A-Za-z]+$/",$data['state']))
	{
		echo "please entera a valid state";
		//$error['Fname']="please enter a valid state";
	}
	if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/",$data['email']))
	{
		echo "please enter a valid email id";
		//$error['Fname']="please enter an email id";
	}
}
?>