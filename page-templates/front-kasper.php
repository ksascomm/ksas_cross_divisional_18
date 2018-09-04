<?php
/*
Template Name: Front (KASPER Only)
*/
get_header(); ?>

<?php do_action( 'foundationpress_before_content' ); ?>

<div class="hero">
	<div class="grid-x grid-padding-x grid-container">
		<div class="small-12 large-6 cell">
			<div class="kasper-intro">
				<h3>The Resource Hub</h3>
				<h5>Providing information, resources, and guidance to administrative staff in the Krieger School of Arts and Sciences.</h5>
			</div>
		</div>
		<div class="small-12 large-5 large-offset-1 cell">
			<div class="kasper-search">
				<h3>What are you searching for?</h3>
				<p>Search this website for pdfs, links, resources, and more</p>
				<form method="GET" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
					<div class="input-group">
						<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" data-swplive="true" placeholder="Search this site" aria-label="search"/>
						<div class="input-group-button">
							<input type="submit" class="button" value="Submit" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="main-container">
	    <div class="main-grid homepage sidebar-right">
	        <main class="main-content homepage-news">	


				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="cell small-12 large-9">
						<?php the_content(); ?>	
					</div>
					<hr>
				<?php endwhile; endif; ?>
					
				
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
					<div class="homepage-news-archive" role="complementary" aria-labelledby="newsarchive">         
						<h4 id="newsarchive">
							<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
								View <?php echo $theme_option['flagship_sub_feed_name']; ?> Archive <span class="fa fa-chevron-circle-right" aria-hidden="true"></span>
							</a>
						</h4>
					</div>   
				<?php endif; ?>
				</div>
			</main>
			<?php if ( is_active_sidebar('homepage0') ) : ?>
				<aside class="homepage sidebar" id="sidebar1">
					<?php dynamic_sidebar( 'homepage0' ); ?>
				</aside>
			<?php endif; ?>	
		</div>
	</div>
<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer();
