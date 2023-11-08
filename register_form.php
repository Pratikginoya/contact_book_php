<?php 
include_once 'connection.php';
$msg="";

if (isset($_POST['save']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$password2=$_POST['password2'];
	$city=$_POST['city'];

	if($password == $password2)
	{
		$sql_select = "select * from user1 where Email='$email'";
		$data = mysqli_query($con,$sql_select);
		$email_cnt = mysqli_num_rows($data);

		if($email_cnt>0)
		{
			$msg = '<tr><td width="350" height="30"><br></td></tr>

			<tr><td width="350" height="30" class="msg">Entered email is already registered..! Kindly enter another email...<br></td></tr>';
		}
		else
		{
			$sql_insert = "insert into user1(Name,Email,Password,City)values('$name','$email','$password','$city')";
			mysqli_query($con,$sql_insert);

			header("location:register_sucess.php");
		}
	}
	else
	{
		header("location:password_error.php");
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="css/register_form.css">
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
					<tr><td width="350" height="40" class="fontD"> Welcome... &nbsp;<img src="css/7.png" width="28" align="center"> <br></td></tr>
					<tr><td width="350" height="40" class="fontE">Enter your information to Register now....<br></td></tr>

					<?php echo $msg; ?>
					<tr><td width="350" height="30"><br></td></tr>

					<tr>
						<td><input type="name" name="name" placeholder="Name" size="35" class="input" required maxlength="30"></td>
					</tr>

					<tr><td width="350" height="10"><br></td></tr>

					<tr>
						<td><input type="email" name="email" placeholder="Email" size="35" class="input" required maxlength="30"></td>
					</tr>

					<tr><td width="350" height="10"><br></td></tr>

					<tr>
						<td><input type="password" name="password" placeholder="Password (5 to 10 digit)" maxlength="10" minlength="5" size="35" class="input" required></td>
					</tr>
					<tr><td width="350" height="30"><br></td></tr>
					<tr>
						<td><input type="password" name="password2" placeholder="Re-enter Password (5 to 10 digit)" maxlength="10" minlength="5" size="35" class="input" required></td>
					</tr>

					<tr><td width="350" height="30"><br></td></tr>

					<tr>
						<td>
							<select name="city" class="inputA" required>
								<option disabled selected>-Select City-</option>
								<option>Ahmedabad</option>
								<option>Surat</option>
								<option>Vadodara</option>
								<option>Rajkot</option>
								<option>Bhavnagar</option>
								<option>Jamnagar</option>
								<option>Gandhinagar</option>
								<option>Junagadh</option>
								<option>Gandhidham</option>
								<option>Anand</option>
								<option>Navsari</option>
								<option>Morabi</option>
								<option>Nadiad</option>
								<option>Surendranagar</option>
								<option>Bharuch</option>
								<option>Mehsana</option>
								<option>Bhuj</option>
								<option>Porbandar</option>
								<option>Palanpur</option>
								<option>Valsad</option>
								<option>Vapi</option>
								<option>Gondal</option>
								<option>Veraval</option>
								<option>Godhra</option>
								<option>Patan</option>
								<option>Kalol</option>
								<option>Dahod</option>
								<option>Botad</option>
								<option>Amreli</option>
								<option>Deesa</option>
								<option>Jetpur</option>
								<option>Other</option>
							</select>
						</td>
					</tr>

					<tr><td width="350" height="30"><br></td></tr>

					<tr>
						<td colspan="2" align="center"><input type="submit" name="save" value="Register" class="submit"></td>
					</tr>

					<tr><td><br></td></tr>

					<tr>
						<td colspan="2" align="center" style="font-size: 15px; color: #a8a8a8;">----------- OR -----------</td>
					</tr>

					<tr><td><br></td></tr>

					<tr>
						<td colspan="2" height="25" align="center"><a href="index.php" class="fontC">Back to Login</a></td>
					</tr>

					<tr><td><br></td></tr>
					<tr><td width="370" height="65" class="fontF" align="center" valign="bottom">Welcome to PR's CONTACT BOOK<br></td></tr>
				</table>	
				</form>
			</div>
		</td>
	</tr>
</table>
</body>
</html>