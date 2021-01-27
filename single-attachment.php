<?php
/**
 * The template for displaying all single attachments
 *
 * @package KSASAcademic
 * @since KSASAcademic 1.0.0
 */

get_header(); ?>

<div class="main-container" id="page">
	<div class="main-grid">
		<main class="main-content">
			<div class="secondary">
				<?php ksasacademic_breadcrumb(); ?>
			</div>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'attachment' ); ?>
			<?php endwhile; ?>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();
