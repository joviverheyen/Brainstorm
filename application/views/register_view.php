<?php /*$this->load->view('header');*/ ?>
<?php include('head.php')?>
<body>
	
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

</body>
</html>
<?php /*$this->load->view('footer');*/ ?>
