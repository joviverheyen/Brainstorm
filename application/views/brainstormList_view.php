<?php include('includes/head.php')?>
<body>
	
	<?php include('includes/titlebar.php')?>
	
	<div class="filter clearfix">
		<a href="#" class="filter-button active" id="following-button"><span>following</span></a>
		<a href="#" class="filter-button" id="new-button"><span>new</span></a>
		<a href="#" class="filter-button" id="popular-button"><span>popular</span></a>
		<a href="#" class="filter-button" id="subscribed-button"><span>subscribed</span></a>
	</div>
	
	<div class="brainstorm-container">
		<?php foreach($rows as $r) : ?>
		<a href="brainstormDetail/show/<?php echo $r->PK_Brainstorm_ID; ?>">
		<article class="brainstorm">
			<div class="content">
				<h1 class="brainstorm-title"><?php echo $r->Brainstorm_Title; ?></h1>
				<span class="posted"><?php echo $r->User_Username; ?> - <?php echo $r->Brainstorm_Timestamp; ?></span>
			</div>
			<span class="arrow"></span>
		</article>
		</a>
		<?php endforeach; ?>
	</div>

	<?php include('includes/navbar.php')?>

</body>
</html>
