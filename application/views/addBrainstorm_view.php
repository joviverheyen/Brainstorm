<?php include('includes/head.php')?>
<body>
	
	<?php include('includes/titlebar.php')?>
	
	<div class="form">
		<?php echo form_open('addBrainstorm/add'); ?>
			<input type="text" name="add-brainstorm-title" id="add-brainstorm-title" placeholder="The title of your brainstorm"/> <br />
			<textarea name="add-brainstorm-text" id="add-brainstorm-text" placeholder="Give some extra info about your idea..."></textarea> <br />
			
			<h3>TODO: </h3>
			<p>category</p>
			<p>images</p>
			<p>private?</p>
			<p>invite people</p>
			
			<input type="submit" value="Add brainstorm" id="btnAddBrainstorm"/>
		<?php echo form_close(); ?>
	</div>

	<?php include('includes/navbar.php')?>

</body>
</html>
