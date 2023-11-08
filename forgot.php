<?php 
include_once 'connection.php';

$msg="";

if (isset($_POST['send_otp']))
{
	$email=$_POST['email'];

	$sql_select = "select * from `user1` where `Email`='$email'";
	$data = mysqli_query($con,$sql_select);
	$rowCount = mysqli_num_rows($data);

	if ($rowCount > 0)
	{	
		$row = mysqli_fetch_assoc($data);
		
		$_SESSION['pass_chng_data'] = $row;

		header("location:mail/smtp.php");
	}
	else
	{
		$msg = '<tr><td width="350" height="30"><br></td></tr>

			<tr><td width="350" height="30" class="msg">Entered email is not registered with us..! Kindly &nbsp; <a href="register_form.php">Register now (click here...)</a><br></td></tr>';
	}

}




 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="css/website_loginss.css">
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
					<tr><td width="350" height="40" class="fontE">Enter Your Email ID, Which is registered with us... <br></td></tr>

					<?php echo $msg; ?>
					<tr><td width="350" height="30"><br></td></tr>

					<tr>
						<!-- <td class="fontB">Email : </td> -->
						<td><input type="email" name="email" placeholder="Email" size="35" class="input" required></td>
					</tr>

					<tr><td width="390" height="30"><br></td></tr>

					<tr>
						<td colspan="2" align="center"><input type="submit" name="send_otp" value="Send OTP" class="submit"></td>
					</tr>

					<tr><td><br></td></tr>

					<tr>
						<td colspan="2" align="center" style="font-size: 15px; color: #a8a8a8;">----------- OR -----------</td>
					</tr>

					<tr><td><br></td></tr>

					<tr>
						<td colspan="2" height="30" align="center"><a href="index.php" class="fontC">Back To Login</a></td>
					</tr>

					<tr><td width="350" height="203" class="fontF" align="center" valign="bottom">Welcome to PR's CONTACT BOOK<br></td></tr>
				</table>	
				</form>
			</div>
		</td>
	</tr>
</table>
</body>
</html>



