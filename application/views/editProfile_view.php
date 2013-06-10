<?php include('includes/head.php')?>
<body>
	
	<?php include('includes/titlebar.php')?>
	
	<?php foreach($rows as $r) : ?>
	<article class="edit-title" data-title="Edit your profile">
	<div class="form">
		<form method="post" action="editProfile/update" enctype="multipart/form-data" />
			<input type="text" name="update-username" id="update-username" placeholder="Username" value="<?php echo $r->User_Username; ?>" /> <br />
			<input type="text" name="update-fn" id="update-fn" placeholder="First Name"  value="<?php echo $r->User_FirstName; ?>" /> <br />
			<input type="text" name="update-ln" id="update-ln" placeholder="Last Name" value="<?php echo $r->User_LastName; ?>" /> <br />
			<input type="text" name="update-email" id="update-email" placeholder="Email" value="<?php echo $r->User_Email; ?>" /> <br />
			<input type="file" id="userfile" name="userfile" /> <br />
			<textarea name="update-bio" id="update-bio" placeholder="Bio"><?php echo $r->User_Bio; ?></textarea> <br />
			<input type="text" name="update-website" id="update-website" placeholder="Website" value="<?php echo $r->User_Website; ?>" /> <br />
			<input type="text" name="update-twitter" id="update-twitter" placeholder="Twitter" value="<?php echo $r->User_Twitter; ?>" /> <br />
			<input type="text" name="update-fb" id="update-fb" placeholder="Facebook" value="<?php echo $r->User_Facebook ?>" /> <br />
			<input type="text" name="update-dribbble" id="update-dribbble" placeholder="Dribbble" value="<?php echo $r->User_Dribbble; ?>" /> <br />
			<input type="text" name="update-behance" id="update-behance" placeholder="Behance" value="<?php echo $r->User_Behance; ?>" /> <br />
			
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