<?php include('includes/head.php')?>
<body>
	
	<?php include('includes/titlebar.php')?>
	
	<?php foreach($rows as $r) : ?>
		<article class="brainstorm-details" data-title="<?php echo $r->Brainstorm_Title; ?>">
			<div class="content">
				<span class="posted"><?php echo $r->FK_Brainstorm_User_ID; ?> - <?php echo $r->Brainstorm_Timestamp; ?></span><br/>
				<span class="brainstorm-body"><?php echo $r->Brainstorm_Text; ?></span>
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
	
	</div>
	
	<div class="form">
		<?php echo form_open(''); ?> <!--NAAR WAAR POSTEN NOG INVULLEN-->
			<textarea name="add-reaction-text" id="add-reaction-text" placeholder="Reply..."></textarea> <br />
			<input type="submit" value="Submit reply" id="btnReply"/>
		<?php echo form_close(); ?>
	</div>

	<?php include('includes/navbar-home.php')?>

</body>
</html>
