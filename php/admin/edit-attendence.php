<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$attendence = getById("attendence", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Attendence</legend>
						<input name="cat" type="hidden" value="attendence">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>User id</label>
							<input class="form-control" type="text" name="user_id" value="<?=$attendence['user_id']?>" /><br>
							
							<label>Created at</label>
							<input class="form-control" type="text" name="created_at" value="<?=$attendence['created_at']?>" /><br>
							
							<label>Mac address</label>
							<input class="form-control" type="text" name="mac_address" value="<?=$attendence['mac_address']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				