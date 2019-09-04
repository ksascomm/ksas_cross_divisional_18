<?php
/*
Template Name: Front (Full Width Slider)
*/
$theme_option = flagship_sub_get_global_options();
get_header(); ?>

<?php if ( has_post_thumbnail( $post->ID ) ) : ?>
	<header class="featured-hero parent front-page hide-for-print" role="banner" data-interchange="[<?php the_post_thumbnail_url('featured-small'); ?>, small], [<?php the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php the_post_thumbnail_url('featured-large'); ?>, large], [<?php the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]" aria-label="Featured Image">
	</header>
<?php endif; ?>
<?php get_template_part( 'template-parts/homepage-slider-full' ); ?>
<?php do_action( 'foundationpress_before_content' ); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<main class="home-intro blue" id="page" tabindex="0" aria-label="Website Introduction">
		<div class="grid-x grid-padding-x grid-container">
			<div class="cell small-12">
				<?php the_content(); ?>	
			</div>	
		</div>
	</main>
	<?php endwhile; endif; ?>
<?php do_action( 'foundationpress_after_content' ); ?>
<div class="main-container">
    <div class="main-grid homepage sidebar-right">
        <div class="main-content homepage-news">
			<?php //News Query
			$news_quantity = $theme_option['flagship_sub_news_quantity'];
			$news_query = new WP_Query(array(
				'post_type' => 'post',
				'posts_per_page' => $news_quantity,
			));
			if ( $news_query->have_posts() ) : ?>

				<header class="news-title" aria-label="Site Feed">
					<h2><?php echo $theme_option['flagship_sub_feed_name']; ?></h2>
				</header>
				
				<?php while ($news_query->have_posts() ) : $news_query->the_post(); ?>
					<?php get_template_part( 'template-parts/content-news-teaser', get_post_format() ); ?>
				<?php endwhile; ?>
				
				<div class="homepage-news-archive" role="complementary" aria-labelledby="newsarchive">         
					<h4 id="newsarchive">
						<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
							View All <?php echo $theme_option['flagship_sub_feed_name']; ?> <span class="fa fa-chevron-circle-right" aria-hidden="true"></span>
						</a>
					</h4>
				
				</div>   
			<?php endif; ?>
			
				<?php $hub_query_cond = $theme_option['flagship_sub_hub_cond'];
					if ($hub_query_cond === 1 ) :	?>
				
				<header class="hub-title" aria-label="Hub Feed">
					<h2>Related News from <a href="https://hub.jhu.edu/" aria-label="hub website">The Hub</a></h2>
				</header>
				
				<?php get_template_part( 'template-parts/hub-news' );
				endif; ?>
				

				<?php if ( is_active_sidebar( 'homepage1' ) && is_active_sidebar( 'homepage2' ) ) : ?>
				    <div class="grid-x" id="hp-buckets">
				    	<div class="small-6 cell hide-for-print" role="complementary">
				    		<div class="primary callout">
				    			<?php dynamic_sidebar('homepage1'); ?>
				    		</div> 
						</div>
						<div class="small-6 cell hide-for-print" role="complementary">
							<div class="primary callout">
				    			<?php dynamic_sidebar('homepage2'); ?>
				    		</div> 
						</div>
				    </div>
				<?php endif;?>	

		</div>
				
		<?php if ( is_active_sidebar( 'sidebar1' ) || is_active_sidebar('homepage0')  ) : ?>
			<aside class="homepage sidebar" id="sidebar1">
				<?php dynamic_sidebar( 'sidebar1' ); ?>
				<?php dynamic_sidebar( 'homepage0' ); ?>
			</aside>
		<?php endif;?>

	</div>
</div>

<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer();
