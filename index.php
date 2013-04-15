<html>
<head>
<title>
Login Page
</title>
</head>
<body>
<center>
<form method="post" name="form1">
<br><table id="table1" bgcolor="#3399FF" cellspacing="4"> 
<tr>
<td colspan="2">
<h1>Login Form</h1>
</td>
</tr>
<tr>
<td>
<b>Email</b>
</td>
<td>
<input type="text" name="email" value=
"<?php
if(isset($_POST['submit']))
{
	echo $_POST['email'];
}
?>"
 />
 <div id='emailError'>
 <?php
 if(isset($_POST['submit']))
 {
 	if(!preg_match($email,$_POST['email']))
	{
		echo "please enter a valid email id";
	}
 }
 ?>
 </div>
</td>
</tr>
<tr>
<td>
<b>Password</b>
</td>
<td>
<input type="password" name="password" />
</td>
</tr>
<tr>
<td>
<b>Human Verification:</b> 
</td>
<td>
<img src="captcha1.php" style="background-color:#CCCCCC" />
</td>
</tr>
<tr>
<td>
<b>Enter the Code:</b>
</td>
<td>
<input type="text" name="code" id="code">
<div id="captchaError">
<font color="#FFFFFF">
<?php
if(isset($_POST['submit']))
{
	session_start();
	if($_POST['code'] != $_SESSION['6_letters_code'])
	{
		echo "please enter a valid code";
	}
}
?>
</font>
</div>
</td>
</tr>
<tr>
<td>
<input type="submit" name="submit" value="Login">
</td>
</tr>

</table>

</form>
<?php
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$password=$_POST['password'];
		include("include/db.php");
		$password=md5($password);
		$sql="select * from users where email='$email' and password='$password'";
		$resource=mysql_query($sql,$connect) or die(mysql_error());
		if(mysql_num_rows($resource) > 0)
		{
			echo "Access Granted";
		}
		else
		{
			echo "Access not validated";
		}
	}
?>
</center>
</body>
</html>


