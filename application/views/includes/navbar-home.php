<div class="navbar">
	<div class="button-container clearfix">
		<a href="<?php echo site_url('brainstormList') ?>" class="navbar-button active" id="home-button"><span>home</span></a>
		<a href="<?php echo site_url('profile') . '/index/' . $this->session->userdata('userid'); ?>" class="navbar-button" id="profile-button"><span>profile</span></a>
		<a href="<?php echo site_url('search') ?>" class="navbar-button" id="search-button"><span>search</span></a>
	</div>
</div>