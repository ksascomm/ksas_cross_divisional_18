<?php
/**
 * The template for displaying all single research projects
 *
 * @package KSASAcademic
 * @since KSASAcademic 1.0.0
 */

get_header(); ?>

<div class="main-container" id="page">
	<div class="main-grid">
		<main class="main-content-full-width">
			<div class="secondary">
				<?php ksasacademic_breadcrumb(); ?>
			</div>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header>
					<h1>
					<?php the_title(); ?>
					</h1>
				</header>
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<div class="entry-content">
					<div class="media-object stack-for-small">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="media-object-section">
								<?php the_post_thumbnail( 'medium' ); ?>
							</div>
						<?php endif; ?>
						<div class="media-object-section">
							<?php if ( get_post_meta( $post->ID, 'ecpt_associate_name', true ) ) : ?>
								<p><strong>Associate Name:</strong> <?php echo get_post_meta( $post->ID, 'ecpt_associate_name', true ); ?>
								</p>
							<?php endif; ?>
							<?php if ( get_post_meta( $post->ID, 'ecpt_dates', true ) ) : ?>
								<p><strong>Funding Source/Period of the Grant:</strong> <?php echo get_post_meta( $post->ID, 'ecpt_dates', true ); ?>
								</p>
							<?php endif; ?>
						</div>
					</div>
					<h3>Project Description</h3>
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
			</article>
		</main>
	</div>
</div>
<?php
get_footer();
