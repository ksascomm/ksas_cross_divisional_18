<?php
/*
Template Name: Front (Tasks & Callouts)
*/
$theme_option = flagship_sub_get_global_options();
get_header(); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php
	// If a featured image is set, insert into layout and use Interchange
	// to select the optimal image size per named media query.
	if ( has_post_thumbnail( $post->ID ) ) : ?>
		<header class="featured-hero parent front-page hide-for-print" role="banner" data-interchange="[<?php echo the_post_thumbnail_url('featured-small'); ?>, small], [<?php echo the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php echo the_post_thumbnail_url('featured-large'); ?>, large], [<?php echo the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]">
			<?php 
			//if ACF is enabled, overlay Task Finder field
			if ( function_exists('get_field') && get_field('task_finder') ): ?>
			<div class="orbit-caption">
				<div class="grid-container">
					<?php $task_finder = get_field('task_finder');
						echo $task_finder; ?>
				</div>
			</div>
			<?php endif;?>
		</header>
	<?php endif;?>

<?php endwhile; endif;?>

<?php do_action( 'foundationpress_before_content' ); ?>

<div class="main-container" id="page">
    <div class="main-grid homepage">
        <main class="main-content-full-width tasks-callout">

			<div class="home-intro" aria-label="Introduction">
			
				<div class="grid-x grid-padding-x grid-container">
					<?php if ( is_active_sidebar('homepage0')  ) : ?>
						<div class="cell small-12 large-8 introduction">
							<?php the_content(); ?>	
						</div>	
						<aside class="cell small-12 large-4 homepage-callout sidebar hide-for-print"> 
							<?php dynamic_sidebar( 'homepage0' ); ?>
						</aside>
					<?php else: ?>
						<div class="cell small-12 large-9 introduction">
							<?php the_content(); ?>	
						</div>	
					<?php endif;?>
				
				</div>
				<hr>
			</div>

			<?php //if ACF is enabled, display deadlines
			if ( function_exists('get_field') && get_field('upcoming_deadlines') ): ?>
				<?php if ( have_rows( 'upcoming_deadlines' ) ) : ?>
					<div class="grid-x grid-padding-x grid-container">
						<h2 class="deadlines-heading">
							<?php $field_name = "upcoming_deadlines";
							$field = get_field_object($field_name);
							echo $field['label'];?>
						</h2>
					</div>
					<div class="grid-x grid-padding-x small-up-3 dates">
						<?php while ( have_rows( 'upcoming_deadlines' ) ) : the_row(); ?>
							<div class="cell">
								<div class="date">
									<span class="far fa-calendar-alt"></span>
									<h4><?php the_sub_field( 'deadline_date' ); ?></h4>
									<p><?php the_sub_field( 'deadline_information' ); ?></p>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif;?>
			<?php endif;?>
			<div class="grid-x grid-padding-x grid-container">
				<div class="cell small-12 large-8 homepage-news">
				
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
					
					<div class="homepage-news-archive">         
						
						<a class="button news-archive" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
							View All <?php echo $theme_option['flagship_sub_feed_name']; ?> <span class="fa fa-chevron-circle-right" aria-hidden="true"></span>
						</a>
				
					</div>   
				<?php endif; ?>
				
				<?php $hub_query_cond = $theme_option['flagship_sub_hub_cond'];
					if ($hub_query_cond === 1 ) :	?>
					
					<header class="hub-title" aria-label="Hub Feed">
						<h2>Related News from <a href="https://hub.jhu.edu/" aria-label="hub website">The Hub</a></h2>
					</header>
					
					<?php get_template_part( 'template-parts/hub-news' );
				endif; ?>
				
				</div>

				<?php if ( is_active_sidebar( 'sidebar1' )) :?>
				
					<div class="cell small-12 large-4">
						
						<?php dynamic_sidebar( 'sidebar1' ); ?>
					
					</div>
				<?php endif;?>

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
		</main>

	</div>
</div>

<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer();
