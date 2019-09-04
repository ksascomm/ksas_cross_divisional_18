<?php
/*
Template Name: Front
*/
get_header(); ?>

<?php $theme_option = flagship_sub_get_global_options();
$slider_query = new WP_Query(array(
	'post_type' => 'slider',
	'posts_per_page' => 5,
	'orderby' => 'menu_order',
	'order' => 'ASC',
));
if ( $slider_query->have_posts() ) :?>
<div class="highlighted-research">	
	<div class="orbit" role="region" aria-label="Featured Images" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
		<ul class="orbit-container">
			<?php if ($slider_query->post_count > 1 ) : ?>
			<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
			<button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
			<?php endif;?>
			<?php while ($slider_query->have_posts() ) : $slider_query->the_post(); ?>
			<li class="orbit-slide">
				<?php get_template_part('template-parts/homepage-slider'); ?>
			</li>
			<?php endwhile;?>
		</ul>
	</div>
</div>
<?php endif; ?>

<?php do_action( 'foundationpress_before_content' ); ?>

	<div class="main-container" id="page">
	    <div class="main-grid homepage sidebar-right">
	        <main class="main-content homepage-news">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
						<?php $frontpagecontent = the_content(); if ($frontpagecontent != '' ) : ?>
							<?php the_content(); ?>	
					
					<?php endif; ?>
				<?php endwhile; endif; ?>
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
				<?php
            		$hub_query_cond = $theme_option['flagship_sub_hub_cond'];
					if ($hub_query_cond === 1 ) :
               	?>
					<header class="hub-title" aria-label="Hub Feed">
						<h2>Related News from <a href="https://hub.jhu.edu/" aria-label="hub website">The Hub</a></h2>
					</header>
					<?php get_template_part( 'template-parts/hub-news' );
				endif;
                ?>

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

			</main>
			<?php if ( is_active_sidebar( 'sidebar1' ) || is_active_sidebar('homepage0') ) : ?>
				<aside class="homepage sidebar" id="sidebar1">
					<?php dynamic_sidebar( 'sidebar1' ); ?>
					<?php dynamic_sidebar( 'homepage0' ); ?>
				</aside>
			<?php endif; ?>
		</div>
	</div>
<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer();
