<?php 
include_once 'connection.php';


if($_SESSION['contact_book_otp']!="")
{
	$sent_opt = $_SESSION['contact_book_otp'];
	$msg="";

	if(isset($_POST['verify_otp']))
	{
		$enter_otp = $_POST['opt'];

		if($sent_opt==$enter_otp)
		{
			header("location:for_pass_change.php");
			$_SESSION['contact_book_otp'] = "";
		}
		else
		{
			$msg = '<tr><td width="350" height="30"><br></td></tr>

				<tr><td width="350" height="30" class="msg">You have entered wrong OTP..! Kindly enter OTP which is sent to your email....</td></tr>';
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
					<tr><td width="350" height="40" class="fontE">Enter 6 digit OTP, Which is sent to your registered Email ID... <br></td></tr>

					<?php echo $msg; ?>
					<tr><td width="350" height="30"><br></td></tr>

					<tr>
						<!-- <td class="fontB">Email : </td> -->
						<td><input type="text" name="opt" placeholder="Enter 6 digit OTP" maxlength="6" size="40" class="input" required></td>
					</tr>

					<tr><td width="390" height="30"><br></td></tr>

					<tr>
						<td colspan="2" align="center"><input type="submit" name="verify_otp" value="Verify OTP" class="submit"></td>
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



