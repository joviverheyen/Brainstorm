<!-- code voor de opbouw komt van http://alistapart.com/article/holygrail -->
<!--<div class="titlebar-container clearfix">-->
	<div class="titlebar">
		<div class="column" id="center"><span class="titlebar-title">brainstorm</span></div>
		<a href="javascript:history.back()" class="titlebar-button" id="titlebar-back-button">
			<div class="column" id="left"><span>back</span></div>
		</a>
		<?php foreach($brainstorm as $r) : ?>
		<a href="/brainstorm/index.php/editBrainstorm/index/<?php echo $r->PK_Brainstorm_ID; ?>" class="titlebar-button" id="titlebar-edit-button">
			<div class="column" id="right"><span>edit</span></div>
		</a>
		<?php endforeach; ?>
	</div>
	<hr id="titlebar-divider"/>
<!--</div>-->