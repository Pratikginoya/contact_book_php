<?php 
include_once 'connection.php';

if(!isset($_SESSION['session']))
{	
	header('location:index.php');
}

$id = $_SESSION['session'];

$sql_select = "select * from `user1` where `ID`='$id'";
$data = mysqli_query($con,$sql_select);
$row = mysqli_fetch_assoc($data);

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/website_home.css">
</head>
<body>
	<table border="0" width="100%" class="body1">
		<tr>
			<td rowspan="2" width="180" height="800" valign="top">
			<div class="td1">
				<div class="div1">
					<img class="img" src="css/12.png">
				</div>
				<div>
					<h2 align="center"><?php echo $row['Name']; ?> </h2>
					<p class="p1" align="center"><?php echo $row['City']; ?> </p>
				</div>
				<div>
					<br><br><br><br><br>
						<div class="menu"><a href="website_home.php" class="h2">Home</a></div>
						<div class="menu"><a href="add_contact.php" class="h2">Add Contact</a></div>
						<div class="menu"><a href="view_contact.php" class="h2">View Contact Book</a></div>
						<div class="menu"><a href="manage_acc.php" class="h2">Manage / Edit Account</a></div>
						<div class="menu"><a href="logout.php" class="h2">Logout</a></div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
						<h4 class="menu2">Welcome to PR INSTITUTE</h4>
				</div>
			</div>
			</td>
			<td height="280">
			<div class="main_div">
				<a href="add_contact.php"><div class="div2"><p class="p2"></p></div></a>
				<a href="view_contact.php"><div class="div3"><p class="p2"></p></div></a>
				<a href="manage_acc.php"><div class="div4"><p class="p2"></p></div></a>
			</div>
			<div class="main_div2">
				<a href="add_contact.php" class="heading">&nbsp;&nbsp; Add Contact</a>
				<a href="view_contact.php" class="heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; View Contact Book	</a>
				<a href="manage_acc.php" class="heading">&nbsp; Manage Account</a>
			</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="main_div3">
					<div class="details">
					<h1>About Add Contact</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<br>
					<hr>
					<br>
					<h1>About View Contact</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<br>
					<hr>
					<br>
					<h1>About Manage Account</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br>
					</div>
				</div>
			</td>
		</tr>
	</table>
</body>
</html>


