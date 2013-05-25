<?php /*$this->load->view('header');*/ ?>

<?php include('includes/head.php')?>
<body>

	<div class="form">
		<form action="/brainstorm/index.php/forgot_pw/new_pw" method="post">
			<input type="email" name="email" id="email" placeholder="Enter you email address" /> 
			<br />
			<input type="submit" value="Send New Password" id="btnSubmit" />
		</form>

	</div>
	
 </body>

</html>
<?php /*$this->load->view('footer');*/ ?>
