<?php 
include_once 'connection.php';

if(!isset($_SESSION['session']))
{	
	header('location:index.php');
}

$id = $_SESSION['session'];

if (isset($_GET['d_id']))
{
	$id = $_GET['d_id'];

	$sql_delete = "delete from `contact` where `ID`='$id'";
	mysqli_query($con,$sql_delete);
	
	if (isset($_GET['search_text'])) 
	{
		$search_text_d = $_GET['search_text'];

		header("location:view_contact.php?search_text=$search_text_d&search=Search");
	}
	else
	{
		header("location:view_contact.php");
	}
}


$sql_count_select = "select * from `contact` where `UserID`='$id'";
$data_count = mysqli_query($con,$sql_count_select);
$total_contact = mysqli_num_rows($data_count);

$limit = 3;

$total_page = ceil($total_contact/$limit);

if (isset($_GET['page_no'])) {
	$page_no=$_GET['page_no'];
}
else{
	$page_no=1;
}

$start = ($page_no-1)*$limit;

$sql_select = "select * from `contact` where `UserID`='$id' limit $start,$limit";
$data = mysqli_query($con,$sql_select);

$previous = $page_no-1;
$next = $page_no+1;


if (isset($_GET['search_text']))
{
	$srch_txt = $_GET['search_text'];
	
	$sql_srch_search = "select * from `contact` where `UserID`='$id' and `Name` like '%$srch_txt%'";
	$data_count_search = mysqli_query($con,$sql_srch_search);
	$total_contact_search = mysqli_num_rows($data_count_search);

	$total_page_search = ceil($total_contact_search/$limit);

	if (isset($_GET['page_no_s']))
	{
		$page_no_search=$_GET['page_no_s'];
	}
	else
	{
		$page_no_search=1;
	}

	$limit = 3;

	$start_search = ($page_no_search-1)*$limit;

	$sql_select_search = "select * from `contact` where `UserID`='$id' and `Name` like '%$srch_txt%' limit $start_search,$limit";
	$data = mysqli_query($con,$sql_select_search);

	$previous_search = $page_no_search-1;
	$next_search = $page_no_search+1;
	
}


if (isset($_POST['delete']))
{
	$checkbox = $_POST['checkbox'];
	$chk_length = count($checkbox);

	for($i=0; $i<$chk_length; $i++)
	{
		$checkbox_id = $checkbox[$i];

		$sql_delete_check = "delete from `contact` where `ID`='$checkbox_id'";
		mysqli_query($con,$sql_delete_check);
	}
	
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
	<title>View_contact</title>
	<link rel="stylesheet" type="text/css" href="css/view_contacts.css">
</head>
<body>

	<table cellpadding="0" cellspacing="0" class="body" border="0" width="100%">

		<tr>
			<td align="center" colspan="5" style="font-size: 28px; font-weight: 900;" height="50"> View or Manage Your Contact Book </td>
		</tr>
		<tr><td height="40"></td></tr>

	<form method="get">
			<tr>
				<td></td>
				<td colspan="3"><input type="text" name="search_text" placeholder="Enter Name to Search..." required class="search"></td>
				<td><input type="submit" name="search" value="Search" class="button"></td>
			</tr>
	</form>

	<form method="post">
		<tr><td height="40"></td></tr>
		<tr>
			<th align="center"><input type="submit" name="delete" value="Detele" class="submit"> </th>
			<th class="inputA">Name</th>
			<th class="inputA">Contact No</th>
			<th class="inputA"></th>
			<th class="inputA"></th>
		</tr>

	<?php while ($row = mysqli_fetch_assoc($data)) { ?>	
		
		<tr>
			<td align="center"><input type="checkbox" name="checkbox[]" value="<?php echo $row['ID']; ?>"> </td>
			<td ><div class="inputB"><?php echo $row['Name']; ?></div></td>
			<td align="center" ><div class="inputC"><?php echo $row['Contact']; ?></div></td>
			<td align="center"><a href="edit_contact.php?
				<?php if(isset($_GET['search_text'])){
					$search_text_d = $_GET['search_text'];

					echo 'e_id='.$row['ID'].'&search_text='.$search_text_d.'&search=Search';
				}
				else{
					echo 'e_id='.$row['ID'];
				} ?>" class="button">Edit</a> </td>
			<td align="center"><a href="view_contact.php?
				<?php if(isset($_GET['search_text'])){
					$search_text_d = $_GET['search_text'];

					echo 'd_id='.$row['ID'].'&search_text='.$search_text_d.'&search=Search';
				}
				else{
					echo 'd_id='.$row['ID'];
				} ?>" class="button">Delete</a> </td>
		</tr>

	<?php } ?>
	</form>

		<?php if (isset($_GET['search_text'])) 
		{
			if ($total_contact_search == 0) { ?>
		
				<tr>
					<td colspan="5" align="center" class="no_data">No data found</td>
				</tr>
			<?php }
		}
		else
		{
			if ($total_contact == 0) { ?>
		
					<tr>
						<td colspan="5" align="center" class="no_data">No data found</td>
					</tr>
			<?php } 
		} ?>

		<tr><td height="60"></td></tr>
		<tr>
			<td colspan="5" align="center"><a href="add_contact.php" class="button3"> Add New Contact </a></td>
		</tr>
		<tr><td colspan="5" align="center" style="font-size: 15px; color: black;" height="80">-------- OR -------</td></tr>
		<tr>
			<td colspan="5" align="center" height="50"><a href="website_home.php" class="button2"> Back to Home </a></td>
		</tr>
		<tr>
			<td colspan="5" align="center" class="pages" height="80">
				<?php if (isset($_GET['search_text']))
				{
					if ($page_no_search>1) { ?>
						<a href="view_contact.php?search_text=<?php echo $srch_txt; ?>&page_no_s=<?php echo $previous_search; ?>"><?php echo "<<"; ?></a> &nbsp;&nbsp;
						<?php } 
				} 
				else
				{
				 	if ($page_no>1) { ?>
				 		<a href="view_contact.php?page_no=<?php echo $previous; ?>"><?php echo "<<"; ?></a> &nbsp;&nbsp;
						<?php } 
				} ?>
				

				<?php if (isset($_GET['search_text'])) 
				{
					for ($i=1; $i <=$total_page_search; $i++) { ?>
						<a href="view_contact.php?search_text=<?php echo $srch_txt; ?>&page_no_s=<?php echo $i; ?>" class="
						<?php 
						if(isset($_GET['page_no_s']) && isset($_GET['search_text']))
						{
							if($_GET['page_no_s']==$i)
							{echo "active";}
						}
						if(!isset($_GET['page_no_s']) && isset($_GET['search_text']))
						{
							if($i==1)
							{echo "active";}
						} ?>"><?php echo $i; ?></a> &nbsp;
						<?php } 
				}
				else
				{
					for ($i=1; $i <=$total_page ; $i++) { ?>
						<a href="view_contact.php?page_no=<?php echo $i; ?>" class="
						<?php 
						if(isset($_GET['page_no']))
						{
							if($_GET['page_no']==$i)
							{echo "active";}
						}
						if(!isset($_GET['page_no']))
						{
							if($i==1)
							{echo "active";}
						} ?>"><?php echo $i; ?></a> &nbsp;
						<?php } 
				} ?>

				
				<?php if (isset($_GET['search_text'])) 
				{
					if ($page_no_search<$total_page_search) { ?>
						<a href="view_contact.php?search_text=<?php echo $srch_txt; ?>&page_no_s=<?php echo $next_search; ?>"><?php echo ">>"; ?></a>
						<?php }
				}
				else
				{
					if ($page_no<$total_page) { ?>
						<a href="view_contact.php?page_no=<?php echo $next; ?>"><?php echo ">>"; ?></a>
					<?php } 
				} ?>
				
			</td>
		</tr>
	</table>

</body>
</html>