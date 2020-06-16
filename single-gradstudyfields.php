<?php
/**
 * The template for displaying all single Grad Study Fields
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header();

?>
<div class="main-container" id="page">
	<div class="main-grid">
		<main class="main-content">
			<div class="secondary">
				<?php foundationpress_breadcrumb(); ?>
			</div>
			<?php while ( have_posts() ) : the_post(); ?>
				<article aria-labelledby="post-<?php the_ID(); ?>" <?php post_class('post-singular'); ?>>
						<header>
							<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
						</header>
						<div class="entry-content">
							<?php if ( get_post_meta($post->ID, 'ecpt_website', true) ) : ?>
								<p><strong>Website:</strong> <?php echo get_post_meta($post->ID, 'ecpt_website', true); ?></p>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_contactname', true) ) : ?>
								<p><strong>Contact Name:</strong> <?php echo get_post_meta($post->ID, 'ecpt_contactname', true); ?></p>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_phonenumber', true) ) : ?>
								<p><strong>Contact Name:</strong> <?php echo get_post_meta($post->ID, 'ecpt_phonenumber', true); ?></p>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_emailaddress', true) ) : ?>
								<p><strong>Email Address:</strong> <?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true); ?></p>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_deadline', true) ) : ?>
								<p><strong>Deadline:</strong> <?php echo get_post_meta($post->ID, 'ecpt_deadline', true); ?></p>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_adddeadline', true) ) : ?>
								<p><strong>Additional Deadline:</strong> <?php echo get_post_meta($post->ID, 'ecpt_adddeadline', true); ?></p>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_supplementalmaterials', true) ) : ?>
								<p><strong>Supplemental Materials:</strong> <?php echo get_post_meta($post->ID, 'ecpt_supplementalmaterials', true); ?></p>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_greexam', true) ) : ?>
								<p><strong>Does This Program Require or Recommend GRE Scores?</strong> Yes</p>
							<?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_gresubjectexam', true) ) : ?>
								<p><strong>Does this program require or recommend GRE Subject Exams?</strong> <?php echo get_post_meta($post->ID, 'ecpt_gresubjectexam', true); ?></p>
							<?php endif; ?>
							<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
						</div>
				</article>
			<?php endwhile; ?>
		</main>
	    <?php do_action('foundationpress_after_content'); ?>
    	<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
