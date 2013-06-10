<?php include('includes/head.php')?>
<body>
	
	<?php include('includes/titlebar.php')?>
	
	<?php foreach($brainstorm as $b) : ?>
		<article class="brainstorm-details" data-title="<?php echo $b->Brainstorm_Title; ?>">
			<div class="content">
				<span class="posted"><?php echo $b->User_Username; ?> - <?php echo $b->Brainstorm_Timestamp; ?></span><br/>
				<span class="brainstorm-body"><?php echo $b->Brainstorm_Text; ?></span>
			</div>
			<div class="links">
				<a href="#" class="category"><span>web</span></a>
				<a href="#" class="category"><span>design</span></a>
				<a href="#" class="category"><span>colors</span></a>
				<a href="#" class="subscribe"><span>subscribe</span></a>
			</div>
		</article>
	<?php endforeach; ?>

	<div class="brainstorm-reactions">
		<?php foreach($reactions as $r) : ?>
			<article class="reaction">
				<span class="posted"><?php echo $r->User_Username; ?> - <?php echo $r->Reaction_Timestamp; ?></span><br/>
				<span class="reaction-body"><?php echo $r->Reaction_Text; ?></span>
			</article>
			<hr id="reaction-divider"/>
		<?php endforeach; ?>

	</div>
	
	<div class="form">
		<?php echo form_open('brainstormDetail/reply'); ?>
			<textarea name="add-reaction-text" id="add-reaction-text" placeholder="Reply..."></textarea> <br />
			<input type="hidden" name="brainstorm-id" value="<?php foreach($brainstorm as $b) : ?><?php echo $b->PK_Brainstorm_ID; ?><?php endforeach; ?>"> <br />
			<input type="submit" value="Submit reply" id="btnReply"/>
		<?php echo form_close(); ?>
	</div>

	<?php include('includes/navbar-home.php')?>

</body>
</html>
