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
	
});