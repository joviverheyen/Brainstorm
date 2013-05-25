<?php /*$this->load->view('header');*/ ?>
<?php include('includes/head.php')?>
<body>
	
	<div class="form">
		<form action="/brainstorm/index.php/login/validate_credentials" method="post">
			<input type="text" name="usern" id="usern" placeholder="Username" /> <br />
			<input type="password" name="password" id="password" placeholder="Password"/> <br />
			<input type="submit" value="Log in" id="btnLogin" />
		</form>
	</div>
	
	<div class="forgot"><a href="#">I forgot my password</a></div>
	<div class="btnContainer"><div class="switchBtn"><a href="/brainstorm/index.php/register">Create account</a></div></div>

</body>
</html>
<?php /*$this->load->view('footer');*/ ?>
