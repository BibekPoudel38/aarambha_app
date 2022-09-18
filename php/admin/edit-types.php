<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$types = getById("types", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Types</legend>
						<input name="cat" type="hidden" value="types">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Int</label>
							<input class="form-control" type="text" name="int" value="<?=$types['int']?>" /><br>
							
							<label>Varchar</label>
							<input class="form-control" type="text" name="varchar" value="<?=$types['varchar']?>" /><br>
							
							<label>Not null</label>
							<input class="form-control" type="text" name="not_null" value="<?=$types['not_null']?>" /><br>
							
							<label>Null</label>
							<input class="form-control" type="text" name="null" value="<?=$types['null']?>" /><br>
							
							<label>Date</label>
							<input class="form-control" type="text" name="date" value="<?=$types['date']?>" /><br>
							
							<label>Tinyint</label>
							<input class="form-control" type="text" name="tinyint" value="<?=$types['tinyint']?>" /><br>
							
							<label>Decimal</label>
							<input class="form-control" type="text" name="decimal" value="<?=$types['decimal']?>" /><br>
							
							<label>Bool</label>
							<input class="form-control" type="text" name="bool" value="<?=$types['bool']?>" /><br>
							
							<label>Json</label>
							<input class="form-control" type="text" name="json" value="<?=$types['json']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				