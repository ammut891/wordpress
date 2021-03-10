<?php
/**
 * Keenshot functions and definitions
 *
 * @link
 *
 * @package Keenshot
 */

if ( ! function_exists( 'keenshot_scripts' ) ) {
	/**
	 * Enqueue scripts and styles.
	 */
	function keenshot_scripts() {

		wp_enqueue_style( "bootstrap-css", get_theme_file_uri( "/assets/css/bootstrap.min.css" ), null, time() );
		wp_enqueue_style( "font-awesome-css", get_theme_file_uri( "/assets/css/fontawesome.min.css" ), null, time() );
		wp_enqueue_style( "slick-css", get_theme_file_uri( "/assets/css/slick.min.css" ), null, "1.0" );
		wp_enqueue_style( "magnific-popup-css", get_theme_file_uri( "/assets/css/magnific-popup.css" ), time(), "1.0" );
		wp_enqueue_style( "main-style-css", get_theme_file_uri( "/assets/css/main-style.css" ), null, time() );
		wp_enqueue_style( "keenshot-css", get_stylesheet_uri(), false, time() );
		//wp_enqueue_style( "google-font-css", '//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,600i,700&display=swap' );

		wp_enqueue_script( "bootstrap-js", get_theme_file_uri( "/assets/js/bootstrap.min.js" ), array( "jquery" ), "1.0", true );
		wp_enqueue_script( "slick-js", get_theme_file_uri( "/assets/js/slick.min.js" ), array( "jquery" ), "1.0", true );
		wp_enqueue_script( "mixitup-js", get_theme_file_uri( "/assets/js/mixitup.min.js" ), array( "jquery" ), "1.0", true );
		wp_enqueue_script( 'magnific-popup-js', get_theme_file_uri( '/assets/js/jquery.magnific-popup.min.js' ), array( 'jquery' ), '1.0', true );
		wp_enqueue_script( "scripts-js", get_theme_file_uri( "/assets/js/scripts.js" ), array( "jquery" ), time(), true );
		wp_enqueue_script( "custom-js", get_theme_file_uri( "/assets/js/custom.js" ), array( "jquery" ), time(), true );
		wp_register_script( 'like-post', get_theme_file_uri( '/assets/js/like-post.js' ), array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'like-post' );

		if ( is_page_template( 'page-templates/portfolio.php' ) ) {
			wp_enqueue_style( "magnific-popup-css", get_theme_file_uri( "/assets/css/magnific-popup.css" ), time(), "1.0" );
			wp_enqueue_script( 'magnific-popup-js', get_theme_file_uri( '/assets/js/magnific-popup.min.js' ), array( 'jquery' ), '1.0', true );
			wp_enqueue_script( "scripts-js", get_theme_file_uri( "/assets/js/scripts.js" ), array( "jquery" ), time(), true );
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) || is_page() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

}
add_action( 'wp_enqueue_scripts', 'keenshot_scripts' );

// Load Google Font

if (!function_exists('keenshot_web_fonts_url')):
    function keenshot_web_fonts_url($font)
    {
        $font_url = '';

        if ('off' !== _x('on', 'Google font: on or off', 'keenshot')) {
            $font_url = add_query_arg('family', $font, "//fonts.googleapis.com/css");
        }
        return $font_url;
    }
endif;


// Enqueue Scripts and Styles.

if (!function_exists('keenshot_font_scripts')):
    function keenshot_font_scripts(){
		$heading_font = get_theme_mod('keenshot_heading_font', 'Bebas Neue');
		$body_font = get_theme_mod('keenshot_body_font', 'Montserrat');
		$font_param = [];

		if($heading_font != '' && $heading_font != 'Bebas Neue'){
			$font_param[] = $heading_font . ':300,400,500,600,600i,700';
		}

		if($body_font != ''){
			$font_param[] = $body_font . ':300,400,500,600,600i,700';
		}

		$font_str = implode('|', $font_param);

		wp_enqueue_style('keenshot-web-font', keenshot_web_fonts_url($font_str), array(), '1.0.0');
		
		$typo_css = '';

		if($heading_font != '' && $heading_font != 'Bebas Neue'){
			$typo_css .= "
			h1, h2, h3, h4, h5, h6, .btn,
			.photography-services .service-item .bg-media-wrapper .view-all a,
			.photography-services .service-item .service-meta .title,
			.photography-services .service-item .service-meta .cta-btn,
			.blog-list ul.post-items .post-item .post-meta .title,
			.blog-list ul.post-items .post-item .post-meta .data p,
			.blog-single .default-editor .post-password-form p input[type=submit],
			.blog-single .sidebar .widgettitle,
			.contact-information .contact-info p strong,
			.skills .skills-bar .progress .progress-value,
			.portfolios .filter-menu ul li,
			.portfolios .mobile-filter #FilterSelect option,
			.portfolios .mobile-filter #FilterSelect,
			.footer .quick-contact .info-item a, .footer .quick-contact .info-item p{
					font-family: {$heading_font};
			}";
		}

		if($body_font != ''){
			$typo_css .= "
			body,
			a,
			.header .navbar .navigation .nav.navbar-nav li a,
			.blog-list ul.post-items .post-item .post-meta .comment-whislist a,
			.blog-single .blog-content .post-meta .data p,
			.shop-page .sidebar .woocommerce-product-search input,
			.blog-single .sidebar .widget_categories li,
			.blog-single .sidebar .widget_categories li a, .blog-single .sidebar .widget_categories li span,
			.blog-single .sidebar .search-form-wraper input{
					font-family: {$body_font};
			}
			,
			.blog-single .sidebar .search-form-wraper input::-webkit-input-placeholder{font-family: {$body_font};}
			.blog-single .sidebar .search-form-wraper input::-moz-placeholder{font-family: {$body_font};}
			.blog-single .sidebar .search-form-wraper input:-ms-input-placeholder{font-family: {$body_font};}
			.blog-single .sidebar .search-form-wraper input:-moz-placeholder{font-family: {$body_font};}";
		}
        
        wp_add_inline_style( 'main-style-css', $typo_css );
    }
endif;
add_action('wp_enqueue_scripts', 'keenshot_font_scripts');

if ( ! function_exists( 'keenshot_admin_scripts' ) ) {
	function keenshot_admin_scripts() {
		wp_enqueue_style( "keenshot-admin-css", get_theme_file_uri( "/assets/css/admin.css" ) );
		wp_enqueue_style( "keenshot-admin-pro", get_theme_file_uri( "/assets/css/redux-admin.min.css" ) );
		wp_enqueue_script( 'jquery.syotimer', get_theme_file_uri( '/assets/js/jquery.syotimer.min.js' ), [ 'jquery' ], '2.1.2', true );
		wp_enqueue_script( "keenshot-admin-js", get_theme_file_uri( "/assets/js/admin.js" ), array('jquery'), false, true );
	}
}

add_action( 'admin_enqueue_scripts', 'keenshot_admin_scripts' );

function keenshot_pinit_js(){
	?>
		<script type="text/javascript" async defer data-pin-color="" data-pin-height="28" data-pin-hover="true" src="https://assets.pinterest.com/js/pinit.js"></script>
	<?php
}
add_action('wp_footer', 'keenshot_pinit_js');
