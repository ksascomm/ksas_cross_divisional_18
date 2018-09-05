<?php
/*
Template Name: Right Sidebar
*/
get_header(); ?>

<div class="main-container" id="page">
	<div class="main-grid sidebar-right">
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
	</div>
</div>
<?php get_footer();
