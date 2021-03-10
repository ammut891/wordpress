jQuery(document).ready(function($) {

	/***************************************
		ajax like shot feature
	***************************************/
	$(".like").stop().click(function(){

		var rel = $(this).attr("rel");
		//console.log("happening");
		var data = {
			data: rel,
			action: 'like_callback'
		}
		$.ajax({
			action: "like_callback",
			type: "GET",
			dataType: "json",
			url: ajaxurl,
			data: data,
			success: function(data){
				console.log(data.likes);
				console.log(data.status);
				//console.log(rel);
				if(data.status == true){
					$(".like_counter[rel="+rel+"]").html(data.likes + "").addClass("liked");
				}else{
					$(".like_counter[rel="+rel+"]").html(data.likes + "").removeClass("liked");
				}

			}
		});

	});

});