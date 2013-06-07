<?php include('includes/head.php')?>
<body>
	
	<?php include('includes/titlebar.php')?>
	
	<div class="form">
		<?php echo form_open('search/searchTheDatabase'); ?>
			<div class="search-filter clearfix">
				<input type="radio" id="search-brainstorms" name="search" value="brainstorms"/>
				<label for="search-brainstorms"><span class="search-filter-button">Search for brainstorms</span></label>
				<input type="radio" id="search-users" name="search" value="users"/>
				<label for="search-users"><span class="search-filter-button">Search for users</span></label>
			</div>

			<input type="text" name="term" id="term" placeholder="Search for..." /> <br />
			
			<input type="submit" value="Search" id="btnSearch"/>
				
		<?php echo form_close(); ?>
	</div>
	
	<?php if(!empty($brainstorms)) : ?>
		<div class="brainstorm-container">
			<?php foreach($brainstorms as $bs) : ?>
			<a href="<?php echo site_url('brainstormDetail/show')."/".$bs->PK_Brainstorm_ID; ?>">
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
	<?php endif; ?>
	
	<?php if(!empty($users)) : ?>
		<div class="user-container">
			<?php foreach($users as $u) : ?>
			<a href="brainstormDetail/show/<?php echo $u->PK_User_ID; ?>">
				<article class="user">
					<div class="content">
						<h1 class="username"><?php echo $u->User_Username; ?></h1>
						<span class="full-name"><?php echo $u->User_FirstName; ?> <?php echo $u->User_LastName; ?></span>
					</div>
					<span class="arrow"></span>
				</article>
			</a>
			<?php endforeach; ?>
		</div>
	<?php endif;?>
	
	<?php include('includes/navbar-search.php')?>

</body>
</html>