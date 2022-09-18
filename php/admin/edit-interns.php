<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$interns = getById("interns", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Interns</legend>
						<input name="cat" type="hidden" value="interns">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Username</label>
							<input class="form-control" type="text" name="username" value="<?=$interns['username']?>" /><br>
							
							<label>Full name</label>
							<input class="form-control" type="text" name="full_name" value="<?=$interns['full_name']?>" /><br>
							
							<label>Email address</label>
							<input class="form-control" type="text" name="email_address" value="<?=$interns['email_address']?>" /><br>
							
							<label>Education level</label>
							<input class="form-control" type="text" name="education_level" value="<?=$interns['education_level']?>" /><br>
							
							<label>Gender</label>
							<input class="form-control" type="text" name="gender" value="<?=$interns['gender']?>" /><br>
							
							<label>Phone number</label>
							<input class="form-control" type="text" name="phone_number" value="<?=$interns['phone_number']?>" /><br>
							
							<label>Join date</label>
							<input class="form-control" type="text" name="join_date" value="<?=$interns['join_date']?>" /><br>
							
							<label>Social media link</label>
							<input class="form-control" type="text" name="social_media_link" value="<?=$interns['social_media_link']?>" /><br>
							
							<label>Completion date</label>
							<input class="form-control" type="text" name="completion_date" value="<?=$interns['completion_date']?>" /><br>
							
							<label>Department</label>
							<input class="form-control" type="text" name="department" value="<?=$interns['department']?>" /><br>
							
							<label>Supervisor</label>
							<input class="form-control" type="text" name="supervisor" value="<?=$interns['supervisor']?>" /><br>
							
							<label>Updated date</label>
							<input class="form-control" type="text" name="updated_date" value="<?=$interns['updated_date']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				