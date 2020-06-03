<?php // Automatically convert permalinks to PDFs in search results to the PDF itself, not the Attachment page
function my_force_direct_pdf_links( $permalink ) {
	global $post;
	if ( is_search() && 'attachment' === get_post_type( $post ) ) {
		// if the result is a PDF, link directly to the file not the attachment page
		$permalink = wp_get_attachment_url( $post->ID );
	}
	return esc_url( $permalink );
}
add_filter( 'the_permalink', 'my_force_direct_pdf_links' );
add_filter( 'attachment_link', 'my_force_direct_pdf_links' );


function searchwp_term_highlight_auto_excerpt( $excerpt ) {
	global $post;
	if ( ! function_exists( 'searchwp_term_highlight_get_the_excerpt_global' ) || ! is_search() || 'attachment' !== get_post_type( $post ) ) {
		return $excerpt;
	}
	// prevent recursion
	remove_filter( 'get_the_excerpt', 'searchwp_term_highlight_auto_excerpt' );
	$global_excerpt = searchwp_term_highlight_get_the_excerpt_global( $post->ID, null, get_search_query() );
	add_filter( 'get_the_excerpt', 'searchwp_term_highlight_auto_excerpt' );
	return $global_excerpt;
}
add_filter( 'get_the_excerpt', 'searchwp_term_highlight_auto_excerpt' );