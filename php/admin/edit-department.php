<?php
include "includes/header.php";
$data = [];

$act = $_GET['act'];
if ($act == "edit") {
	$id = $_GET['id'];
	$department = getById("department", $id);
}
?>

<form method="post" action="save.php" enctype='multipart/form-data'>
	<fieldset>
		<legend class="hidden-first">Add New Department</legend>
		<input name="cat" type="hidden" value="department">
		<input name="id" type="hidden" value="<?= $id ?>">
		<input name="act" type="hidden" value="<?= $act ?>">

		<label>Name</label>
		<input class="form-control" type="text" name="name" value="<?= $department['name'] ?>" /><br>

		<label>Description</label>
		<input class="form-control" type="text" name="description" value="<?= $department['description'] ?>" /><br>

		<label>H o d</label>
		<input class="form-control" type="number" name="h_o_d" value="<?= $department['h_o_d'] ?>" /><br>

		<!-- <label>Created at</label>
		<input class="form-control" type="text" name="created_at" value="<?= $department['created_at'] ?>" /><br>

		<label>Updated at</label>
		<input class="form-control" type="text" name="updated_at" value="<?= $department['updated_at'] ?>" /><br> -->

		<label>Banner</label>
		<input class="form-control" type="file" name="banner" value="<?= $department['banner'] ?>" /><br>
		<input class="form-control" type="hidden" name="banner_text" value="<?= $department['banner'] ?>" /><br>

		<label>Icon</label>
		<input class="form-control" type="file" name="icon" value="<?= $department['icon'] ?>" /><br>
		<input class="form-control" type="hidden" name="icon_text" value="<?= $department['icon'] ?>" /><br>
	
		<label>Color</label>
		<input class="form-control" type="color" name="color" value="<?= $department['color'] ?>" /><br>
		<br>
		<input type="submit" value=" Save " class="btn btn-success">
</form>
<?php include "includes/footer.php"; ?>