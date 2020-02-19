<li class="item person <?php echo get_the_directory_filters($post); ?> <?php echo get_the_roles($post); ?>">
	<div class="media-object">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php if ( get_post_meta($post->ID, 'ecpt_website', true) ) : ?>
				<div class="media-object-section hide-for-print">
					<a href="<?php echo get_post_meta($post->ID, 'ecpt_website', true); ?>" aria-label="<?php the_title(); ?> 's webpage"><?php $title=get_the_title();
					the_post_thumbnail('directory', array('class' => 'hide-for-small-only', 'alt' => $title)); ?>
					</a>							
				</div>
			<?php else : ?>
				<div class="media-object-section hide-for-print">
					<?php $title=get_the_title();
					the_post_thumbnail('directory', array('class' => 'hide-for-small-only', 'alt' => $title)); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>	
		<div class="media-object-section">
			<h3>
			<?php if ( get_post_meta($post->ID, 'ecpt_website', true) ) : ?>
				<a href="<?php echo get_post_meta($post->ID, 'ecpt_website', true); ?>" aria-label="<?php the_title(); ?>'s website" target="_blank">
					<?php the_title(); ?>
				</a>
			<?php else : ?>
				<?php the_title(); ?>
			<?php endif; ?>
			</h3>
			<?php if ( get_post_meta($post->ID, 'ecpt_position', true) ) : ?>
				<h4><?php echo get_post_meta($post->ID, 'ecpt_position', true); ?></h4>
			<?php endif; ?>	
			<?php if ( get_post_meta($post->ID, 'ecpt_degrees', true) ) : ?>
				<h5><?php echo get_post_meta($post->ID, 'ecpt_degrees', true); ?></h5>
			<?php endif; ?>
			<ul class="contact">
				<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?>
					<li><span class="fa fa-phone-square"></span> <?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?></li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?>
					<li><span class="fa fa-fax"></span> <?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?></li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : ?>
					<li><span class="fa fa-envelope"></span> <a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?>"> <?php echo get_post_meta($post->ID, 'ecpt_email', true); ?></a></li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?>
					<li><span class="fa fa-map-marker-alt"></span> <?php echo get_post_meta($post->ID, 'ecpt_office', true); ?></li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_expertise', true) ) : ?>
					<li><strong>Research Interests:&nbsp;</strong><?php echo get_post_meta($post->ID, 'ecpt_expertise', true); ?></li>
				<?php endif; ?>				
			</ul>
		</div>
	</div>
</li>