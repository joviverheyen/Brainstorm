<?php /*$this->load->view('header');*/ ?>
<?php include('head.php')?>
<body>
	
	<?php include('includes/titlebar.php')?>
	
	<div class="filter"></div>
	
	<div class="brainstorm-container">
		<?php foreach($rows as $r) : ?>
		<a href="#">
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

	<!--<?php include('navbar.php')?>-->

</body>
</html>
<?php /*$this->load->view('footer');*/ ?>
