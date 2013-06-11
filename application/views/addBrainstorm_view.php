<?php include('includes/head.php')?>
<body>
	
	<?php include('includes/titlebar.php')?>
	
	<div class="form" name="brainstormForm">
		<?php echo form_open('addBrainstorm/add'); ?>
			<input type="text" name="add-brainstorm-title" id="add-brainstorm-title" placeholder="The title of your brainstorm"/> <br />
			<textarea name="add-brainstorm-text" id="add-brainstorm-text" placeholder="Give some extra info about your idea..."></textarea> <br />
			
			<div class="categories clearfix" name="categories">
				<?php foreach ($row as $r) : ?>
					<input type="checkbox" id="<?php echo $r->PK_Tag_ID; ?>" name="category[]" value="<?php echo $r->PK_Tag_ID; ?>"/>
					<label for="<?php echo $r->PK_Tag_ID; ?>"><span class="category-button"><?php echo $r->Tag_Label; ?></span></label>
				<?php endforeach; ?>
			</div>
			
			<br/>
			
			<div class="privacy clearfix">
				<input type="radio" id="public" name="privacy" value="0"/>
				<label for="public"><span class="search-filter-button">Public</span></label>
				<input type="radio" id="private" name="privacy" value="1"/>
				<label for="private"><span class="search-filter-button">Private</span></label>
			</div>
			
			<br/>
			
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
