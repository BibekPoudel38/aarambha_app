<?php
include "includes/header.php";
?>
<table class="table table-striped">
	<tr>
		<th class="not">Table</th>
		<th class="not">Entries</th>
	</tr>

	<tr>
		<td><a href="attendence.php">Attendence</a></td>
		<td><?= counting("attendence", "id") ?></td>
	</tr>

	<tr>
		<td><a href="department.php">Department</a></td>
		<td><?= counting("department", "id") ?></td>
	</tr>

	<tr>
		<td><a href="interns.php">Interns</a></td>
		<td><?= counting("interns", "id") ?></td>
	</tr>

	<tr>
		<td><a href="profile.php">Profile</a></td>
		<td><?= counting("profile", "id") ?></td>
	</tr>

	<tr>
		<td><a href="profile.php">Admin Count</a></td>
		<td><?= adminCounting("profile", "id") ?></td>
	</tr>

	<tr>
		<td><a href="resources.php">Resources</a></td>
		<td><?= counting("resources", "id") ?></td>
	</tr>

	<tr>
		<td><a href="types.php">Types</a></td>
		<td><?= counting("types", "id") ?></td>
	</tr>

	<tr>
		<td><a href="users.php">Users</a></td>
		<td><?= counting("users", "id") ?></td>
	</tr>
</table>
<?php include "includes/footer.php"; ?>