<?php
/*
Template Name: Graduate Programs of Study
*/

get_header(); ?>
<?php
//Set Research Projects Query Parameters
$gradstudyfields_query = new WP_Query(array(
	'post_type' => 'gradstudyfields',
	'orderby' => 'title',
	'order' => 'ASC',
	'posts_per_page' => 50
	));
?>
<div class="main-container" id="page">
	<div class="main-grid">
		<main class="main-content-full-width">
			<div class="secondary">
				<?php ksasacademic_breadcrumb(); ?>
			</div>
			<?php do_action( 'ksasacademic_before_content' ); ?>
			<?php get_template_part( 'template-parts/featured-image' ); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<header aria-label="<?php the_title(); ?>">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>
					<?php do_action( 'ksasacademic_page_before_entry_content' ); ?>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile; ?>
			<?php if ( $gradstudyfields_query->have_posts() ) : ?>
				<div class="grid-x grid-padding-x small-up-1 medium-up-2 large-up-3" data-equalizer data-equalize-on="medium">
				<?php while ( $gradstudyfields_query->have_posts() ) : $gradstudyfields_query->the_post();?>
					<div class="cell">
						<div class="card grad-program" data-equalizer-watch>
						  <div class="card-section">
						  	<h1><?php the_title(); ?></h1>
							<ul class="info">
								<?php if ( get_post_meta($post->ID, 'ecpt_degreesoffered', true) ) : ?>
									<span class="fas fa-graduation-cap"></span> Degrees Offered: <?php echo get_post_meta($post->ID, 'ecpt_degreesoffered', true); ?>
								<?php endif;?>
								<li><span class="fas fa-link"></span> <a href="<?php echo get_post_meta($post->ID, 'ecpt_website', true); ?>" aria-label="<?php the_title(); ?> Program Website">Program Website</a></li>
								<li><span class="far fa-id-card"></span>
									 <a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true); ?>"><?php echo get_post_meta($post->ID, 'ecpt_contactname', true); ?></a></li>
								<li><strong>Deadline: </strong><?php echo get_post_meta($post->ID, 'ecpt_deadline', true); ?>
									<?php if ( get_post_meta($post->ID, 'ecpt_adddeadline', true) ) : ?>; <?php echo get_post_meta($post->ID, 'ecpt_adddeadline', true); ?>
										<?php endif;?>
								</li>
							</ul>

								<?php if ( get_post_meta($post->ID, 'ecpt_supplementalmaterials', true) ) : ?>
									<dl>
										<dt>Supplemental Materials</dt>
										<dd><?php echo get_post_meta($post->ID, 'ecpt_supplementalmaterials', true); ?></dd>
									</dl>
								<?php endif;?>

						  </div>
						</div>
					</div>

				<?php endwhile; ?>
				</div>
			<?php endif;?>
		</main>
		<?php do_action( 'ksasacademic_after_content' ); ?>
	</div>
</div>
<?php
get_footer();
