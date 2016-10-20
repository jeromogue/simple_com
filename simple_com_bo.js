window.onload = function(){
	
	jQuery(document).ready();

	$ = jQuery;

	$('.options_bo_simple_com').on('click', function(e){
		var mail = $('#box_mail').val();
		var facebook = $('#share_facebook').val();
		alert("facebook : " + facebook + " et mail : " + mail);
		$.ajax({
			type: "POST",
			url: "../wp-content/plugins/simple_com/options_bo_ajax.php",
			data: "facebook=" + facebook + "&box_mail=" + mail,
			success: function( data ) {
				alert('Enregistré en bdd');
			}
		});

		e.preventDefault();
		return false;
	});

};