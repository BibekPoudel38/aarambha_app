<?php
include("includes/connect.php");

$cat = $_POST['cat'];
$cat_get = $_GET['cat'];
$act = $_POST['act'];
$act_get = $_GET['act'];
$id = $_POST['id'];
$id_get = $_GET['id'];


if ($cat == "attendence" || $cat_get == "attendence") {
	$user_id = addslashes(htmlentities($_POST["user_id"], ENT_QUOTES));
	$created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));
	$mac_address = addslashes(htmlentities($_POST["mac_address"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `attendence` (  `user_id` , `created_at` , `mac_address` ) VALUES ( '" . $user_id . "' , '" . $created_at . "' , '" . $mac_address . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `attendence` SET  `user_id` =  '" . $user_id . "' , `created_at` =  '" . $created_at . "' , `mac_address` =  '" . $mac_address . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `attendence` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "attendence.php");
}

if ($cat == "department" || $cat_get == "department") {
	$name = addslashes(htmlentities($_POST["name"], ENT_QUOTES));
	$description = addslashes(htmlentities($_POST["description"], ENT_QUOTES));
	$h_o_d = addslashes(htmlentities($_POST["h_o_d"], ENT_QUOTES));
	// $created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));
	// $updated_at = addslashes(htmlentities($_POST["updated_at"], ENT_QUOTES));
	$banner = addslashes(htmlentities($_POST["banner"], ENT_QUOTES));
	$icon = addslashes(htmlentities($_POST["icon"], ENT_QUOTES));
	$color = addslashes(htmlentities($_POST["color"], ENT_QUOTES));
	if ($act == "add") {
		$file_name = $_FILES['banner']['name'];
		$file_tmp_name = $_FILES['banner']['tmp_name'];
		$error = $_FILES['banner']['error'];
		$file_name2 = $_FILES['icon']['name'];
		$file_tmp_name2 = $_FILES['icon']['tmp_name'];
		$error2 = $_FILES['icon']['error'];
		if ($error > 0 || $error2 > 0) {
			echo ("There was an error");
		} else {
			$random_name = rand(1000, 1000000) . "-" . $file_name;
			$file_upload_name = $random_name;
			$file_upload_name = preg_replace('/\s+/', '-', $file_upload_name);

			$random_name2 = rand(1000, 1000000) . "-" . $file_name2;
			$file_upload_name2 = $random_name2;
			$file_upload_name2 = preg_replace('/\s+/', '-', $file_upload_name2);

			if (move_uploaded_file($file_tmp_name, 'assets/' . $file_upload_name) && move_uploaded_file($file_tmp_name2, 'assets/' . $file_upload_name2)) {
				mysqli_query($link, "INSERT INTO `department` (  `name` , `description` , `h_o_d` , `banner` , `icon` , `color` ) VALUES ( '" . $name . "' , '" . $description . "' , '" . $h_o_d . "' , '" . $file_upload_name . "' , '" . $file_upload_name2 . "' , '" . $color . "' ) ");
			} else {
				echo ("Failed");
			}
		}
	} elseif ($act == "edit") {
		$old_banner = addslashes(htmlentities($_POST["banner_text"], ENT_QUOTES));
		if ($addslashes(htmlentities($_POST["icon"], ENT_QUOTES))) {
			$old_icon = addslashes(htmlentities($_POST["icon_text"], ENT_QUOTES));
		} else {
			$old_icon = addslashes(htmlentities($_POST["icon"], ENT_QUOTES));
		}
		mysqli_query($link, "UPDATE `department` SET  `name` =  '" . $name . "' , `description` =  '" . $description . "' , `h_o_d` =  '" . $h_o_d . "' , `banner` =  '" . $old_banner . "' , `icon` =  '" . $old_icon . "' , `color` =  '" . $color . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `department` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "department.php");
}

if ($cat == "interns" || $cat_get == "interns") {
	$username = addslashes(htmlentities($_POST["username"], ENT_QUOTES));
	$full_name = addslashes(htmlentities($_POST["full_name"], ENT_QUOTES));
	$email_address = addslashes(htmlentities($_POST["email_address"], ENT_QUOTES));
	$education_level = addslashes(htmlentities($_POST["education_level"], ENT_QUOTES));
	$gender = addslashes(htmlentities($_POST["gender"], ENT_QUOTES));
	$phone_number = addslashes(htmlentities($_POST["phone_number"], ENT_QUOTES));
	$join_date = addslashes(htmlentities($_POST["join_date"], ENT_QUOTES));
	$social_media_link = addslashes(htmlentities($_POST["social_media_link"], ENT_QUOTES));
	$completion_date = addslashes(htmlentities($_POST["completion_date"], ENT_QUOTES));
	$department = addslashes(htmlentities($_POST["department"], ENT_QUOTES));
	$supervisor = addslashes(htmlentities($_POST["supervisor"], ENT_QUOTES));
	$updated_date = addslashes(htmlentities($_POST["updated_date"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `interns` (  `username` , `full_name` , `email_address` , `education_level` , `gender` , `phone_number` , `join_date` , `social_media_link` , `completion_date` , `department` , `supervisor` , `updated_date` ) VALUES ( '" . $username . "' , '" . $full_name . "' , '" . $email_address . "' , '" . $education_level . "' , '" . $gender . "' , '" . $phone_number . "' , '" . $join_date . "' , '" . $social_media_link . "' , '" . $completion_date . "' , '" . $department . "' , '" . $supervisor . "' , '" . $updated_date . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `interns` SET  `username` =  '" . $username . "' , `full_name` =  '" . $full_name . "' , `email_address` =  '" . $email_address . "' , `education_level` =  '" . $education_level . "' , `gender` =  '" . $gender . "' , `phone_number` =  '" . $phone_number . "' , `join_date` =  '" . $join_date . "' , `social_media_link` =  '" . $social_media_link . "' , `completion_date` =  '" . $completion_date . "' , `department` =  '" . $department . "' , `supervisor` =  '" . $supervisor . "' , `updated_date` =  '" . $updated_date . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `interns` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "interns.php");
}

if ($cat == "profile" || $cat_get == "profile") {
	$username = addslashes(htmlentities($_POST["username"], ENT_QUOTES));
	$password = addslashes(htmlentities($_POST["password"], ENT_QUOTES));
	$email = addslashes(htmlentities($_POST["email"], ENT_QUOTES));
	$gender = addslashes(htmlentities($_POST["gender"], ENT_QUOTES));
	$phone = addslashes(htmlentities($_POST["phone"], ENT_QUOTES));
	$created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));
	$updated_at = addslashes(htmlentities($_POST["updated_at"], ENT_QUOTES));
	$is_admin = addslashes(htmlentities($_POST["is_admin"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `profile` (  `username` , `password` , `email` , `gender` , `phone` , `created_at` , `updated_at` , `is_admin` ) VALUES ( '" . $username . "' , '" . md5($password) . "', '" . $email . "' , '" . $gender . "' , '" . $phone . "' , '" . $created_at . "' , '" . $updated_at . "' , '" . $is_admin . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `profile` SET  `username` =  '" . $username . "' , `email` =  '" . $email . "' , `gender` =  '" . $gender . "' , `phone` =  '" . $phone . "' , `created_at` =  '" . $created_at . "' , `updated_at` =  '" . $updated_at . "' , `is_admin` =  '" . $is_admin . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `profile` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "profile.php");
}

if ($cat == "resources" || $cat_get == "resources") {
	$owner = addslashes(htmlentities($_POST["owner"], ENT_QUOTES));
	$type = addslashes(htmlentities($_POST["type"], ENT_QUOTES));
	$dep_id = addslashes(htmlentities($_POST["dep_id"], ENT_QUOTES));
	$link = addslashes(htmlentities($_POST["link"], ENT_QUOTES));
	$title = addslashes(htmlentities($_POST["title"], ENT_QUOTES));
	$created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `resources` (  `owner` , `type` , `dep_id` , `link` , `title` , `created_at` ) VALUES ( '" . $owner . "' , '" . $type . "' , '" . $dep_id . "' , '" . $link . "' , '" . $title . "' , '" . $created_at . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `resources` SET  `owner` =  '" . $owner . "' , `type` =  '" . $type . "' , `dep_id` =  '" . $dep_id . "' , `link` =  '" . $link . "' , `title` =  '" . $title . "' , `created_at` =  '" . $created_at . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `resources` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "resources.php");
}

if ($cat == "types" || $cat_get == "types") {
	$int = addslashes(htmlentities($_POST["int"], ENT_QUOTES));
	$varchar = addslashes(htmlentities($_POST["varchar"], ENT_QUOTES));
	$not_null = addslashes(htmlentities($_POST["not_null"], ENT_QUOTES));
	$null = addslashes(htmlentities($_POST["null"], ENT_QUOTES));
	$date = addslashes(htmlentities($_POST["date"], ENT_QUOTES));
	$tinyint = addslashes(htmlentities($_POST["tinyint"], ENT_QUOTES));
	$decimal = addslashes(htmlentities($_POST["decimal"], ENT_QUOTES));
	$bool = addslashes(htmlentities($_POST["bool"], ENT_QUOTES));
	$json = addslashes(htmlentities($_POST["json"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `types` (  `int` , `varchar` , `not_null` , `null` , `date` , `tinyint` , `decimal` , `bool` , `json` ) VALUES ( '" . $int . "' , '" . $varchar . "' , '" . $not_null . "' , '" . $null . "' , '" . $date . "' , '" . $tinyint . "' , '" . $decimal . "' , '" . $bool . "' , '" . $json . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `types` SET  `int` =  '" . $int . "' , `varchar` =  '" . $varchar . "' , `not_null` =  '" . $not_null . "' , `null` =  '" . $null . "' , `date` =  '" . $date . "' , `tinyint` =  '" . $tinyint . "' , `decimal` =  '" . $decimal . "' , `bool` =  '" . $bool . "' , `json` =  '" . $json . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `types` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "types.php");
}

if ($cat == "users" || $cat_get == "users") {
	$name = addslashes(htmlentities($_POST["name"], ENT_QUOTES));
	$email = addslashes(htmlentities($_POST["email"], ENT_QUOTES));
	$password = addslashes(htmlentities($_POST["password"], ENT_QUOTES));
	$role = addslashes(htmlentities($_POST["role"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `users` (  `name` , `email` , `password` , `role` ) VALUES ( '" . $name . "' , '" . $email . "' , '" . md5($password) . "', '" . $role . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `users` SET  `name` =  '" . $name . "' , `email` =  '" . $email . "' , `role` =  '" . $role . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `users` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "users.php");
}
