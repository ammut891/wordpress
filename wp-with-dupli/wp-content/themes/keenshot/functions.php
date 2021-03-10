<?php
/**
 * Keenshot functions and definitions
 *
 * @link
 *
 * @package keenshot
 */

/**
 * Keenshot Theme Version
 */
if ( ! defined( 'KEENSHOT_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();
	define( 'KEENSHOT_THEME_VERSION', $theme_data->get( 'Version' ) );
}

/**
 * Keenshot Walker Activation
 */
require get_template_directory() . '/inc/walker.php';

/**
 * Keenshot Required Plugin Recommendation
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Keenshot Theme Functions
 */
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/customizer-functions.php';
require get_template_directory() . '/inc/customizer.php';

/**
 * Keenshot extra theme function
 */

require get_template_directory() . '/inc/extras.php';

/**
 * Keenshot pro options
 */

require get_template_directory() . '/inc/pro-options.php';

/**
 * Configure one click demo
 */
require get_template_directory() . '/inc/demo-config.php';


require get_template_directory() . '/inc/class-theme-setup-wizard.php';

/**
 * [Appsero SDK]
 */

/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_keenshot() {

    if ( ! class_exists( 'Appsero\Client' ) ) {
      require_once __DIR__ . '/inc/appsero/src/Client.php';
    }

    $client = new Appsero\Client( 'fbecd438-1d80-4227-8c47-8903b648a257', 'Keenshot', __FILE__ );

    // Active insights
    $client->insights()->init();

}

appsero_init_tracker_keenshot();

//next and prev post customization
function filter_single_post_pagination($output, $format, $link, $post){

	if(empty($post)){
		return false;
	}
	$title = get_the_title($post);
	$url   = get_permalink($post->ID);
	$class = 'btn btn-primary btn-lg my-2 text-limit btn-block';
	$rel   = 'prev';

	if('next_post_link' === current_filter()){
		$class = 'btn btn-primary btn-lg my-2 text-limit btn-block';
		$rel   = 'next';
	}
	return "<a href='$url' rel='$rel' class='$class'>$title</a>";
}
add_filter( 'previous_post_link', 'filter_single_post_pagination', 10, 4);
add_filter( 'next_post_link', 'filter_single_post_pagination', 10, 4);

