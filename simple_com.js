window.onload = function(){
	
	jQuery(document).ready();

	$ = jQuery;
	
	$('#title').on('change', function(){
		var title = $(this).val();
		$('#subject_mail').val(title);
		$('#text_share').val(title);		
	});

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

	$('#copy_article').on('click', function(e){
		var iframe = $('iframe#content_ifr').contents().find("p");
		var value_iframe = iframe.html();

		alert(value_iframe);
		$('#text_mail').val(value_iframe);

		e.preventDefault();
		return false;
	});

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
		var change_url = $('#url_share').val();
		//alert(change_url);
		var data = {
			'action': 'change_url_ajax',
			'url': change_url      // We pass php values differently!
		};
		// We can also pass the url value separately from ajaxurl for front end AJAX implementations
		jQuery.post(ajaxurl, data, function(response) {
			$('#load_new_url').html('<label for="url_share" >Change URL :</label><input type="text" name="url_share" id="url_share" value="' + change_url + '"/></div><div id="shareBtn" class="fb-share-button" data-href="' + change_url + '" data-layout="button" data-size="small" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2FEssai-199436430494197%2F&amp;src=sdkpreparse">Partager</a>');
		});
	});

};
