<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-department.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Department</a>

<h1>Department</h1>
<p>This table includes <?php echo counting("department", "id"); ?> department.</p>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Description</th>
			<th>H o d</th>
			<th>Created at</th>
			<th>Updated at</th>
			<th>Banner</th>
			<th>Icon</th>
			<th>Color</th>

			<th class="not">Edit</th>
			<!-- <th class="not">Delete</th> -->
		</tr>
	</thead>

	<?php
	$department = getAll("department");
	if ($department) foreach ($department as $departments) :
	?>
		<tr>
			<td><?php echo $departments['id'] ?></td>
			<td><?php echo $departments['name'] ?></td>
			<td><?php echo $departments['description'] ?></td>
			<td><?php echo $departments['h_o_d'] ?></td>
			<td><?php echo $departments['created_at'] ?></td>
			<td><?php echo $departments['updated_at'] ?></td>
			<td><img src="assets/<?php echo $departments['banner'] ?>" height="100"></td>
			<td><img src="assets/<?php echo $departments['icon'] ?>" height="100"></td>
			<td><?php echo $departments['color'] ?></td>
			<td><a href="edit-department.php?act=edit&id=<?php echo $departments['id'] ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
			<!-- <td><a href="save.php?act=delete&id=<?php echo $departments['id'] ?>&cat=department" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td> -->
		</tr>
	<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>