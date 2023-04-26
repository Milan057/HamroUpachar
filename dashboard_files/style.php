<?php
include('error.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php
include ('../Fonts/roboto.php');
	?>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<style> 
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
					<a href="dashboard.php" class="active"><span class="las la-adjust"></span>
						<span>Dashboard</span></a>
				</li>
				<li>
					<a href="Service.php"><span class="las la-clipboard-list"></span>
						<span>Service</span></a>
				</li>
				<li>
					<a href="adddoctor.php"><span class="las la-user-nurse"></span>
						<span>Doctor</span></a>
				</li>
				<li>
					<a href="addnotices.php"><span class="las la-list"></span>
						<span>Notices</span></a>
				</li>
				<li>
					<a href="detail.php"><span class="las la-clipboard-list"></span>
						<span>Details</span></a>
				</li>
				<li>
					<a href="#"><span class="las la-cog"></span>
						<span>Setting</span></a>
						<div class="sidebar-menu-try">
						<ul>
							<li><a href="changepassword.php">ChangePassword</a></li>
							<li><a href="changephoto.php">UploadPhoto</a></li>
							<li> <a href="logout.php">Logout</a></li>
						</ul>
						</div>
				</li>

			</ul>
		</div>

	</div>
</body>
</html>