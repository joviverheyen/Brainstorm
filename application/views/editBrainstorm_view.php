<?php include('includes/head.php')?>
<body>
	
	<?php include('includes/titlebar.php')?>
	
	<?php foreach($brainstorm as $b) : ?>
	<article class="edit-title" data-title="Edit your brainstorm">
		<div class="form" name="brainstormForm">	
			<?php echo form_open('editBrainstorm/edit'); ?>
				<input type="hidden" name="edit-brainstorm-id" value="<?php echo $b->PK_Brainstorm_ID; ?>"/> <br />
				<input type="text" name="edit-brainstorm-title" id="add-brainstorm-title" value="<?php echo $b->Brainstorm_Title; ?>"/> <br />
				<textarea name="edit-brainstorm-text" id="add-brainstorm-text"><?php echo $b->Brainstorm_Text;?></textarea> <br />
			
				<div class="categories clearfix" name="categories">
					<?php foreach ($category as $c) : ?>
						<input type="checkbox" id="<?php echo $c->PK_Tag_ID; ?>" name="category[]" value="<?php echo $c->PK_Tag_ID; ?>" 
						<?php if($c->Tag_Label == $b->Tag_Label1 || $c->Tag_Label == $b->Tag_Label2 || $c->Tag_Label == $b->Tag_Label3) : ?> checked="checked" <?php endif ;?>
						/>
						<label for="<?php echo $c->PK_Tag_ID; ?>"><span class="category-button"><?php echo $c->Tag_Label; ?></span></label>
					<?php endforeach; ?>
				</div>
			
				<br/>
							
				<div class="privacy clearfix">
					<input type="radio" id="public" name="privacy" value="0" <?php if($b->Brainstorm_Privacy == 0) : ?> checked="checked" <?php endif ;?>/>
					<label for="public"><span class="search-filter-button">Public</span></label>
					<input type="radio" id="private" name="privacy" value="1" <?php if($b->Brainstorm_Privacy == 1) : ?> checked="checked" <?php endif ;?>/>
					<label for="private"><span class="search-filter-button">Private</span></label>
				</div>
			
				<br/>
			
				<input type="submit" value="edit brainstorm" id="btnEditBrainstorm"/>
			<?php echo form_close(); ?>
		</div>	
	</article>
	<?php endforeach; ?>
	
	
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