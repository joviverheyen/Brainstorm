<?php /*$this->load->view('header');*/ ?>

	<h1 class="title">Login</h1>
	<div class="form">
		<form action="/brainstorm/index.php/login/validate_credentials" method="post">
			<input type="text" name="usern" id="usern" placeholder="Username" /> <br />
			<input type="password" name="password" id="password" placeholder="Password"/> <br />
			<input type="checkbox" name="remember" id="remember" />
			<label for="remember">Remember me?</label><br />
			<input type="submit" value="Log in" id="btnLogin" />
		</form>
		
		<a href="#">I forgot my password</a>
		
		<div class="btnCreate"><a href="/brainstorm/index.php/register">Create account</a></div>
	</div>


<?php /*$this->load->view('footer');*/ ?>
