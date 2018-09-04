<?php
/*
Template Name: Page with Sidebar (specified widget)
*/
get_header(); ?>

<div class="main-container">
	<div class="main-grid">
		<main class="main-content">
			<div class="secondary">
				<?php foundationpress_breadcrumb(); ?>
			</div>
			<?php get_template_part( 'template-parts/featured-image' ); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php endwhile; ?>
		</main>
		<?php get_sidebar(); ?>
		<!-- END Page Specific Sidebar -->
	</div>
</div>
<?php
get_footer();
