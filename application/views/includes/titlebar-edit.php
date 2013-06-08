<?php $url = htmlspecialchars($_SERVER['HTTP_REFERER']); ?>

<!-- code voor de opbouw komt van http://alistapart.com/article/holygrail -->
<!--<div class="titlebar-container clearfix">-->
	<div class="titlebar">
		<div class="column" id="center"><span class="titlebar-title">brainstorm</span></div>
		<a href="<?php echo $url; ?>" class="titlebar-button" id="titlebar-back-button">
			<div class="column" id="left"><span>back</span></div>
		</a>
		<a href="/brainstorm/index.php/editProfile" class="titlebar-button" id="titlebar-edit-button">
			<div class="column" id="right"><span>edit</span></div>
		</a>
	</div>
	<hr id="titlebar-divider"/>
<!--</div>-->