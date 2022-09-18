<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-profile.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Profile</a>

<h1>Profile</h1>
<p>This table includes <?php echo counting("profile", "id"); ?> profile.</p>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Username</th>
			<th>Password</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Phone</th>
			<th>Created at</th>
			<th>Updated at</th>
			<th>Is admin</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$profile = getAll("profile");
	if ($profile) foreach ($profile as $profiles) :
	?>
		<tr>
			<td><?php echo $profiles['id'] ?></td>
			<td><?php echo $profiles['username'] ?></td>
			<td><?php echo $profiles['password'] ?></td>
			<td><?php echo $profiles['email'] ?></td>
			<td><?php echo $profiles['gender'] ?></td>
			<td><?php echo $profiles['phone'] ?></td>
			<td><?php echo $profiles['created_at'] ?></td>
			<td><?php echo $profiles['updated_at'] ?></td>
			<td><?php echo $profiles['is_admin'] ?></td>


			<td><a href="edit-profile.php?act=edit&id=<?php echo $profiles['id'] ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
			<td><a href="save.php?act=delete&id=<?php echo $profiles['id'] ?>&cat=profile" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>
	<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>