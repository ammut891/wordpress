jQuery(document).ready(function ($) {

    // Uploading files
    var file_frame;

    jQuery.fn.upload_icon_image = function (button) {
        var button_id = button.attr('id');
        var field_id = button_id.replace('_button', '');

        // If the media frame already exists, reopen it.
        if (file_frame) {
            file_frame.open();
            return;
        }

        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
            title: jQuery(this).data('uploader_title'),
            button: {
                text: jQuery(this).data('uploader_button_text'),
            },
            multiple: false
        });

        // When an image is selected, run a callback.
        file_frame.on('select', function () {
            var attachment = file_frame.state().get('selection').first().toJSON();
            jQuery("#" + field_id).val(attachment.id);
            jQuery("#idfyimagediv img").attr('src', attachment.url);
            jQuery('#idfyimagediv img').show();
            jQuery('#' + button_id).attr('id', 'remove_idfy_image_button');
            jQuery('#remove_idfy_image_button').text('Remove body image');
        });

        // Finally, open the modal
        file_frame.open();
    };

    jQuery('#idfyimagediv').on('click', '#upload_idfy_image_button', function (event) {
        event.preventDefault();
        jQuery.fn.upload_icon_image(jQuery(this));
    });

    jQuery('#idfyimagediv').on('click', '#remove_idfy_image_button', function (event) {
        event.preventDefault();
        jQuery('#upload_idfy_image').val('');
        jQuery('#idfyimagediv img').attr('src', '');
		 jQuery('#idfyimagediv img').removeAttr('srcset');
        jQuery('#idfyimagediv img').hide();
        jQuery(this).attr('id', 'upload_idfy_image_button');
        jQuery('#upload_idfy_image_button').text('Set body image');
    });			
});

jQuery(document).ready(function ($) {

	$('button.load-more-btn').on('click', function() {	 
		var page = $("button.load-more-btn").data('page');
		var newPage = page + 1;
		$('button.load-more-btn').hide();	
		$('.no-posts-found').remove();	
		$( "button.load-posts-btn" ).show();
			$.ajax({
				url: idfy.ajaxurl,
				type: 'post',
				data: {
				page: page,
				action: "idfy"
				},
				error: function(data) {
				console.log(data);
				},
				success:function( data ) {	
				if (data == 0) {
					 $('button.load-more-btn').hide();
					 $( "button.load-posts-btn" ).hide();	
					 $('button.load-more-btn').after('<p class="no-posts-found">No more posts found.</p>');
				}
				else
				{
					$("button.load-more-btn").data('page', newPage);
					$('.bottom-post-listing').append(data);
					$( "button.load-posts-btn" ).hide();	
					$('button.load-more-btn').show();	
				}
				},
				error: function(){
				console.log(errorThrown); 
				}
		});
	});
});	