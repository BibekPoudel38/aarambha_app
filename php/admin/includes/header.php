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
		<nav id="sidebar" class="bg-primary" style="background-color: purple;">
			<div class="sidebar-header">
				<h3>
					Admin Panel<br>
					<i id="sidebarCollapse" class="glyphicon glyphicon-circle-arrow-left"></i>
				</h3>
				<strong>
					Aarambha<br>
					<i id="sidebarExtend" class="glyphicon glyphicon-circle-arrow-right"></i>
				</strong>
			</div><!-- /sidebar-header -->

			<!-- start sidebar -->
			<ul class="list-unstyled components">
				<li class="list-group-item list-group-item-action"><a href="home.php" style="color: black;"> <img src="assets/home.png" class="pull-left" height="20px" width="20px">
						&nbsp;&nbsp;&nbsp; HOME</span>
					</a>
				</li>
				<!-- <li>
					<a href="home.php" aria-expanded="false">
						<i class="glyphicon glyphicon-home"></i>
						Home
					</a>
				</li> -->

				<li><a href="attendence.php"> <i class="glyphicon glyphicon-magnet"></i>Attendence <span class="pull-right"><?= counting("attendence", "id") ?></span></a></li>
				<li><a href="department.php"> <i class="glyphicon glyphicon-option-vertical"></i>Department <span class="pull-right"><?= counting("department", "id") ?></span></a></li>
				<li><a href="interns.php"> <i class="glyphicon glyphicon-tree-deciduous"></i>Interns <span class="pull-right"><?= counting("interns", "id") ?></span></a></li>
				<li><a href="profile.php"> <i class="glyphicon glyphicon-share"></i>Profile <span class="pull-right"><?= counting("profile", "id") ?></span></a></li>
				<li><a href="resources.php"> <i class="glyphicon glyphicon-tower"></i>Resources <span class="pull-right"><?= counting("resources", "id") ?></span></a></li>
				<li><a href="types.php"> <i class="glyphicon glyphicon-qrcode"></i>Types <span class="pull-right"><?= counting("types", "id") ?></span></a></li>
				<li><a href="users.php"> <i class="glyphicon glyphicon-retweet"></i>Users <span class="pull-right"><?= counting("users", "id") ?></span></a></li>
				<li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
			</ul>

			<!-- <div class="visit">
				<p class="text-center">Created using MAGE &hearts;</p>
				<a href="https://github.com/housamz/php-mysql-admin-panel-generator" target="_blank">Visit Project</a>
			</div> -->
		</nav><!-- /end sidebar -->

		<!-- Page Content Holder -->
		<div id="content">