<?php 
include_once 'connection.php';

if($_SESSION['pass_chng_data']!="")
{
	$msg="";
	$row = $_SESSION['pass_chng_data'];

	$email = $row['Email'];

	if(isset($_POST['submit']))
	{
		$password = $_POST['password'];
		$password2 = $_POST['password2'];

		if($password==$password2)
		{
			$sql_update = "update user1 set Password='$password' where Email='$email'";
			mysqli_query($con,$sql_update);

			$msg = '<tr><td width="350" height="30"><br></td></tr>

				<tr><td width="350" height="30" class="msg_d">New password set sucessfully.... Kindly click on Back to Login now.... </td></tr>';

			$_SESSION['pass_chng_data'] = "";
		}
		else
		{
			$msg = '<tr><td width="350" height="30"><br></td></tr>

				<tr><td width="350" height="30" class="msg">Re-enter password is not match..! Kindly enter same password in both....</td></tr>';
		}
	}
}
else
{
	header("location:index.php");
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="css/pass_change.css">
</head>
<body>
<table>
	<tr>
		<td rowspan="2">
			<div class="classA">
				<div class="classB"></div>
					<br>
					<h1 class="h1">KNOW YOUR &nbsp; <font class="fontA">DETAILS..!</font> </h1>
					<h1 class="u"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </h1>
			</div>
		</td>
		<td valign="top">
			<div class="classD"></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="classC">
				<form method="post">
				<table>
					<tr><td width="350" height="50" class="fontD">Hey,hello.. <img src="css/6.png" width="34" align="center"> <br></td></tr>
					<tr><td width="350" height="40" class="fontE">Enter your new password... <br></td></tr>

					<?php echo $msg; ?>
					<tr><td width="350" height="30"><br></td></tr>

					<tr>
						<td><input type="password" name="password" placeholder="New Password (5 to 10 digit)" maxlength="10" minlength="5" size="35" class="input" required></td>
					</tr>
					<tr><td width="350" height="30"><br></td></tr>
					<tr>
						<td><input type="password" name="password2" placeholder="Re-enter New Password (5 to 10 digit)" maxlength="10" minlength="5" size="35" class="input" required></td>
					</tr>

					<tr><td width="390" height="30"><br></td></tr>

					<tr>
						<td colspan="2" align="center"><input type="submit" name="submit" value="Submit" class="submit"></td>
					</tr>

					<tr><td><br></td></tr>

					<tr>
						<td colspan="2" align="center" style="font-size: 15px; color: #a8a8a8;">----------- OR -----------</td>
					</tr>

					<tr><td><br></td></tr>

					<tr>
						<td colspan="2" height="30" align="center"><a href="index.php" class="fontC">Back To Login</a></td>
					</tr>

					<tr><td width="350" height="143" class="fontF" align="center" valign="bottom">Welcome to PR's CONTACT BOOK<br></td></tr>
				</table>	
				</form>
			</div>
		</td>
	</tr>
</table>
</body>
</html>



