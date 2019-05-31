<?php
/**
 * Roles and Redirects for People CPT
 */

function get_the_roles( $post ) {
	$roles = get_the_terms( $post->ID, 'role' );
		if ( $roles && ! is_wp_error( $roles ) ) :
		$role_names = array();
		foreach ( $roles as $role ) {
			$role_names[] = $role->slug;
			}
		$role_name = join( ' ', $role_names );

		endif;
		return $role_name;
}

add_action( 'template_redirect', 'redirect_empty_bios' );
function redirect_empty_bios() {
	if(is_singular('people') ) :
		global $post;
		$bio = get_post_meta($post->ID, 'ecpt_bio', true);
		$link = get_post_meta($post->ID, 'ecpt_website', true);
		if(empty($bio) && isset($link)) {
		    wp_redirect(esc_url($link), 301);
		    exit;
		} 
	endif;
}