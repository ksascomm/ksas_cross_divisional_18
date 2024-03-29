<?php
/**
 * Template Name: Front
 * The template for displaying the a front page with no
 * buckets, slides, or video.
 * Option for news or hub feed below buckets.
 *
 * @package KSASAcademicDepartment
 * @since KSASAcademicDepartment 1.0.0
 */

get_header(); ?>

<?php
$theme_option = flagship_sub_get_global_options();
$slider_query = new WP_Query(
	array(
		'post_type'      => 'slider',
		'posts_per_page' => 10,
		'orderby'        => 'rand',
	)
);
if ( $slider_query->have_posts() ) :
	?>
<div class="highlighted-research show-for-large">
	<div class="orbit" role="region" aria-label="Featured Images" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out; autoPlay:false;">
		<ul class="orbit-container">
			<?php if ( $slider_query->post_count > 1 ) : ?>
			<button class="orbit-previous show-for-large" onclick="ga('send', 'event', 'Homepage Slider', 'Previous Slide Click');"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
			<button class="orbit-next show-for-large" onclick="ga('send', 'event', 'Homepage Slider', 'Next Slide Click');"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
			<?php endif; ?>
			<?php
			while ( $slider_query->have_posts() ) :
				$slider_query->the_post();
				?>
			<li class="orbit-slide">
				<?php get_template_part( 'template-parts/homepage-slider' ); ?>
			</li>
			<?php endwhile; ?>
		</ul>
	</div>
</div>
<?php endif; ?>
<?php if ( has_post_thumbnail( $post->ID ) ) : ?>
	<header class="hero" role="banner" aria-label="Featured Image">
			<div class="full-screen-image show-for-large">
				<div class="front-hero static" role="banner">
				<?php
						the_post_thumbnail(
							'full',
							array(
								'class'   => 'featured-hero-image',
								'loading' => 'eager',
							)
						);
				?>
				</div>
			</div>
		</header>
<?php endif; ?>


	<div class="main-container" id="page">
		<div class="main-grid homepage sidebar-right">
			<main class="main-content homepage-news">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						?>

						<?php $frontpagecontent = the_content(); if ( $frontpagecontent != '' ) : ?>
							<?php the_content(); ?>

					<?php endif; ?>
						<?php
				endwhile;
endif;
				?>
				<?php
				// News .
				$news_quantity = $theme_option['flagship_sub_news_quantity'];
				$news_query    = new WP_Query(
					array(
						'post_type'      => 'post',
						'posts_per_page' => $news_quantity,
					)
				);
				if ( $news_query->have_posts() ) :
					?>
					<header class="news-title" aria-label="Site Feed">
						<h2><?php echo $theme_option['flagship_sub_feed_name']; ?></h2>
					</header>
					<?php
					while ( $news_query->have_posts() ) :
						$news_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content-news-teaser', get_post_format() ); ?>
					<?php endwhile; ?>
					<article class="homepage-news-archive" aria-label="<?php echo $theme_option['flagship_sub_feed_name']; ?>">

						<a class="button news-archive" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
							View All <?php echo $theme_option['flagship_sub_feed_name']; ?> <span class="fa fa-chevron-circle-right" aria-hidden="true"></span>
						</a>

					</article>
				<?php endif; ?>
				<?php
					$hub_query_cond = $theme_option['flagship_sub_hub_cond'];
				if ( $hub_query_cond === 1 ) :
					?>
					<header class="hub-title" aria-label="Hub Feed">
						<h2>Related News from <a href="https://hub.jhu.edu/" aria-label="The Hub">The Hub</a></h2>
					</header>
					<?php
					get_template_part( 'template-parts/hub-news' );
				endif;
				?>

				<?php if ( is_active_sidebar( 'homepage1' ) && is_active_sidebar( 'homepage2' ) ) : ?>
					<div class="grid-x" id="hp-buckets">
						<div class="small-6 cell hide-for-print" role="complementary">
							<div class="primary callout">
								<?php dynamic_sidebar( 'homepage1' ); ?>
							</div>
						</div>
						<div class="small-6 cell hide-for-print" role="complementary">
							<div class="primary callout">
								<?php dynamic_sidebar( 'homepage2' ); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>

			</main>
			<?php if ( is_active_sidebar( 'sidebar1' ) || is_active_sidebar( 'homepage0' ) ) : ?>
				<div class="homepage sidebar" id="sidebar1">
					<?php dynamic_sidebar( 'sidebar1' ); ?>
					<?php dynamic_sidebar( 'homepage0' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>


<?php
get_footer();
