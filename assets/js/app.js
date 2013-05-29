$(document).ready(function() {

	//fix for links to open inside the app instead of safari when the app is added to the homescreen.
	var a=document.getElementsByTagName("a");
	for(var i=0;i<a.length;i++) {
		a[i].onclick=function()
		{
			window.location=this.getAttribute("href");
			return false;
		}
	}
	
	//Show the title of the brainstorm in the titlebar instead of ON the page
	$('.titlebar-title').text($('.brainstorm-details').attr('data-title'));
	
});