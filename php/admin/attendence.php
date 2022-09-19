<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-attendence.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Attendence</a>

<h1>Attendence</h1>
<p>This table includes <?php echo counting("attendence", "id"); ?> attendence.</p>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>User id</th>
			<th>Created at</th>
			<th>Mac address</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$attendence = getAll("attendence");
	if ($attendence) foreach ($attendence as $attendences) :
	?>
		<tr>
			<td><?php echo $attendences['id'] ?></td>
			<td><?php echo $attendences['user_id'] ?></td>
			<td><?php echo $attendences['created_at'] ?></td>
			<td><?php echo $attendences['mac_address'] ?></td>


			<td><a href="edit-attendence.php?act=edit&id=<?php echo $attendences['id'] ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
			<td><a href="save.php?act=delete&id=<?php echo $attendences['id'] ?>&cat=attendence" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>
	<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>