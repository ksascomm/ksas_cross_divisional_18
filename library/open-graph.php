<?php

// Add Open Graph Meta Info from the actual article data, or customize as necessary
function facebook_open_graph() {
	global $post;
	if ( ! is_singular() ) { // if it is not a post or a page
		return;
	}
	if ( $excerpt = $post->post_content ) {
			$uglyexcerpt = strip_tags( $post->post_content );
			$uglyexcerpt = str_replace( '', "'", $uglyexcerpt );
			$excerpt     = wp_trim_words( $uglyexcerpt, 35, '...' );
	} elseif ( is_singular( 'people' ) ) {
		$longexcerpt = strip_tags( get_post_meta( $post->ID, 'ecpt_bio', true ) );
		$longexcerpt = str_replace( '', "'", $longexcerpt );
		$excerpt     = wp_trim_words( $longexcerpt, 15, '...' );
	} else {
		$excerpt = get_bloginfo( 'title' );
	}

		echo '<meta property="og:title" content="' . esc_html( get_the_title() ) . ' | ' . esc_html( get_bloginfo( 'title' ) ) . '"/>';
		echo '<meta property="og:description" content="' . esc_html( $excerpt ) . '"/>';
		echo '<meta property="og:type" content="article"/>';
		echo '<meta property="og:url" content="' . esc_url( get_permalink() ) . '"/>';
		echo '<meta name="twitter:card" content="summary" />';
		echo '<meta name="twitter:site" content="@JHUArtsSciences" />';

		// Customize the below with the name of your site
		echo '<meta property="og:site_name" content="' . get_bloginfo( 'title' ) . '"/>';
	if ( ! has_post_thumbnail( $post->ID ) ) { // the post does not have featured image, use a default image
		// Create a default image on your server or an image in your media library, and insert it's URL here
		$default_image = get_template_directory_uri() . '/dist/assets/images/open-graph-image.jpg';
		echo '<meta property="og:image" content="' . $default_image . '"/>';
	} else {
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	}

		echo '
	';
}
add_action( 'wp_head', 'facebook_open_graph', 5 );
