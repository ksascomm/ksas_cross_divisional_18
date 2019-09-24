<div class="grid-x grid-padding-x">
	<div class="cell small-12 large-7">
		<img src="<?php echo get_post_meta($post->ID, 'ecpt_slideimage', true); ?>" alt="slider <?php the_title(); ?>" />
	</div>
	<div class="cell small-12 large-4">
		<div class="slide-caption">
			<?php if ( ! the_title( ' ', ' ', false ) == '' ) : ?>
			<h3><?php the_title(); ?></h3>
			<?php endif;?>
			<p><?php echo get_the_content(); ?></p>
			<?php if ( get_post_meta($post->ID, 'ecpt_button', true) ) : ?>
			<p><a class="button" href="<?php echo get_post_meta($post->ID, 'ecpt_urldestination', true); ?>" onclick="ga('send', 'event', 'Homepage Slider', 'Read More Click', 'Destination: <?php echo get_post_meta($post->ID, 'ecpt_urldestination', true); ?>')" aria-label="<?php the_title(); ?>" target="_blank" rel="noopener noreferrer">Find Out More <span class="far fa-arrow-alt-circle-right"></span></a></p>
			<?php endif;?>
		</div>
	</div>
</div>