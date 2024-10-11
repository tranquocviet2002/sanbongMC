/*
** Scripts within the customizer controls window.
*/

(function( $ ) {
	wp.customize.bind( 'ready', function() {

	/*
	** Reusable Functions
	*/
		var optPrefix = '#customize-control-football_sports_club_options-';
		
		// Label
		function football_sports_club_customizer_label( id, title ) {

			// Colors

			if ( id === 'football_sports_club_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-football_sports_club_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-football_sports_club_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Top Header

			if ( id === 'football_sports_club_upcoming_match' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-football_sports_club_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'football_sports_club_preloader_hide' || id === 'football_sports_club_sticky_header' || id === 'football_sports_club_scroll_hide' || id === 'football_sports_club_products_per_row' || id === 'football_sports_club_scroll_top_position') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-football_sports_club_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Woocommerce product sale Setting

			if ( id === 'football_sports_club_woocommerce_product_sale' || id === 'football_sports_club_woo_product_border_radius') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-football_sports_club_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Social Icon

			if ( id === 'football_sports_club_facebook_url' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-football_sports_club_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Slider

			if ( id === 'football_sports_club_slider_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-football_sports_club_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-football_sports_club_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
			// Sports Activity

			if ( id === 'football_sports_club_activity_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-football_sports_club_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'football_sports_club_footer_background_color' || id === 'football_sports_club_show_hide_copyright') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-football_sports_club_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
			// Single Post Setting

			if ( id === 'football_sports_club_single_post_thumb' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-football_sports_club_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Comment Setting

			if ( id === 'football_sports_club_single_post_comment_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-football_sports_club_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Setting

			if ( id === 'football_sports_club_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-football_sports_club_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Page Setting

			if ( id === 'football_sports_club_single_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-football_sports_club_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}


	/*
	** Tabs
	*/

		// Colors
		football_sports_club_customizer_label( 'football_sports_club_theme_color', 'Theme Color' );
		football_sports_club_customizer_label( 'background_color', 'Colors' );
		football_sports_club_customizer_label( 'background_image', 'Image' );

		// Site Identity
		football_sports_club_customizer_label( 'custom_logo', 'Logo Setup' );
		football_sports_club_customizer_label( 'site_icon', 'Favicon' );

		// Top Header
		football_sports_club_customizer_label( 'football_sports_club_upcoming_match', 'Top Header' );

		// General Setting
		football_sports_club_customizer_label( 'football_sports_club_preloader_hide', 'Preloader' );
		football_sports_club_customizer_label( 'football_sports_club_sticky_header', 'Sticky Header' );
		football_sports_club_customizer_label( 'football_sports_club_scroll_hide', 'Scroll To Top' );
		football_sports_club_customizer_label( 'football_sports_club_products_per_row', 'Woocommerce setting');
		football_sports_club_customizer_label( 'football_sports_club_scroll_top_position', 'Scroll to top Position' );
		football_sports_club_customizer_label( 'football_sports_club_woocommerce_product_sale', 'Woocommerce Product Sale Positions' );
		football_sports_club_customizer_label( 'football_sports_club_woo_product_border_radius', 'Woocommerce Product Border Radius' );

		// Social Icon
		football_sports_club_customizer_label( 'football_sports_club_facebook_url', 'Social Links' );

		//Slider
		football_sports_club_customizer_label( 'football_sports_club_slider_setting', 'Slider' );

		//Header Image
		football_sports_club_customizer_label( 'header_image', 'Header Image' );

		//Sports Activity
		football_sports_club_customizer_label( 'football_sports_club_activity_setting', 'Sports Activity' );

		//Footer
		football_sports_club_customizer_label( 'football_sports_club_footer_background_color', 'Footer' );
		football_sports_club_customizer_label( 'football_sports_club_show_hide_copyright', 'Copyright' );

		//Single Post Setting
		football_sports_club_customizer_label( 'football_sports_club_single_post_thumb', 'Single Post Setting' );
		football_sports_club_customizer_label( 'football_sports_club_single_post_comment_title', 'Single Post Comment' );

		// Post Setting
		football_sports_club_customizer_label( 'football_sports_club_post_page_title', 'Post Setting' );

		// Page Setting
		football_sports_club_customizer_label( 'football_sports_club_single_page_title', 'Page Setting' );
	

	}); // wp.customize ready

})( jQuery );
