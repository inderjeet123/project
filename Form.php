<html>
<head>
<title>
For Seller ad
</title>
</head>
<body>
<center>
<div>
<b>
<?php
session_start();
if(isset($_SESSION['message']))
{
	if($_SESSION['message'] == "yes")
	{
		echo "An email has been sent";
		echo "<script>";
		echo "alert('thanks for contacting admin')";
		echo "</script>";
	}
	else
	{
		echo "error in sending email";
	}
	session_destroy();
}
?>
</b>
</div>
<br>
<form method="post" name="form1">
<table border="1">
<tr>
<th colspan="2">
Get Free Report Now !
</th>
</tr>
<tr>
<td>
Full Name
</td>
<td>
Your Email
</td>
</tr>
<tr>
<td>
<input type="text" name="Fname" value="<?php 
	if(isset($_POST['submit']))
	{
		echo $_POST['Fname'];
	}
	?>" />
<div name="FnameError">
<b>
<?php
	if(isset($_POST['submit']))
	{
		if(validateFullname($_POST['Fname']))
		{
			echo "";
		}
		else if($_POST['Fname'] == "")
		{
			echo "Full name is required";
		}
		else
		{
			echo "please enter a valid full name";
		}		
	}
?>
</b>
</div>
</td>
<td>
<input type="text" name="email" value="<?php
	if(isset($_POST['submit']))
	{
		echo $_POST['email'];
	}
?>"/>
<div name="emailError">
<b>
<?php
	if(isset($_POST['submit']))
	{
		if(validateEmail($_POST['email']))
		{
			echo "";			
		}
		else if($_POST['email'] == "")
		{
			echo "email is required";
		}
		else
		{
			echo "please enter a valid email id";
		}
	}
?>
</b>
</div>
</td>
</tr>
<tr>
<td>
Phone
</td>
<td>
Street Address
</td>
</tr>
<tr>
<td>
<input type="text" name="phone" value="<?php
	if(isset($_POST['submit']))
	{
		echo $_POST['phone'];
	}
	
?>"/>
<div name="phoneError">
<b>
<?php
	if(isset($_POST['submit']))
	{
		if(validatePhone($_POST['phone']))
		{
			echo "";
		}
		else if($_POST['phone'] == "")
		{
			echo "phone number is required";
		}
		else
		{
			echo "please enter a valid phone number";
		}
	}
?>
</b>
</div>
</td>
<td>
<input type="text" name="Saddress" value="<?php 
	if(isset($_POST['submit']))
	{
		echo $_POST['Saddress'];
	}
?>" />
<div id="addressError">
<b>
<?php 
	if(isset($_POST['submit']))
	{
		if($_POST['Saddress'] == "")
		{
			echo "Street Address is required";
		}
	}
?>
</b>
</div>
</td>
</tr>
<tr>
<td>
City
</td>
<td>
State
</td>
</tr>
<tr>
<td>
<input type="text" name="city" value="<?php
	if(isset($_POST['submit']))
	{
		echo $_POST['city'];
	}
?>" />
<div name="cityError">
<b>
<?php
	if(isset($_POST['submit']))
	{
		if(validateCity($_POST['city']))
		{
			echo "";
		}
		else if($_POST['city'] == "")
		{
			echo "city is required";
		}
		else
		{
			echo "please enter a valid city name";
		}
	}
?>
</div>
</td>
<td>
<input type="text" name="state" value="<?php
	if(isset($_POST['submit']))
	{
		echo $_POST['state'];
	}
?>" />
<div name="stateError">
<b>
<?php
		if(isset($_POST['submit']))
		{
			if(validateState($_POST['state']))
			{
				echo "";
			}
			else if($_POST['state'] == "")
			{
				echo "state is required";
			}
			else
			{
				echo "please enter a valid state name";
			}
		}
?>
</b>
</div>
</td>
</tr>
<tr>
<td>
Human Verification: 
</td>
<td>
<img src="captcha1.php" />
</td>
</tr>
<tr>
<td>
Enter the Code:
</td>
<td>
<input type="text" name="code" id="code">
<div id="captchaError">
<b>
<?php
if(isset($_POST['submit']))
{
	echo "1=".$_POST['code'];
	echo "2=".$_SESSION['6_letters_code'];
	if($_POST['code'] != $_SESSION['6_letters_code'])
	{
		echo "please enter a valid code";
	}
}
?>
</div>
</td>
</tr>
<tr>
<td colspan="2">
Required Terms:
<input type="checkbox" name="check"
<?php
if(isset($_POST['submit']))
{
	if(isset($_POST['check']))
	{
		echo " checked";
	}
}
?>
>
<div id="checkError">
<b>
<?php
if(isset($_POST['submit']))
{
	if(!isset($_POST['check']))
	{
		echo "Please accept the terms by checking the checkbox";
	}
}
?>
</b>
</div>
</td>
</tr>
<tr>
<td colspan="2">
I agree to receive the free report(s) & understand that I may be contacted. (I'm free to opt-out at any time). 
</td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="submit" value="Submit Form" />
</td>
</tr>
</table>
</form>
<?php
if(isset($_POST['submit']))
{
	if(validateFullname($_POST['Fname']) and validatePhone($_POST['phone']) and validateCity($_POST['city']) and validateState($_POST['state']) and validateEmail($_POST['email']) and isset($_POST['check'])  and $_SESSION['6_letters_code'] == $_POST['code'])
	{
		actionDone($_POST);	
	}
}
function validateFullname($fName)
{
	if(preg_match("/^[A-Za-z]+$/",$fName))
	{
		return true;
		//$error['Fname']="please enter a valid first name";
	}
	else
	{
		return false;
	}
}

function validatePhone($phone)
{
	if(preg_match("/^[0-9]+$/",$phone))
	{
		return true;
	}
	else
	{
		return false;
	}
}
	
function validateCity($city)
{
	if(preg_match("/^[A-Za-z]+$/",$city))
	{
		return true;
	}
	else
	{
		return false;
	}
}
function validateState($state)
{
	if(preg_match("/^[A-Za-z]+$/",$state))
	{
		return true;
	}
	else
	{
		return false;
	}
}
function validateEmail($email)
{
	if(preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/",$email))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function actionDone($_POST)
{
$fullName=$_POST['Fname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$Saddress=$_POST['Saddress'];
$city=$_POST['city'];
$state=$_POST['state'];
validateForm($_POST);
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
	$_SESSION['message']="yes";
}		
else
{
	$_SESSION['message']="no";
}
header("Location:Form.php");
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
</center>
</body>
</html>


