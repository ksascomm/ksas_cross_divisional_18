<?php
/**
 * The default template for displaying content of attachments
 *
 * Used for both single and index/archive/search.
 *
 * @package KSASAcademic
 * @since KSASAcademic 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
	<?php
		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
	?>
	</header>
	<div class="entry-content">
		<p>
			<a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment">
					<?php the_title(); ?>
			</a>
		</p>
		<h3>Description:</h3>
		<?php the_excerpt(); ?>
		<?php edit_post_link( __( '(Edit)', 'ksasacademic' ), '<span class="edit-link">', '</span>' ); ?>
	</div>
</article>
