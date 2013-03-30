<?php /*$this->load->view('header');*/ ?>
<<<<<<< HEAD
<?php include('head.php')?>
<body>
	
=======
<!DOCTYPE html>
<html>
  <head>
	<meta charset=utf-8>
	
	<!-- stylesheet -->
	<link rel="stylesheet" href="/brainstorm/assets/css/reset.css">
	<link rel="stylesheet" href="/brainstorm/assets/css/style.css">
	
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<title>Brainstorm - Login</title>
	
  </head>
  <body>
  
>>>>>>> Login
	<div class="form">
		<form action="/brainstorm/index.php/login/validate_credentials" method="post">
			<input type="text" name="usern" id="usern" placeholder="Username" /> <br />
			<input type="password" name="password" id="password" placeholder="Password"/> <br />
			<input type="submit" value="Log in" id="btnLogin" />
		</form>
<<<<<<< HEAD
	</div>
	
	<div class="forgot"><a href="#">I forgot my password</a></div>
	<div class="btnContainer"><div class="switchBtn"><a href="/brainstorm/index.php/register">Create account</a></div></div>

</body>
=======
		
		<div class="forgot"><a href="#">I forgot my password</a></div>
		
		<div class="btnCreate"><a href="/brainstorm/index.php/register">Create account</a></div>
	</div>
	
 </body>
>>>>>>> Login
</html>
<?php /*$this->load->view('footer');*/ ?>
