<?php

/*
 * Plugin Name:       RW DSGVO
 * Plugin URI:        https://github.com/rpi-virtuell/rw-dsgvo
 * Description:       RPI Virtuell - DSGVO Handling
 * Version:           0.0.2
 * Author:            Frank Neumann-Staude
 * Author URI:        https://staude.net
 * License:           GNU General Public License v2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:       /languages
 * Text Domain:       rw-dsgvo
 * GitHub Plugin URI: https://github.com/rpi-virtuell/rw-dsgvo
 * GitHub Branch:     master
 * Requires WP:       4.9.6
 * Requires PHP:      5.3
 *
 * Based on Cache Dynamic Cookie from WP Rocket/SAS WP MEDIA
 * Thanks to Caspar
 *
 */


defined( 'ABSPATH' ) or die();

define( 'RW_DSGVO_COOKIE_NAME', 'rw-dsgvo' );


/**
 * Define cookie ID for dynamic caches.
 */
function rw_dsgvo_cache_dynamic_cookie( array $cookies ) {
	$cookies[] = RW_DSGVO_COOKIE_NAME;
	return $cookies;
}

add_filter( 'rocket_cache_dynamic_cookies', 'rw_dsgvo_cache_dynamic_cookie' );
add_filter( 'rocket_htaccess_mod_rewrite', '__return_false' );

/**
 * Updates .htaccess, regenerates WP Rocket config file.
 */
function rw_dsgvo_flush_wp_rocket() {
	if ( ! function_exists( 'flush_rocket_htaccess' )
	     || ! function_exists( 'rocket_generate_config_file' ) ) {
		return false;
	}
	flush_rocket_htaccess();
	rocket_generate_config_file();
}

/**
 * Add customizations, updates .htaccess, regenerates config file.
 */
function rw_dsgvo_activate() {
	add_filter( 'rocket_htaccess_mod_rewrite', '__return_false' );
	add_filter( 'rocket_cache_dynamic_cookies', 'rw_dsgvo_cache_dynamic_cookie' );
	rw_dsgvo_flush_wp_rocket();
}
register_activation_hook( __FILE__, 'rw_dsgvo_activate' );

/**
 * Removes customizations, updates .htaccess, regenerates config file.
 */
function rw_dsgvo_deactivate() {
	remove_filter( 'rocket_htaccess_mod_rewrite', '__return_false' );
	remove_filter( 'rocket_cache_dynamic_cookies', 'rw_dsgvo_cache_dynamic_cookie' );
	flush_wp_rocket();
}
register_deactivation_hook( __FILE__, 'rw_dsgvo_deactivate' );

/**
 * Returns the GDPR template if no cookie
 */
function rw_dsgvo_load_template( $template ) {
	global $wp;

	// Check Useragent. Pass Searchengines
	$crawlers = array(
		'Google' => 'Google',
		'MSN' => 'msnbot',
		'Rambler' => 'Rambler',
		'Yahoo' => 'Yahoo',
		'AbachoBOT' => 'AbachoBOT',
		'accoona' => 'Accoona',
		'AcoiRobot' => 'AcoiRobot',
		'ASPSeek' => 'ASPSeek',
		'CrocCrawler' => 'CrocCrawler',
		'Dumbot' => 'Dumbot',
		'FAST-WebCrawler' => 'FAST-WebCrawler',
		'GeonaBot' => 'GeonaBot',
		'Gigabot' => 'Gigabot',
		'Lycos spider' => 'Lycos',
		'MSRBOT' => 'MSRBOT',
		'Altavista robot' => 'Scooter',
		'AltaVista robot' => 'Altavista',
		'ID-Search Bot' => 'IDBot',
		'eStyle Bot' => 'eStyle',
		'Scrubby robot' => 'Scrubby',
		'Facebook' => 'facebookexternalhit',
	);
	$crawlers_agents = implode('|',$crawlers);

	if ( strpos( $crawlers_agents, $_SERVER[ 'HTTP_USER_AGENT' ] ) !== false ) {
		return $template;
	}
	// Check cookie
	if ( $_REQUEST[ 'dsgvo'] == 'ok' ) {
		setcookie( 'rw-dsgvo',"yes", time()+60*60*24*356*10, '/');
		$ts = '?dsgvo-confirmed='. time();
		if(strpos($wp->request, '?') > 0 ){
			$ts = '&dsgvo-confirmed='. time();
		}
		wp_redirect( home_url( $wp->request . $ts ) );
		exit;
	}

	$dsgvo =$_COOKIE[ RW_DSGVO_COOKIE_NAME ];
	// Check privacy page configured
	$privacypageid = get_option( 'wp_page_for_privacy_policy' );
	$post = get_post( $privacypageid );
	if ($post === null ) {
		return $template;
	}
	if ( isset( $dsgvo ) && $dsgvo == "yes" ) {
		return $template;
	} else {
		$template = plugin_dir_path( __FILE__ ) . 'template.php';
		return $template;
	}
}
add_filter( 'template_include', 'rw_dsgvo_load_template', 9999  );

/**
 * Register Widgets for GDPR Template
 */
function rw_dsgvo_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'GDPR info top', 'rw-dsgvo' ),
		'id'            => 'sidebar-dsgvo-top',
		'description'   => __( 'Add widgets in the top of the privacy policy', 'rw-dsgvo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'GDPR info bottom', 'rw-dsgvo' ),
		'id'            => 'sidebar-dsgvo-bottom',
		'description'   => __( 'Add widgets in the bottom of the privacy policy', 'rw-dsgvo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'rw_dsgvo_widgets_init' );
