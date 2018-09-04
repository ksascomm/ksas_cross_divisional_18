<?php
/**
 * The default template for displaying posts on Single Documents
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<article aria-labelledby="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
	<header>
		<h1>
		<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a>
		</h1>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php if( get_field( "document_upload") ): ?>
			<p><a target="_blank" href="<?php the_field('document_upload'); ?>">View the Document</a></p>
		<?php else: ?>
			<p>No Document to view</p>
		<?php endif; ?>
	</div>
</article>