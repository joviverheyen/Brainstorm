<?php include('includes/head.php')?>
<body>
	
	<?php include('includes/titlebar-edit-profile.php')?>
	
	<?php foreach($rows as $r) : ?>
		
		<article class="profile" data-title="<?php echo $r->User_Username; ?>">
			<div class="content">
				<div class="image">
				<?php if($r->User_Image != NULL) : ?>
					<img src="/brainstorm/uploads/avatars/<?php echo $r->User_Image; ?>" alt="<?php echo $r->User_Username; ?>" />
				<?php else : ?>
					<img src="/brainstorm/uploads/avatars/none.jpg" alt="<?php echo $r->User_Username; ?>" />
				<?php endif; ?>
				</div>
				
				<p><?php echo $r->User_Bio; ?></p>
			
				<?php if($r->User_Website != NULL) : ?>
				<a class="social" id="web" href="<?php echo $r->User_Website; ?>"></a> 
				<?php endif; ?>
				<?php if($r->User_Twitter != NULL) : ?>
				<a class="social" id="twitter" href="https://twitter.com/<?php echo $r->User_Twitter; ?>"></a> 
				<?php endif; ?>
				<?php if($r->User_Facebook != NULL) : ?>
				<a class="social" id="facebook" href="http://www.facebook.com/<?php echo $r->User_Facebook; ?>"></a> 
				<?php endif; ?>
				<?php if($r->User_Dribbble != NULL) : ?>
				<a class="social" id="dribbble" href="http://dribbble.com/<?php echo $r->User_Dribbble; ?>"></a> 
				<?php endif; ?>
				<?php if($r->User_Behance != NULL) : ?>
				<a class="social" id="behance" href="http://www.behance.net/<?php echo $r->User_Behance; ?>"></a> 
				<?php endif; ?>
				
				<div class="links">
					<?php if($r->Field_Label1 != NULL) : ?>
					<a href="#" class="category"><span><?php echo $r->Field_Label1 ?></span></a>
					<?php endif; ?>
					<?php if($r->Field_Label2 != NULL) : ?>
					<a href="#" class="category"><span><?php echo $r->Field_Label2 ?></span></a>
					<?php endif; ?>
					<?php if($r->Field_Label3 != NULL) : ?>
					<a href="#" class="category"><span><?php echo $r->Field_Label3 ?></span></a>
					<?php endif; ?>
					<?php if($this->session->userdata('userid') != $r->PK_User_ID) : ?>
						<?php if($follow == "false") : ?>
						<a href="http://ajweb.be/brainstorm/index.php/profile/follow/<?php echo $r->PK_User_ID ?>" class="subscribe"><span>follow</span></a>
						<?php else : ?>
						<a href="http://ajweb.be/brainstorm/index.php/profile/unfollow/<?php echo $r->PK_User_ID ?>" class="subscribe"><span>unfollow</span></a>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
		</article>
	<?php endforeach; ?>
	
	<div class="filter clearfix" id="profile">
		<a href="http://ajweb.be/brainstorm/index.php/profile/index/<?php foreach($rows as $r) : ?><?php echo $r->PK_User_ID ?><?php endforeach; ?>" class="filter-button active" id="ideas-button"><span>My Ideas</span></a>
		<a href="http://ajweb.be/brainstorm/index.php/profile/following/<?php foreach($rows as $r) : ?><?php echo $r->PK_User_ID ?><?php endforeach; ?>" class="filter-button" id="following-button"><span>Following</span></a>
		<a href="http://ajweb.be/brainstorm/index.php/profile/followers/<?php foreach($rows as $r) : ?><?php echo $r->PK_User_ID ?><?php endforeach; ?>" class="filter-button" id="followers-button"><span>Followers</span></a>
	</div>
	
	<div class="brainstorm-container">
		<?php foreach($brainstorms as $bs) : ?>
		<a href="http://ajweb.be/brainstorm/index.php/brainstormDetail/show/<?php echo $bs->PK_Brainstorm_ID; ?>">
		<article class="brainstorm">
			<div class="content">
				<h1 class="brainstorm-title"><?php echo $bs->Brainstorm_Title; ?></h1>
				<span class="posted"><?php echo $bs->User_Username; ?> - <?php echo $bs->Brainstorm_Timestamp; ?></span>
			</div>
			<span class="arrow"></span>
		</article>
		</a>
		<?php endforeach; ?>
	</div>
	
	<?php include('includes/navbar-profile.php')?>

</body>
</html>