<?php
session_start();
include('error.php');
include('../connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php
include ('../Fonts/roboto.php');
	?>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"> 
	<title>Hamro Upachar</title>
	<style type="text/css">
		<?php
include('style1.php');

		?>
	</style>
</head>
<body>

	<div class="sidebar">
		<div class="sidebar-brand">
        <a href=""><img src="hamro_upachar.jpg"></a>
        <!-- <span style="color:white;font-size:30px;">Hamro Upachar</span> -->
			<h2><span class="lab la-hamroUpachar"></span>Hamro Upachar</h2>
			
		</div>
		<div class="sidebar-menu">
			<ul>
				<li>
					<a href="admindashboard.php" class="active"><span class="las la-adjust"></span>
						<span>Dashboard</span></a>
				</li>
				<li>
					<a href="list.php"><span class="las la-list"></span>
						<span>Hospital List</span></a>
				</li>
				<li>
					<a href="newentry.php"><span class="las la-adjust"></span>
						<span>New Entry</span></a>
				</li>
				<li>
					<a href="addfirstaids.php"><span class="las la-list"></span>
						<span>Firstaids</span></a>
				</li>
				<li>
					<a href="logout.php"><span class="las la-adjust"></span>
						<span>Logout</span></a>
				</li>
			</ul>
		</div>

	</div>
</body>
</html>