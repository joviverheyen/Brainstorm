<?php include('includes/head.php')?>
<body>
	
	<?php include('includes/titlebar.php')?>
	
	<div class="form">
		<?php echo form_open(''); ?> <!--NAAR WAAR POSTEN NOG INVULLEN-->
			<div class="search-filter clearfix">
				<input type="radio" id="search-brainstorms" name="search"/>
				<label for="search-brainstorms"><span class="search-filter-button">Search for brainstorms</span></label>
				<input type="radio" id="search-users" name="search"/>
				<label for="search-users"><span class="search-filter-button">Search for users</span></label>
			</div>

			<input type="text" name="query" id="query" placeholder="Search for..." /> <br />
			
			<input type="submit" value="Search" id="btnSearch"/>
				
		<?php echo form_close(); ?>
	</div>
	
	<?php include('includes/navbar-search.php')?>

</body>
</html>