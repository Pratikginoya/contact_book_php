<?php
include_once 'connection.php';

if(!isset($_SESSION['session']))
{	
	header('location:index.php');
}

$id = $_SESSION['session'];
$msg="";
$msg2="";

if(isset($_POST['save']))
{
	$current_pass = $_POST['curr_pass'];
	$new_pass = $_POST['password'];
	$new_pass2 = $_POST['password2'];

	$sql_select = "select * from user1 where ID='$id' and Password='$current_pass'";
	$data = mysqli_query($con,$sql_select);
	$count = mysqli_num_rows($data);

	if($count>0)
	{
		if($new_pass==$new_pass2)
		{
			if($new_pass==$current_pass)
			{
				$msg2="";
				$msg = "<td colspan='2' class='fontE'>&nbsp;&nbsp; You have already used this Password last time....! Kindly enter anothyer password </td>";
			}
			else
			{
				$sql_update = "update user1 set Password='$new_pass' where ID='$id'";
				mysqli_query($con,$sql_update);

				$msg="";
				$msg2 = "<td colspan='2' class='fontZ'>&nbsp;&nbsp; Your password has been changed succesfully...!</td>";

			}
		}
		else
		{
			$msg2 = "";
			$msg = "<td colspan='2' class='fontE'>&nbsp;&nbsp; Re-entered new password is not match...! </td>";
		}
	}
	else
	{
		$msg2="";
		$msg = "<td colspan='2' class='fontE'>&nbsp;&nbsp; Entered Current password is not match....! Kindly enter correct Current password.... </td>";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit_Page</title>
	<link rel="stylesheet" type="text/css" href="css/editss.css">
</head>
<body>

<form method="post">
	<table class="div1" border="0">

		<tr>
			<?php echo $msg; ?>
			<?php echo $msg2; ?>
		</tr>

		<tr><td width="350" height="30"><br></td></tr>

		<tr>
			<td class="inputB">Current Password : </td>
			<td><input type="password" name="curr_pass" placeholder="Enter Current Password" minlength="5" maxlength="10" size="35" class="input" required></td>
		</tr>

		<tr><td width="350" height="10"><br></td></tr>

		<tr>
			<td class="inputB">New Password : </td>
			<td><input type="password" name="password" placeholder="Enter New Password (5 to 10 digit)" minlength="5" maxlength="10" size="35" class="input" required></td>
		</tr>

		<tr><td width="350" height="10"><br></td></tr>

		<tr>
			<td class="inputB">Re-Enter New Password : </td>
			<td><input type="password" name="password2" placeholder="Re-Enter New Password (5 to 10 digit)" minlength="5" maxlength="10" size="35" class="input" required></td>
		</tr>

		<tr><td width="350" height="50"><br></td></tr>

		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="save" value="Submit" class="button">
			</td>
		</tr>
		<tr><td width="350" height="20"><br></td></tr>
		<tr>
			<td colspan="2" align="center">
				<a href="website_home.php" class="button">Back to Home</a>
			</td>
		</tr>
	</table>	
</form>

</body>
</html>

