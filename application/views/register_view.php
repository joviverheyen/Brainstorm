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

	<title>Brainstorm - Register</title>
	
  </head>
  <body>

>>>>>>> Login
	<div class="form">
		<div class="feedback">
			<ul>
				<?php /*echo validation_errors();*/ ?>
			</ul>
		</div>
		<form method="post" action="/brainstorm/index.php/register/create_member">
			<input type="text" name="usern" id="usern" placeholder="Username" /> <br />
			<input type="email" name="email" id="email" placeholder="Email" /> <br />
			<input type="password" name="password" id="password" placeholder="Password"/> <br />
			<input type="submit" value="Create account" id="btnCreate" />
		</form>	
	</div>
	
	<div class="btnContainer"><div class="switchBtn"><a href="/brainstorm/index.php">I already have an account</a></div></div>

<<<<<<< HEAD
</body>
=======
 </body>
>>>>>>> Login
</html>
<?php /*$this->load->view('footer');*/ ?>
