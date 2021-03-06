<?php include('includes/head.php')?>
<body>
	
	<?php include('includes/titlebar.php')?>
	
	<?php foreach($rows as $r) : ?>
	<article class="edit-title" data-title="Edit your profile">
	<div class="form">
		<form method="post" action="editProfile/update" enctype="multipart/form-data" />
			<input type="text" name="update-username" id="update-username" value="<?php echo $r->User_Username; ?>" /> <br />
			<label for="update-username" class="edit-label">Username</label>
			<input type="text" name="update-fn" id="update-fn" value="<?php echo $r->User_FirstName; ?>" /> <br />
			<label for="update-fn" class="edit-label">First name</label>
			<input type="text" name="update-ln" id="update-ln" value="<?php echo $r->User_LastName; ?>" /> <br />
			<label for="update-ln" class="edit-label">Last name</label>
			<input type="text" name="update-email" id="update-email" value="<?php echo $r->User_Email; ?>" /> <br />
			<label for="update-email" class="edit-label">Email</label>
			<input type="file" id="userfile" name="userfile" /> <br />
			<textarea name="update-bio" id="update-bio"><?php echo $r->User_Bio; ?></textarea> <br />
			<label for="update-bio" class="edit-label">Bio</label>
			<input type="text" name="update-website" id="update-website" value="<?php echo $r->User_Website; ?>" /> <br />
			<label for="update-website" class="edit-label">Website</label>
			<input type="text" name="update-twitter" id="update-twitter" value="<?php echo $r->User_Twitter; ?>" /> <br />
			<label for="update-twitter" class="edit-label">Twitter</label>
			<input type="text" name="update-fb" id="update-fb" value="<?php echo $r->User_Facebook ?>" /> <br />
			<label for="update-fb" class="edit-label">Facebook</label>
			<input type="text" name="update-dribbble" id="update-dribbble" value="<?php echo $r->User_Dribbble; ?>" /> <br />
			<label for="update-dribble" class="edit-label">Dribble</label>
			<input type="text" name="update-behance" id="update-behance" value="<?php echo $r->User_Behance; ?>" /> <br />
			<label for="update-behance" class="edit-label">Behance</label>
			
			<select id="update-field1" name="update-field1">
			<option value="">Select Category 1</option>
			<?php foreach($fields as $f) : ?>
			<option value="<?php echo $f->PK_Field_ID; ?>" <?php if($f->PK_Field_ID == $r->FK_User_Field1) { echo "selected"; } ?>><?php echo $f->Field_Label; ?></option>
			<?php endforeach; ?>
			</select>
			
			<select id="update-field2" name="update-field2">
			<option value="">Select Category 2</option>
			<?php foreach($fields as $f) : ?>
			<option value="<?php echo $f->PK_Field_ID; ?>" <?php if($f->PK_Field_ID == $r->FK_User_Field2) { echo "selected"; } ?>><?php echo $f->Field_Label; ?></option>
			<?php endforeach; ?>
			</select>
			
			<select id="update-field4" name="update-field3">
			<option value="">Select Category 3</option>
			<?php foreach($fields as $f) : ?>
			<option value="<?php echo $f->PK_Field_ID; ?>" <?php if($f->PK_Field_ID == $r->FK_User_Field3) { echo "selected"; } ?>><?php echo $f->Field_Label; ?></option>
			<?php endforeach; ?>
			</select>
			
			<input type="submit" value="Update Profile" id="btnUpdateProfile"/>
		</form>
	</div>
	</article>
	<?php endforeach; ?>
		
	<?php include('includes/navbar-profile.php')?>

</body>
</html>