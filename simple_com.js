window.onload = function(){
	
	jQuery(document).ready();

	$ = jQuery;
	
	$('#title').on('change', function(){
		var title = $(this).val();
		$('#subject_mail').val(title);
		$('#text_share').val(title);		
	});

	// $('#wpwrap').on('click','#content_ifr',function(){
	// 	alert("w");
	// });

	// $('#tinymce[data-id=content]').on('click', function(){
	// 	alert('bag');
	// });

	// ajax mail

	$('#send_mail').on('click', function(e){
		var subject = $('#subject_mail').val();
		var users = $('#liste_users').val();
		var message = $('#text_mail').val();
		alert("sujet : " + subject + " et users : " + users + " et message : " + message);
		$.ajax({
			type: "POST",
			url: "../wp-content/plugins/simple_com/initialisation_mail.php",
			data: "subject=" + subject + "&users=" + users + "&message=" + message,
			success: function( data ) {
				alert('Mail envoyé')
			}
		});

		e.preventDefault();
		return false;
	});

	//Facebook

	window.fbAsyncInit = function() {
	FB.init({
	appId      : '877169725742238',
	xfbml      : true,
	version    : 'v2.8'
	});
	FB.AppEvents.logPageView();
	};

	(function(d, s, id){
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));


	document.getElementById('shareBtn').onclick = function() {
		FB.ui({
		method: 'share',
		display: 'popup',
		href: 'https://developers.facebook.com/docs/',
		}, function(response){});
	}
};