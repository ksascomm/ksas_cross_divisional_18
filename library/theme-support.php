<?php
/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 *
 * @package KSASAcademic
 * @since KSASAcademic 1.0.0
 */

if ( ! function_exists( 'ksasacademic_theme_support' ) ) :
	function ksasacademic_theme_support() {
		// Add language support
		load_theme_textdomain( 'ksasacademic', get_template_directory() . '/languages' );

		// Switch default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
		add_theme_support( 'post-thumbnails' );

		// Add menu support
		add_theme_support( 'menus' );

		// RSS thingy
		add_theme_support( 'automatic-feed-links' );

		// Add post formats support: http://codex.wordpress.org/Post_Formats
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

		// Add Page Excerpt Box
		add_post_type_support( 'page', 'excerpt' );

		// Enable block styles on the front end
		add_theme_support( 'wp-block-styles' );

	}

	add_action( 'after_setup_theme', 'ksasacademic_theme_support' );
endif;

add_action( 'wp_head', 'ksas_default_site_icon', 99 );
add_action( 'login_head', 'ksas_default_site_icon', 99 );

function ksas_default_site_icon() {
	if ( ! has_site_icon() && ! is_customize_preview() ) {
		echo '<link rel="shortcut icon" type="image/png" href="' . get_template_directory_uri() . '/dist/assets/images/favicons/favicon.ico" />';

		echo '<link rel="icon" type="image/png" sizes="16x16" href="' . get_template_directory_uri() . '/dist/assets/images/favicons/favicon-16x16.png" />';
		echo '<link rel="icon" type="image/png" sizes="32x32" href="' . get_template_directory_uri() . '/dist/assets/images/favicons/favicon-32x32.png" />';
		echo '<link rel="icon" type="image/png" sizes="96x96" href="' . get_template_directory_uri() . '/dist/assets/images/favicons/favicon-96x96.png" />';

		echo '<link rel="apple-touch-icon" sizes="120x120" href="' . get_template_directory_uri() . '/dist/assets/images/favicons/apple-touch-icon-120x120.png" />';
		echo '<link rel="apple-touch-icon" sizes="152x152" href="' . get_template_directory_uri() . '/dist/assets/images/favicons/apple-touch-icon-152x152.png" />';
		echo '<link rel="apple-touch-icon" sizes="180x180" href="' . get_template_directory_uri() . '/dist/assets/images/favicons/apple-touch-icon-180x180.png" />';
	}
}
