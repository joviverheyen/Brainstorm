<?php include('includes/head.php')?>
<body>
	
	<?php foreach($brainstorm as $b) : ?>
		<?php if($this->session->userdata('userid') == $b->FK_Brainstorm_User_ID) : ?>
			<?php include('includes/titlebar-edit-brainstorm.php')?>
		<?php else : ?>
			<?php include('includes/titlebar.php')?>
		<?php endif; ?>
	
		<article class="brainstorm-details" data-title="<?php echo $b->Brainstorm_Title; ?>">
			<div class="content">
				<span class="posted"><?php echo $b->User_Username; ?> - <?php echo $b->Brainstorm_Timestamp; ?></span><br/>
				<span class="brainstorm-body"><?php echo $b->Brainstorm_Text; ?></span>
			</div>
			<div class="links">
				<?php if($b->Tag_Label1 != NULL) : ?>
				<a href="#" class="category"><span><?php echo $b->Tag_Label1; ?></span></a>
				<?php endif; ?>
				<?php if($b->Tag_Label2 != NULL) : ?>
				<a href="#" class="category"><span><?php echo $b->Tag_Label2; ?></span></a>
				<?php endif; ?>
				<?php if($b->Tag_Label3 != NULL) : ?>
				<a href="#" class="category"><span><?php echo $b->Tag_Label3; ?></span></a>
				<?php endif; ?>
				
				<?php if($subscription == "false") : ?>
				<a href="http://ajweb.be/brainstorm/index.php/brainstormDetail/subscribe/<?php echo $b->PK_Brainstorm_ID ?>" class="subscribe"><span>subscribe</span></a>
				<?php else : ?>
				<a href="http://ajweb.be/brainstorm/index.php/brainstormDetail/unsubscribe/<?php echo $b->PK_Brainstorm_ID ?>" class="subscribe"><span>unsubscribe</span></a>
				<?php endif; ?>
			</div>
		</article>
	<?php endforeach; ?>

	<?php if($reactions) : ?>
	<div class="brainstorm-reactions">
		<?php foreach($reactions as $r) : ?>
			<article class="reaction">
				<span class="posted"><?php echo $r->User_Username; ?> - <?php echo $r->Reaction_Timestamp; ?></span><br/>
				<span class="reaction-body"><?php echo $r->Reaction_Text; ?></span>
			</article>
			<hr id="reaction-divider"/>
		<?php endforeach; ?>
	</div>
	<?php endif ?>
	
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
