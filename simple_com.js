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

};
