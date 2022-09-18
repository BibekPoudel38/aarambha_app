<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-resources.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Resources</a>

				<h1>Resources</h1>
				<p>This table includes <?php echo counting("resources", "id");?> resources.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Owner</th>
			<th>Type</th>
			<th>Dep id</th>
			<th>Link</th>
			<th>Title</th>
			<th>Created at</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$resources = getAll("resources");
				if($resources) foreach ($resources as $resourcess):
					?>
					<tr>
		<td><?php echo $resourcess['id']?></td>
		<td><?php echo $resourcess['owner']?></td>
		<td><?php echo $resourcess['type']?></td>
		<td><?php echo $resourcess['dep_id']?></td>
		<td><?php echo $resourcess['link']?></td>
		<td><?php echo $resourcess['title']?></td>
		<td><?php echo $resourcess['created_at']?></td>


						<td><a href="edit-resources.php?act=edit&id=<?php echo $resourcess['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $resourcess['id']?>&cat=resources" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				