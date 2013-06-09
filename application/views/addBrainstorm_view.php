<?php include('includes/head.php')?>
<body>
	
	<?php include('includes/titlebar.php')?>
	
	<div class="form" name="brainstormForm">
		<?php echo form_open('addBrainstorm/add'); ?>
			<input type="text" name="add-brainstorm-title" id="add-brainstorm-title" placeholder="The title of your brainstorm"/> <br />
			<textarea name="add-brainstorm-text" id="add-brainstorm-text" placeholder="Give some extra info about your idea..."></textarea> <br />
			
			
			<div class="categories clearfix" name="categories">
				<input type="checkbox" id="one" name="category" value="one"/>
				<label for="one"><span class="category-button">one</span></label>
				<input type="checkbox" id="two" name="category" value="two"/>
				<label for="two"><span class="category-button">two</span></label>
				<input type="checkbox" id="three" name="category" value="two"/>
				<label for="three"><span class="category-button">three</span></label>
				<input type="checkbox" id="four" name="category" value="two"/>
				<label for="four"><span class="category-button">four</span></label>
			</div>
			
			<br/>
			<h3>TODO: </h3>
			<p>images</p>
			<p>private?</p>
			<p>invite people</p>
			
			<input type="submit" value="Add brainstorm" id="btnAddBrainstorm"/>
		<?php echo form_close(); ?>
	</div>

	<?php include('includes/navbar-home.php')?>
	
	<script type="text/javascript">
		$('.categories :checkbox').change(function () {
			var $cs=$(this).closest('.categories').find(':checkbox:checked');
			if ($cs.length > 3) {
				this.checked=false;
			}
		});
	</script>

</body>
</html>
