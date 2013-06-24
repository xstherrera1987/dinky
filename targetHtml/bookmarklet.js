// copy into JS console
(function() {
	var head = document.getElementsByTagName('head')[0];
	var script = document.createElement('script');
	script.type = 'text/javascript';
	script.src = 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js';
	head.appendChild(script);
	setTimeout( function() { 
		if (jQuery) {
			alert ("jQuery loaded");
		} else {
			alert ("jQuery loading failed");
		}
	},1500);
})();


// minified (save as bookmark)
javascript:(function(){var e=document.getElementsByTagName("head")[0];var t=document.createElement("script");t.type="text/javascript";t.src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js";e.appendChild(t);setTimeout(function(){if(jQuery){alert("jQuery loaded")}else{alert("jQuery loading failed")}},1500)})()
