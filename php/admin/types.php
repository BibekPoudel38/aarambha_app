<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-types.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Types</a>

				<h1>Types</h1>
				<p>This table includes <?php echo counting("types", "id");?> types.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Int</th>
			<th>Varchar</th>
			<th>Not null</th>
			<th>Null</th>
			<th>Date</th>
			<th>Tinyint</th>
			<th>Decimal</th>
			<th>Bool</th>
			<th>Json</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$types = getAll("types");
				if($types) foreach ($types as $typess):
					?>
					<tr>
		<td><?php echo $typess['int']?></td>
		<td><?php echo $typess['varchar']?></td>
		<td><?php echo $typess['not_null']?></td>
		<td><?php echo $typess['null']?></td>
		<td><?php echo $typess['date']?></td>
		<td><?php echo $typess['tinyint']?></td>
		<td><?php echo $typess['decimal']?></td>
		<td><?php echo $typess['bool']?></td>
		<td><?php echo $typess['json']?></td>


						<td><a href="edit-types.php?act=edit&id=<?php echo $typess['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $typess['id']?>&cat=types" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				