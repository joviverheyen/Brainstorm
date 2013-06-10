<?php include('includes/head.php')?>
<body>
	
	<?php include('includes/titlebar.php')?>
	
	<div class="filter clearfix">
		<a href="/brainstorm/index.php/brainstormList" class="filter-button" id="following-button"><span>following</span></a>
		<a href="/brainstorm/index.php/brainstormList/newest" class="filter-button" id="new-button"><span>new</span></a>
		<a href="/brainstorm/index.php/brainstormList/subscription" class="filter-button active" id="subscribed-button"><span>subscribed</span></a>
	</div>
	
	<div class="brainstorm-container">
		<?php if(isset($rows)) : ?>
		<?php foreach($rows as $r) : ?>
		<a href="http://ajweb.be/brainstorm/index.php/brainstormDetail/show/<?php echo $r->PK_Brainstorm_ID; ?>">
		<article class="brainstorm">
			<div class="content">
				<h1 class="brainstorm-title"><?php echo $r->Brainstorm_Title; ?></h1>
				<span class="posted"><?php echo $r->User_Username; ?> - <?php echo $r->Brainstorm_Timestamp; ?></span>
			</div>
			<span class="arrow"></span>
		</article>
		</a>
		<?php endforeach; ?>
		<?php else : ?>
			<p>You have no subscriptions.</p>
		<?php endif; ?>
	</div>

	<?php include('includes/navbar-home.php')?>

</body>
</html>
