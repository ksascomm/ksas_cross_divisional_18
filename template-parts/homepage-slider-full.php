<?php $slider_query = new WP_Query(
        array(
			'post_type' => 'slider',
			'posts_per_page' => 5,
			'orderby' => 'rand',
			)
        );
	if ( $slider_query->have_posts() ) :
    ?>
     
	<div class="fullscreen-image-slider hide-for-small-only">
		<div class="orbit" role="region" aria-label="Homepage Slider" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
			<div class="orbit-wrapper">	
				<?php if ($slider_query->post_count > 1 ) : ?>
				<div class="orbit-controls">
					<button class="orbit-previous show-for-large" onclick="ga('send', 'event', 'Homepage Slider', 'Previous Slide Click');"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
					<button class="orbit-next show-for-large" onclick="ga('send', 'event', 'Homepage Slider', 'Next Slide Click');"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
				</div>
				<?php endif; ?>

				<ul class="orbit-container">
				<?php $slidernumber = 0;
				while ($slider_query->have_posts() ) : $slider_query->the_post(); $slidernumber++; ?>
					<li class="orbit-slide">
						<?php
						// Get the URL of the custom meta image field
						$get_slider_image_url = get_post_meta(get_the_ID(), 'ecpt_slideimage', true);
						// Gets the custom post type image id
						$get_slider_image_id = attachment_url_to_postid($get_slider_image_url);
						// Get's the alt text from the image
						$slider_alt = get_post_meta ( $get_slider_image_id, '_wp_attachment_image_alt', true );
						?>						
						<img class="orbit-image hide-for-print" src="<?php echo get_post_meta($post->ID, 'ecpt_slideimage', true); ?>" alt="<?php echo $slider_alt;?>">
					<?php if (get_the_title() || !empty( get_the_content() )) :?>
					    <figcaption class="orbit-caption" aria-hidden="true">
					    	<?php if (get_the_title()) :?>
					      		<h1><?php the_title(); ?></h1>
					  		<?php endif;?>
					  	<?php if ( !empty( get_the_content() ) ):?>
					      <p><?php echo get_the_content(); ?></p>
						   <?php if (get_post_meta($post->ID, 'ecpt_button', true) ) : ?>
								<a href="<?php echo get_post_meta($post->ID, 'ecpt_urldestination', true); ?>" aria-label="post-<?php the_ID(); ?>" class="button show-for-large" onclick="ga('send', 'event', 'Homepage Slider', 'Read More Click, Slide: <?php echo $slidernumber;?>', 'Destination: <?php echo get_post_meta($post->ID, 'ecpt_urldestination', true); ?>');">Find Out More <span class="far fa-arrow-alt-circle-right"></span></a>
							<?php endif; ?>
						<?php endif;?>
					    </figcaption>
					<?php endif;?>
			   		</li>
				<?php endwhile; ?>
				</ul>	
			</div>		
		</div>
	</div>
	<?php endif; ?>
	<?php $slider_mobile_query = new WP_Query(
        array(
			'post_type' => 'slider',
			'posts_per_page' => 1,
			'orderby' => 'rand',
			)
        );
		if ( $slider_mobile_query->have_posts() ) : while ($slider_mobile_query->have_posts() ) : $slider_mobile_query->the_post();
				?>
				<div class="front-hero-featured-image show-for-small-only hide-for-print" role="banner" aria-label="Mobile Hero Image">
					<img class="featured-small" src="<?php echo get_post_meta($post->ID, 'ecpt_slideimage', true); ?>" alt="<?php the_title(); ?>">
				</div>
	<?php endwhile; endif; ?>