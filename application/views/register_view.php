<?php /*$this->load->view('header');*/ ?>

	<h1 class="title">Register</h1>
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
		
		<a href="/brainstorm/index.php">I already have an account</a>
	</div>


<?php /*$this->load->view('footer');*/ ?>
