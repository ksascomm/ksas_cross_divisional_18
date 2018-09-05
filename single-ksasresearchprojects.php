<?php
/**
 * The template for displaying all single research projects
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-container" id="page">
	<div class="main-grid">
		<main class="main-content">
			<div class="secondary">
				<?php foundationpress_breadcrumb(); ?>
			</div>		
			<?php while ( have_posts() ) : the_post(); ?>
				<h3><?php the_title(); ?></h3>
					<div class="project-body">
						<?php the_post_thumbnail('full'); ?>
						<?php if (get_post_meta($post->ID, 'ecpt_associate_name', true)) : ?>
							<p><strong>Associate Name:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_associate_name', true); ?></p>
						<?php endif; ?>
						<?php if (get_post_meta($post->ID, 'ecpt_dates', true)) : ?>
							<p><strong>Funding Source/Period of the Grant:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_dates', true); ?></p>
						<?php endif; ?>
						<?php if (get_post_meta($post->ID, 'ecpt_description_full', true)) : ?>
							<p><strong>Description:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_description_full', true); ?></p>
						<?php endif; ?>
					</div>
			<?php endwhile; ?>
		</main>
	</div>
</div>
<?php get_footer();
