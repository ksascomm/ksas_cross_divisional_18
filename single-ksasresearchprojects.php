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
		<main class="main-content-full-width">
			<div class="secondary">
				<?php foundationpress_breadcrumb(); ?>
			</div>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header>
					<h1>
					<?php the_title(); ?>
					</h1>
				</header>				
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="entry-content">
					<div class="grid-x">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="cell small-12 medium-5 large-2">
								<?php the_post_thumbnail('medium'); ?>
							</div>
						<?php endif;?>
						<div class="cell small-12 medium-7 large-10">
							<ul>
							<?php if (get_post_meta($post->ID, 'ecpt_associate_name', true)) : ?>
								<li><strong>Associate Name:</strong> <?php echo get_post_meta($post->ID, 'ecpt_associate_name', true); ?>
								</li>
							<?php endif; ?>
							<?php if (get_post_meta($post->ID, 'ecpt_dates', true)) : ?>
								<li><strong>Funding Source/Period of the Grant:</strong> <?php echo get_post_meta($post->ID, 'ecpt_dates', true); ?>
								</li>
							<?php endif; ?>	
							<?php if (get_post_meta($post->ID, 'ecpt_description_full', true)) : ?>
								<li><strong>Description:</strong> <?php echo get_post_meta($post->ID, 'ecpt_description_full', true); ?></li>
							<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
			</article>
		</main>
	</div>
</div>
<?php get_footer();
