<?php include('includes/head.php')?>
<body>

	<div class="form">
		<form action="/brainstorm/index.php/forgot_pw/new_pw" method="post">
			<input type="email" name="email" id="email" placeholder="Enter you email address" /> 
			<br />
			<input type="submit" value="Send New Password" id="btnSubmit" />
		</form>
	</div>
	
	<div class="forgot"><a href="<?php echo site_url('') ?>">Login</a></div>
	
 </body>
</html>
