<?php
include_once 'connection.php';

if(!isset($_SESSION['session']))
{	
	header('location:index.php');
}

$row = $_SESSION['edit'];

if (isset($_POST['save']))
{
	$id=$row['ID'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$password2=$_POST['password2'];
	$city=$_POST['city'];

	if($password == $password2)
	{
		$sql_update = "update `user1` set `Name`='$name',`Email`='$email',`Password`='$password',`City`='$city' where `ID`='$id'";
		mysqli_query($con,$sql_update);

		header("location:manage_acc.php");
	}
	else
	{
		header("location:edit2.php");
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit_Page</title>
	<link rel="stylesheet" type="text/css" href="css/edits.css">
</head>
<body>
<form method="post">
	<table class="div1" border="0">

		<tr>
			<td class="inputB">Name : </td>
			<td><input type="name" name="name" placeholder="Name" size="35" maxlength="25" class="input" value="<?php echo @$row['Name']; ?>" required></td>
		</tr>

		<tr><td width="350" height="10"><br></td></tr>

		<tr>
			<td class="inputB">Email : </td>
			<td><input type="email" name="email" placeholder="Email" size="35" class="input" value="<?php echo @$row['Email']; ?>" required></td>
		</tr>

		<tr><td width="350" height="20"><br></td></tr>

		<tr>
			<td class="inputB">City : </td>
			<td>
				<select name="city" class="inputA" required>
					<option disabled selected>-Select City-</option>
					<option
						<?php 
							if ($row['City'] == 'Ahmedabad')
							{
								echo "selected";
							}

						 ?>>Ahmedabad</option>
					<option
					<?php 
							if ($row['City'] == 'Surat')
							{
								echo "selected";
							}

						 ?>>Surat</option>
					<option
					<?php 
							if ($row['City'] == 'Vadodara')
							{
								echo "selected";
							}

						 ?>>Vadodara</option>
					<option
					<?php 
							if ($row['City'] == 'Rajkot')
							{
								echo "selected";
							}

						 ?>>Rajkot</option>
					<option
					<?php 
							if ($row['City'] == 'Bhavnagar')
							{
								echo "selected";
							}

						 ?>>Bhavnagar</option>
					<option
					<?php 
							if ($row['City'] == 'Jamnagar')
							{
								echo "selected";
							}

						 ?>>Jamnagar</option>
					<option
					<?php 
							if ($row['City'] == 'Gandhinagar')
							{
								echo "selected";
							}

						 ?>>Gandhinagar</option>
					<option
					<?php 
							if ($row['City'] == 'Junagadh')
							{
								echo "selected";
							}

						 ?>>Junagadh</option>
					<option
					<?php 
							if ($row['City'] == 'Gandhidham')
							{
								echo "selected";
							}

						 ?>>Gandhidham</option>
					<option
					<?php 
							if ($row['City'] == 'Anand')
							{
								echo "selected";
							}

						 ?>>Anand</option>
					<option
					<?php 
							if ($row['City'] == 'Navsari')
							{
								echo "selected";
							}

						 ?>>Navsari</option>
					<option
					<?php 
							if ($row['City'] == 'Morabi')
							{
								echo "selected";
							}

						 ?>>Morabi</option>
					<option
					<?php 
							if ($row['City'] == 'Nadiad')
							{
								echo "selected";
							}

						 ?>>Nadiad</option>
					<option
					<?php 
							if ($row['City'] == 'Surendranagar')
							{
								echo "selected";
							}

						 ?>>Surendranagar</option>
					<option
					<?php 
							if ($row['City'] == 'Bharuch')
							{
								echo "selected";
							}

						 ?>>Bharuch</option>
					<option
					<?php 
							if ($row['City'] == 'Mehsana')
							{
								echo "selected";
							}

						 ?>>Mehsana</option>
					<option
					<?php 
							if ($row['City'] == 'Bhuj')
							{
								echo "selected";
							}

						 ?>>Bhuj</option>
					<option
					<?php 
							if ($row['City'] == 'Porbandar')
							{
								echo "selected";
							}

						 ?>>Porbandar</option>
					<option
					<?php 
							if ($row['City'] == 'Palanpur')
							{
								echo "selected";
							}

						 ?>>Palanpur</option>
					<option
					<?php 
							if ($row['City'] == 'Valsad')
							{
								echo "selected";
							}

						 ?>>Valsad</option>
					<option
					<?php 
							if ($row['City'] == 'Vapi')
							{
								echo "selected";
							}

						 ?>>Vapi</option>
					<option
					<?php 
							if ($row['City'] == 'Gondal')
							{
								echo "selected";
							}

						 ?>>Gondal</option>
					<option
					<?php 
							if ($row['City'] == 'Veraval')
							{
								echo "selected";
							}

						 ?>>Veraval</option>
					<option
					<?php 
							if ($row['City'] == 'Godhra')
							{
								echo "selected";
							}

						 ?>>Godhra</option>
					<option
					<?php 
							if ($row['City'] == 'Patan')
							{
								echo "selected";
							}

						 ?>>Patan</option>
					<option
					<?php 
							if ($row['City'] == 'Kalol')
							{
								echo "selected";
							}

						 ?>>Kalol</option>
					<option
					<?php 
							if ($row['City'] == 'Dahod')
							{
								echo "selected";
							}

						 ?>>Dahod</option>
					<option
					<?php 
							if ($row['City'] == 'Botad')
							{
								echo "selected";
							}

						 ?>>Botad</option>
					<option
					<?php 
							if ($row['City'] == 'Amreli')
							{
								echo "selected";
							}

						 ?>>Amreli</option>
					<option
					<?php 
							if ($row['City'] == 'Deesa')
							{
								echo "selected";
							}

						 ?>>Deesa</option>
					<option
					<?php 
							if ($row['City'] == 'Jetpur')
							{
								echo "selected";
							}

						 ?>>Jetpur</option>
					<option
					<?php 
							if ($row['City'] == 'Other')
							{
								echo "selected";
							}

						 ?>>Other</option>
				</select>
			</td>
		</tr>

		<tr><td width="350" height="50"><br></td></tr>

		<tr>
			<td colspan="2" align="center"><input type="submit" name="save" value="Submit" class="button"><a href="change_pass.php" class="button">Change Password</a></td>
		</tr>
		<tr><td width="350" height="10"><br></td></tr>
		<tr>
			<td colspan="2" align="center"><a href="website_home.php" class="button">Back to Home</a></td>
		</tr>

	</table>	
</form>
</body>
</html>

