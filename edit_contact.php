<?php 
include_once 'connection.php';

if(!isset($_SESSION['session']))
{	
	header('location:index.php');
}

if (isset($_GET['e_id']))
{
	$id = $_GET['e_id'];
	$sql_select = "select * from `contact` where `ID`='$id'";
	$dataa = mysqli_query($con,$sql_select);
	$row = mysqli_fetch_assoc($dataa);
}

if (isset($_POST['save']))
{
	$name = $_POST['name'];
	$contact = $_POST['contact'];

	$sql_update = "update `contact` set `Name`='$name',`Contact`='$contact' where `ID`='$id'";
	mysqli_query($con,$sql_update);

	if (isset($_GET['search_text'])) 
	{
		$search_text = $_GET['search_text'];

		header("location:view_contact.php?search_text=$search_text&search=Search");
	}
	else
	{
		header("location:view_contact.php");
	}
}


 ?>


 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add_contact</title>
	<link rel="stylesheet" type="text/css" href="css/edit_contactt.css">
</head>
<body>
	<form method="post">
	<table class="div1" border="0">
		<tr>
			<td align="center" colspan="2" style="font-size: 28px; font-weight: 900;" height="100"> Edit Below Contact Details </td>
		</tr>
		<tr><td height="40"></td></tr>
		<tr>
			<td class="inputB">Name : </td>
			<td><input type="text" name="name" placeholder="Edit Name of Contact" maxlength="40" class="input" required value="<?php echo @$row['Name']; ?>"></td>
		</tr>

		<tr>
			<td class="inputB">Contact No : </td>
			<td><input type="text" name="contact" maxlength="10" placeholder="Edit Contact Number" class="input" required value="<?php echo @$row['Contact']; ?>"></td>
		</tr>

		<tr><td height="80"></td></tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="save" value="Submit" class="button"></td>
		</tr>
		<tr><td colspan="2" align="center" style="font-size: 15px; color: #a8a8a8;" height="100">-------- OR -------</td></tr>
		<tr>
			<td colspan="2" align="center"><a href="view_contact.php" class="button2"> Back to View Contact </a></td>
		</tr>

		
	</table>
	</form>
</body>
</html>