<?php 
include_once 'connection.php';

if(!isset($_SESSION['session']))
{	
	header('location:index.php');
}

$ids = $_SESSION['session'];

if (isset($_GET['e_id']))
{
	$id = $_GET['e_id'];
	$sql_select = "select * from `contact` where `ID`='$id'";
	$dataa = mysqli_query($con,$sql_select);
	$_SESSION['edit'] = mysqli_fetch_assoc($dataa);

	header("location:edit_contact.php");
}

if (isset($_GET['d_id']))
{
	$id = $_GET['d_id'];

	$sql_delete = "delete from `contact` where `ID`='$id'";
	mysqli_query($con,$sql_delete);
	header("location:search.php");
}

if (isset($_GET['page_no'])) {
	$page_no=$_GET['page_no'];
}
else{
	$page_no=1;
}

$limit = 3;

$start = ($page_no-1)*$limit;

$search = $_SESSION['search'];

$sql_like_select = "select * from `contact` where `UserID`='$ids' and `Name` like '%$search%'";
$data_count = mysqli_query($con,$sql_like_select);
$total_contact = mysqli_num_rows($data_count);

$total_page = ceil($total_contact/$limit);

$sql_select = "select * from `contact` where `UserID`='$ids' and `Name` like '%$search%' limit $start,$limit";
$data = mysqli_query($con,$sql_select);

if (isset($_GET['search'])) {

	$_SESSION['search'] = $_GET['search_text'];

	header("location:search.php");
}

$previous = $page_no-1;
$next = $page_no+1;

if (isset($_POST['delete'])) {
	
	$checkbox = $_POST['check_box'];
	$checkbox_id = implode(',' , $checkbox);

	$sql_delete_check = "delete from `contact` where `ID`='$checkbox_id'";
	mysqli_query($con,$sql_delete_check);

	header("location:search.php");

}

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search_contact</title>
	<link rel="stylesheet" type="text/css" href="css/search.css">
</head>
<body>

	<table class="body" border="0">

		<tr>
			<td align="center" colspan="5" style="font-size: 28px; font-weight: 900;" height="100"> Searched Contacts </td>
		</tr>
		<tr><td height="20"></td></tr>
<form method="post">
		<tr>
			<td></td>
			<td colspan="3"><input type="text" name="search_text" placeholder="Enter Name to Search..." required class="search"></td>
			<td><input type="submit" name="search" value="Search" class="button"></td>
		</tr>
</form>

<form method="post">
		<tr><td height="40"></td></tr>
		<tr>
			<th align="center"><input type="submit" name="delete" value="Delete" class="submit"> </th>
			<th class="inputA">Name</th>
			<th class="inputA">Contact No</th>
			<th class="inputA"></th>
			<th class="inputA"></th>
		</tr>

	<?php while ($row = mysqli_fetch_assoc($data)) { ?>	
		
		<tr>
			<td align="center"><input type="checkbox" name="check_box[]" value="<?php echo $row['ID'] ?>"> </td>
			<td ><div class="inputB"><?php echo $row['Name']; ?></div></td>
			<td align="center" ><div class="inputC"><?php echo $row['Contact']; ?></div></td>
			<td align="center"><a href="search.php?e_id=<?php echo $row['ID']; ?>" class="button">Edit</a> </td>
			<td align="center"><a href="search.php?d_id=<?php echo $row['ID']; ?>" class="button">Delete</a> </td>
		</tr>

	<?php } ?>

	<?php if ($total_contact == 0) { ?>
		
		<tr><td height="30"></td></tr>
		<tr>
			<td colspan="5" align="center" class="no_data">No data found</td>
		</tr>

	<?php } ?>
</form>

		<tr><td height="60"></td></tr>
		<tr>
			<td colspan="5" align="center"><a href="view_contact.php" class="button3"> Back to View Contact </a></td>
		</tr>
		<tr><td colspan="5" align="center" style="font-size: 15px; color: black;" height="100">-------- OR -------</td></tr>
		<tr>
			<td colspan="5" align="center"><a href="website_home.php" class="button2"> Back to Home </a></td>
		</tr>
		<tr>
			<td></td>

			<td colspan="4" align="center" class="pages">
				<?php if ($page_no>1) { ?>
				<a href="search.php?page_no=<?php echo $previous; ?>"><?php echo "Previous"; ?></a>
				<?php } ?>

				<?php for ($i=1; $i <=$total_page ; $i++) { ?>
				<a href="search.php?page_no=<?php echo $i; ?>"><?php echo $i; ?></a> &nbsp;
				<?php } ?>

				<?php if ($page_no<$total_page) { ?>
				<a href="search.php?page_no=<?php echo $next; ?>"><?php echo "Next"; ?></a>
				<?php } ?>
			</td>

			<td></td>
		</tr>
	</table>
</body>
</html>