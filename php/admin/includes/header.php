<?php
error_reporting(0);
session_start();
if ($_COOKIE["auth"] != "admin_in") {
	header("location:" . "./");
}
include("includes/connect.php");
include("includes/data.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="@housamz">

	<meta name="description" content="Mass Admin Panel">
	<title>Aarambha Admin Panel</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-h21C2fcDk/eFsW9sC9h0dhokq5pDinLNklTKoxIZRUn3+hvmgQSffLLQ4G4l2eEr" crossorigin="anonymous">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="includes/style.css">
	<link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
	<!--[if lt IE 9]>
					<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
					<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
				<![endif]-->
</head>

<body>

	<div class="wrapper">
		<!-- Sidebar Holder -->
		<nav id="sidebar" class="bg-primary" style="background-color: white;">
			<div class="sidebar-header" style="text-align: center; background-color:#913d88">
				<h3 style="color: white;font-weight: 900; opacity: 0.2px;">
					Aarambha Admin<br>
					<!-- <i id="sidebarCollapse" class="glyphicon glyphicon-circle-arrow-left"></i> -->
				</h3>
				<img src="https://cdn-icons-png.flaticon.com/512/6489/6489458.png" alt="icon" height="100px">
				<h3 style="color: white;font-weight: 900;">
					Dashboard

				</h3>

			</div><!-- /sidebar-header -->

			<!-- start sidebar -->
			<ul class="list-unstyled components">
				<li class="list-group-item list-group-item-action"><a href="home.php" style="color: black;"> <img src="https://cdn-icons-png.flaticon.com/512/3408/3408591.png" class="pull-left" height="20px" width="20px">
						&nbsp;&nbsp;&nbsp; Dashboard</span>
					</a>
				</li>
				<!-- <li>
					<a href="home.php" aria-expanded="false">
						<i class="glyphicon glyphicon-home"></i>
						Home
					</a>
				</li> -->
				<li class="list-group-item list-group-item-action"><a href="attendence.php" style="color: black;"> <img src="https://cdn-icons-png.flaticon.com/512/3125/3125856.png" class="pull-left" height="20px" width="20px">
						&nbsp;&nbsp;&nbsp; Attendence</span><span class="pull-right"><?= counting("attendence", "id") ?></span>
					</a>
				</li>
				<!-- <li><a href="attendence.php"> <i class="glyphicon glyphicon-magnet"></i>Attendence <span class="pull-right"><?= counting("attendence", "id") ?></span></a></li> -->
				<li class="list-group-item list-group-item-action"><a href="department.php" style="color: black;"> <img src="https://cdn-icons-png.flaticon.com/512/1570/1570970.png" class="pull-left" height="20px" width="20px">&nbsp;&nbsp;&nbsp; Department <span class="pull-right"><?= counting("department", "id") ?></span></a></li>
				<li class="list-group-item list-group-item-action"><a href="interns.php" style="color: black;"><img src="https://cdn-icons-png.flaticon.com/512/5351/5351253.png" class="pull-left" height="20px" width="20px">&nbsp;&nbsp;&nbsp; Interns <span class="pull-right"><?= counting("interns", "id") ?></span></a></li>
				<li class="list-group-item list-group-item-action"><a href="profile.php" style="color: black;"><img src="https://cdn-icons-png.flaticon.com/512/1144/1144709.png" class="pull-left" height="20px" width="20px">&nbsp;&nbsp;&nbsp; Profile <span class="pull-right"><?= counting("profile", "id") ?></span></a></li>
				<li class="list-group-item list-group-item-action"><a href="resources.php" style="color: black;"><img src="https://cdn-icons-png.flaticon.com/512/5966/5966044.png" class="pull-left" height="20px" width="20px">&nbsp;&nbsp;&nbsp; Resources <span class="pull-right"><?= counting("resources", "id") ?></span></a></li>
				<li class="list-group-item list-group-item-action"><a href="types.php" style="color: black;"><img src="https://cdn-icons-png.flaticon.com/512/439/439150.png" class="pull-left" height="20px" width="20px">&nbsp;&nbsp;&nbsp; Types <span class="pull-right"><?= counting("types", "id") ?></span></a></li>
				<li class="list-group-item list-group-item-action"><a href="users.php" style="color: black;"><img src="https://cdn-icons-png.flaticon.com/512/1165/1165674.png" class="pull-left" height="20px" width="20px">&nbsp;&nbsp;&nbsp; Users <span class="pull-right"><?= counting("users", "id") ?></span></a></li>
				<li class="list-group-item list-group-item-action"><a href="logout.php" style="color: black;"><img src="https://cdn-icons-png.flaticon.com/512/6568/6568636.png" class="pull-left" height="20px" width="20px">&nbsp;&nbsp;&nbsp; Logout</a></li>
			</ul>

			<!-- <div class="visit">
				<p class="text-center">Created using MAGE &hearts;</p>
				<a href="https://github.com/housamz/php-mysql-admin-panel-generator" target="_blank">Visit Project</a>
			</div> -->
		</nav><!-- /end sidebar -->

		<!-- Page Content Holder -->
		<div id="content">