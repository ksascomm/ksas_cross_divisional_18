<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package KSASAcademic
 * @since KSASAcademic 1.0.0
 */


// Check to see if rev-manifest exists for CSS and JS static asset revisioning
//https://github.com/sindresorhus/gulp-rev/blob/master/integration.md

if ( ! function_exists( 'ksasacademic_asset_path' ) ) :
	function ksasacademic_asset_path( $filename ) {
		$filename_split = explode( '.', $filename );
		$dir            = end( $filename_split );
		$manifest_path  = dirname( dirname( __FILE__ ) ) . '/dist/assets/' . $dir . '/rev-manifest.json';

		if ( file_exists( $manifest_path ) ) {
			$manifest = json_decode( file_get_contents( $manifest_path ), true );
		} else {
			$manifest = [];
		}

		if ( array_key_exists( $filename, $manifest ) ) {
			return $manifest[ $filename ];
		}
		return $filename;
	}
endif;


if ( ! function_exists( 'ksasacademic_scripts' ) ) :
	function ksasacademic_scripts() {

		// Enqueue the main Stylesheet.
		//wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/dist/assets/css/' . ksasacademic_asset_path( 'app.css' ), array(), '5.1.0', 'all' );

	    wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/dist/assets/css/app.css', array(), filemtime(get_template_directory() . '/src/assets/scss'), 'all' );


		// Deregister the jquery version bundled with WordPress.
		//wp_deregister_script( 'jquery' );

		// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		//wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', false );

		// Deregister the jquery-migrate version bundled with WordPress.
		//wp_deregister_script( 'jquery-migrate' );

		// CDN hosted jQuery migrate for compatibility with jQuery 3.x
		//wp_register_script( 'jquery-migrate', '//code.jquery.com/jquery-migrate-3.3.2.min.js', array('jquery'), '3.3.2', false );

		// Enqueue jQuery migrate. Uncomment the line below to enable.
		//wp_enqueue_script( 'jquery-migrate' );

		// Enqueue Foundation scripts
		wp_enqueue_script( 'foundation', get_template_directory_uri() . '/dist/assets/js/' . ksasacademic_asset_path( 'app.js' ), array( 'jquery' ), '5.1.0', true );

		// Enqueue FontAwesome from CDN. Uncomment the line below if you need FontAwesome.
		//wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.13.0/css/all.css', array(), '5.13.0', 'all' );

		// Add the comment-reply library on pages where it is necessary
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	add_action( 'wp_enqueue_scripts', 'ksasacademic_scripts' );
endif;

// Defer non-essential/plugin javascript files
// Defer jQuery Parsing using the HTML5 defer property
function defer_parsing_of_js( $url ) {
	if ( is_user_logged_in() ) return $url; //don't break WP Admin
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	if ( strpos( $url, 'jquery.min.js' ) ) return $url;
	return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );

//remove Tablepress default styles; use Foundation
//add_filter( 'tablepress_use_default_css', '__return_false' );


add_action('admin_head', 'cpt_meta_background_color');
function cpt_meta_background_color() {
	echo '<style>
	.post-type-testimonial .edit-post-layout .interface-interface-skeleton__content {
		background-color: #fefefe;
	}
	</style>';
}
