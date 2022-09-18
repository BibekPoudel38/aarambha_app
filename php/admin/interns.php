<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-interns.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Interns</a>

				<h1>Interns</h1>
				<p>This table includes <?php echo counting("interns", "id");?> interns.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Username</th>
			<th>Full name</th>
			<th>Email address</th>
			<th>Education level</th>
			<th>Gender</th>
			<th>Phone number</th>
			<th>Join date</th>
			<th>Social media link</th>
			<th>Completion date</th>
			<th>Department</th>
			<th>Supervisor</th>
			<th>Updated date</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$interns = getAll("interns");
				if($interns) foreach ($interns as $internss):
					?>
					<tr>
		<td><?php echo $internss['id']?></td>
		<td><?php echo $internss['username']?></td>
		<td><?php echo $internss['full_name']?></td>
		<td><?php echo $internss['email_address']?></td>
		<td><?php echo $internss['education_level']?></td>
		<td><?php echo $internss['gender']?></td>
		<td><?php echo $internss['phone_number']?></td>
		<td><?php echo $internss['join_date']?></td>
		<td><?php echo $internss['social_media_link']?></td>
		<td><?php echo $internss['completion_date']?></td>
		<td><?php echo $internss['department']?></td>
		<td><?php echo $internss['supervisor']?></td>
		<td><?php echo $internss['updated_date']?></td>


						<td><a href="edit-interns.php?act=edit&id=<?php echo $internss['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $internss['id']?>&cat=interns" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				