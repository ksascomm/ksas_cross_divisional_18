<?php
/*
Template Name: Full Width
*/
get_header(); ?>

<div class="main-container">
	<div class="main-grid">
		<main class="main-content-full-width">
			<div class="secondary">
				<?php foundationpress_breadcrumb(); ?>
			</div>
			<?php get_template_part( 'template-parts/featured-image' ); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php endwhile; ?>
		</main>
	</div>
</div>
<?php get_footer();
