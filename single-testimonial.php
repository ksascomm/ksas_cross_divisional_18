<?php
/**
 * The template for displaying all single Testimonials
 *
 * @package KSASAcademic
 * @since KSASAcademic 1.0.0
 */

get_header();

?>
<div class="main-container" id="page">
	<div class="main-grid">
		<main class="main-content">
			<div class="secondary">
				<?php ksasacademic_breadcrumb(); ?>
			</div>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content-testimonial', '' ); ?>
			<?php endwhile; ?>
		</main>
	    <?php do_action('ksasacademic_after_content'); ?>
    	<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
