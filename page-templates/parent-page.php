<?php
/*
Template Name: Advising Parent Pages
*/

get_header(); ?>
<?php $buckets = array(
		'parent' => $post->ID,
		'post_type' => 'page',
		'post_status' => 'publish',
		'sort_column' => 'menu_order',
	    'sort_order' => 'asc',
		);
		$pages = get_pages($buckets); ?>
<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
if ( has_post_thumbnail( $post->ID ) ) : ?>
	<header class="featured-hero parent interior" role="banner" data-interchange="[<?php echo the_post_thumbnail_url('featured-small'); ?>, small], [<?php echo the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php echo the_post_thumbnail_url('featured-large'); ?>, large], [<?php echo the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]" aria-label="<?php the_title(); ?> Featured Image">
		<div class="orbit-caption">
			<div class="grid-container">
				<h1 class="entry-title featured"><?php the_title(); ?></h1>
			</div>
		</div>	
	</header>
<?php endif;?>		
<div class="main-container" id="page">
	<div class="main-grid">
		<main class="main-content-full-width parent-page">
			<div class="child-pages">
				<!--Student Roadmap & Completing a Degree-->
				<?php if (is_page (array(112, 332) )) : ?> 
					<div class="expanded button-group roadmap" id="parent-menu">
						<?php foreach ( $pages as $page ) { ?>
						  <a class="button" href="<?php echo  get_permalink($page->ID); ?>" rel="bookmark" title="<?php echo $page->post_title; ?>"><?php echo $page->post_title; ?></a>
						<?php } ?>
					</div>
				<!--Tutoring/Group Help & Make an Appointment-->	
				<?php elseif (is_page(array(113, 114)) ) : ?>
					<?php foreach ( $pages as $page ) { ?>
						<div class="grid-x appointments">
							<div class="cell small-12 large-3">
								<a class="appointment button" href="<?php echo get_permalink($page->ID); ?>" rel="bookmark" title="<?php echo $page->post_title; ?>"><?php echo $page->post_title; ?></a>
							</div>
							<div class="cell small-12 large-8 large-offset-1">
								<p class="excerpt post-<?php echo $page->ID;?>"><?php echo $page->post_excerpt; ?></p>
							</div>
						</div>
					<?php } ?>
				<?php endif;?>
			</div>
			<div class="page-content">
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> itemscope itemtype="http://schema.org/WebPage">
				
					    <div class="entry-content" itemprop="articleBody">
						    <?php the_content(); ?>
						</div> <!-- end article section -->
											
					</article> <!-- end article -->
				<?php endwhile; ?>
			</div>
		</main>
	</div>
</div>
<?php
get_footer();
