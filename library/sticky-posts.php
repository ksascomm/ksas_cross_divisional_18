<?php
/**
 * Change the class for sticky posts to .wp-sticky to avoid conflicts with Foundation's Sticky plugin
 *
 * @package KSASAcademic
 * @since FoundationPress 2.2.0
 */

if ( ! function_exists( 'ksasacademic_sticky_posts' ) ) :
	function ksasacademic_sticky_posts( $classes ) {
		if ( in_array( 'sticky', $classes, true ) ) {
			$classes   = array_diff( $classes, array( 'sticky' ) );
			$classes[] = 'wp-sticky';
		}
		return $classes;
	}
	add_filter( 'post_class', 'ksasacademic_sticky_posts' );

endif;
