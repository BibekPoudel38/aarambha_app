<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$resources = getById("resources", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Resources</legend>
						<input name="cat" type="hidden" value="resources">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Owner</label>
							<input class="form-control" type="text" name="owner" value="<?=$resources['owner']?>" /><br>
							
							<label>Type</label>
							<input class="form-control" type="text" name="type" value="<?=$resources['type']?>" /><br>
							
							<label>Dep id</label>
							<input class="form-control" type="text" name="dep_id" value="<?=$resources['dep_id']?>" /><br>
							
							<label>Link</label>
							<input class="form-control" type="text" name="link" value="<?=$resources['link']?>" /><br>
							
							<label>Title</label>
							<input class="form-control" type="text" name="title" value="<?=$resources['title']?>" /><br>
							
							<label>Created at</label>
							<input class="form-control" type="text" name="created_at" value="<?=$resources['created_at']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				