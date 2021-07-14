jQuery(function(jQuery){ // use jQuery code inside this to avoid "jQuery is not defined" error
	jQuery('.misha_loadmore').click(function(){
 
		var button = jQuery(this),
		    data = {
			'action': 'loadmore',
			'query': misha_loadmore_params.posts, // that's how we get params from wp_localize_script() function
			'page' : misha_loadmore_params.current_page
		};
 
		jQuery.ajax({ // you can also use jQuery.post here
			url : misha_loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Carregando...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) { 
					button.text( 'Carregar mais projetos' ).prev().after(data); // insert new posts
					misha_loadmore_params.current_page++;
 
					if ( misha_loadmore_params.current_page == misha_loadmore_params.max_page ) {
                        button.replaceWith("<div class='load-over'>Carregar mais projetos <i class='fas fa-long-arrow-alt-down'></i></div>");
                    }

 
					// you can also fire the "post-load" event here if you use a plugin that requires it
					// jQuery( document.body ).trigger( 'post-load' );
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
    });
});