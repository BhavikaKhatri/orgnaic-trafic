<?php

/**
 * Organic Traffic Theme Functions
 *
 * @package OrganicTraffic
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

// Start session if not already started.
if (!session_id()) {
	session_start();
}

/**
 * Enqueue theme styles.
 */
function organic_trafic_enqueue_styles()
{
	wp_enqueue_style(
		'organic-trafic-style',
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme()->get('Version')
	);

	wp_enqueue_style(
		'custom',
		get_template_directory_uri() . '/assets/css/custom.css',
		array(),
		wp_get_theme()->get('Version')
	);
}
add_action('wp_enqueue_scripts', 'organic_trafic_enqueue_styles');


/**
 * Register Custom Navigation Menus.
 * - 'default_menu' is displayed for non-organic users.
 * - 'organic_menu' is displayed for users coming from search engines.
 */
function organic_trafic_register_menus()
{
	register_nav_menus(
		array(
			'default_menu' => __('Default Menu', 'organic_trafic'),
			'organic_menu'  => __('Organic Menu', 'organic_trafic'),
		)
	);
}
add_action('after_setup_theme', 'organic_trafic_register_menus');

/**
 * Detect Organic Traffic
 * - Checks if the user arrived from a search engine.
 * - Stores the result in a session variable `is_organic`.
 */
function detect_organic_traffic()
{
	// Start session if not already started.
	if (!session_id()) {
		session_start();
	}

	// If session variable is already set, no need to check again.
	if (isset($_SESSION['is_organic'])) {
		return;
	}

	// Get the referring URL.
	$referer = isset($_SERVER['HTTP_REFERER']) ? strtolower($_SERVER['HTTP_REFERER']) : '';

	// List of search engines to check against.
	$search_engines = array('google', 'bing', 'yahoo', 'duckduckgo', 'baidu', 'yandex');

	// Default: User is not organic.
	$_SESSION['is_organic'] = false;

	// Check if the referrer matches any search engine.
	foreach ($search_engines as $engine) {
		if (strpos($referer, $engine) !== false) {
			$_SESSION['is_organic'] = true;
			break;
		}
	}
}
add_action('init', 'detect_organic_traffic', 1);

/**
 * Switch Navigation Menu Based on Traffic Source
 * - If the session variable `is_organic` is true, show the organic menu.
 * - Otherwise, show the default menu.
 */
function switch_menu_based_on_traffic($args)
{
	// Start session if not already started.
	if (!session_id()) {
		session_start();
	}

	// Set the menu location based on the session variable.
	if (isset($_SESSION['is_organic']) && $_SESSION['is_organic'] === true) {
		$args['theme_location'] = 'organic_menu';
	} else {
		$args['theme_location'] = 'default_menu';
	}
	return $args;
}
add_filter('wp_nav_menu_args', 'switch_menu_based_on_traffic');

/**
 * Modify Logo Text Based on Traffic Source
 * - If the user is organic, append "Organic" under the logo.
 * - If not, append "Default".
 */
function modify_logo_with_subtext($html)
{
	// Start session if not already started.
	if (!session_id()) {
		session_start();
	}

	// Set logo subtext based on traffic source.
	$subtext = (isset($_SESSION['is_organic']) && $_SESSION['is_organic']) ? 'Organic' : 'Default';

	// Append subtext below the logo.
	$html .= '<p class="logo-subtext">' . esc_html($subtext) . '</p>';
	return $html;
}
add_filter('get_custom_logo', 'modify_logo_with_subtext');

/**
 * Debugging Function: Log Menu Switching Process
 * - Writes logs to the WordPress debug log to verify correct menu switching.
 * - Useful for troubleshooting.
 */
function debug_switch_menu_based_on_traffic($args)
{
	// Start session if not already started.
	if (!session_id()) {
		session_start();
	}

	// Log session status.
	error_log('Session Organic Status: ' . print_r($_SESSION['is_organic'], true));

	// Log which menu is being used.
	if (isset($_SESSION['is_organic']) && $_SESSION['is_organic'] === true) {
		$args['theme_location'] = 'organic_menu';
		error_log('Switching to Organic Menu');
	} else {
		$args['theme_location'] = 'default_menu';
		error_log('Switching to Default Menu');
	}

	return $args;
}
add_filter('wp_nav_menu_args', 'debug_switch_menu_based_on_traffic');
