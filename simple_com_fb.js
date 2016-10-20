window.onload = function(){

	jQuery(document).ready();

	$ = jQuery;
	//Facebook

	window.fbAsyncInit = function() {
	FB.init({
	appId      : '182783125460188',
	xfbml      : true,
	version    : 'v2.8'
	});
	FB.AppEvents.logPageView();
	};


	(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8&appId=182783125460188";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

	document.getElementById('shareBtn').onclick = function() {
		FB.ui({
			method: 'share_open_graph',
			action_type: 'og.likes',
			action_properties: JSON.stringify({
				object:'google.fr',
			})
		}, function(response){
			// Debug response (optional)
			console.log(response);
		});
	};

	$('#url_share').on('change', function(){
		alert('rentre');
	});

};