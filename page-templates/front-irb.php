<?php
/*
Template Name: Front (IRB Only)
*/
get_header(); ?>

<?php do_action( 'foundationpress_before_content' ); ?>

	<div class="main-container" id="page">
	    <div class="main-grid homepage">
	        <main class="main-content-full-width">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="cell small-12 large-9">
						<?php the_content(); ?>	
					</div>
					<hr>
				<?php endwhile; endif; ?>
					
				<div class="grid-x grid-margin-x" id="hp-buckets" role="complementary">
				<?php if ( is_active_sidebar( 'homepage-left-3rd', 'homepage-middle-3rd', 'homepage-right-3rd' ) ) : ?>
					<h3>Who We Serve</h3>
					<div class="grid-x grid-padding-x buckets">	
						<?php if ( is_active_sidebar( 'homepage-left-3rd' ) ) : ?>
							<div id="homepage1" class="cell large-4 bucket" role="complementary" aria-label="Homepage Widget Area 1">
								<?php dynamic_sidebar( 'homepage-left-3rd' ); ?>
							</div>
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'homepage-middle-3rd' ) ) : ?>
							<div id="homepage2" class="cell large-4 bucket" role="complementary" aria-label="Homepage Widget Area 2">
								<?php dynamic_sidebar( 'homepage-middle-3rd' ); ?>
							</div>
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'homepage-right-3rd' ) ) : ?>
							<div id="homepage3" class="cell large-4 bucket" role="complementary" aria-label="Homepage Widget Area 3">
								<?php dynamic_sidebar( 'homepage-right-3rd' ); ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			    </div>
				<div class="homepage-news">

				<?php //News Query
				$theme_option = flagship_sub_get_global_options();
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
					<article class="homepage-news-archive" aria-label="<?php echo $theme_option['flagship_sub_feed_name']; ?>">         
						
						<a class="button news-archive" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
							View All <?php echo $theme_option['flagship_sub_feed_name']; ?> <span class="fa fa-chevron-circle-right" aria-hidden="true"></span>
						</a>
				
					</article> 
				<?php endif; ?>
				</div>

			</main>
		</div>
	</div>
<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer();
