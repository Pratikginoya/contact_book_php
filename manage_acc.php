<?php
include_once 'connection.php';

if(!isset($_SESSION['session']))
{	
	header('location:index.php');
}

$id = $_SESSION['session'];

$sql_select = "select * from `user1` where `ID`='$id'";
$data = mysqli_query($con,$sql_select);

if (isset($_GET['e_id']))
{
	$_SESSION['edit'] = mysqli_fetch_assoc($data);

	header("location:edit.php");
}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manage_Account</title>
	<link rel="stylesheet" type="text/css" href="css/manage_accc.css">
</head>
<body>
<form method="post">
<table border="0" align="center" class="div1">

<?php while ($row=mysqli_fetch_assoc($data)) { ?>
	<tr>
		<td colspan="2" align="center" width="400" class="div3" height="200">
			<div class="div2">
					<img class="img" src="css/12.png">
			</div>
			<div>
				<h2 align="center"><?php echo $row['Name']; ?> </h2>
				<p class="p1" align="center"><?php echo $row['City']; ?> </p>
			</div>
		</td>
	</tr>
	<tr><td height="7"></td></tr>
	<tr>
		<td colspan="2" class="div4"><?php echo $row['Name']; ?> </td>
	</tr>
	<tr><td height="7"></td></tr>
	<tr>
		<td colspan="2" class="div5"><?php echo $row['Email']; ?> </td>
	</tr>
	<tr><td height="7"></td></tr>
	<tr>
		<td colspan="2" class="div7"><?php echo $row['City']; ?> </td>
	</tr>
	<tr><td height="20"></td></tr>
	<tr>
		<td><a href="manage_acc.php?e_id=<?php echo $row['ID']; ?>" class="button">Edit</a></td>
		<td><a href="website_home.php" class="button">Home</a></td>
	</tr>
<?php } ?>

</table>
</form>
</body>
</html>




