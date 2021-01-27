<?php
/*
Template Name: IRB About
*/
get_header(); ?>

<div class="main-container" id="page">
	<div class="main-grid">
		<main class="main-content">
			<div class="secondary">
				<?php ksasacademic_breadcrumb(); ?>
			</div>
			<div class="grid-x">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'page' ); ?>
				<?php endwhile; ?>
			</div>
			<section class="documents">
				<?php $about_documents_query = new WP_Query(array(
				'posts_per_page' => 250,
				'orderby' => 'title',
				'order' => 'asc',
				'post_type' => 'documents',
				'meta_key' => 'primary_section',
				'meta_value' => 'about',
				)); ?>
				<div class="grid-x">
					<?php if ( $about_documents_query->have_posts() ) :?>
					<div class="cell small-12 large-6">
						<h3>Documents & Resources</h3>
						<ul class="accordion" data-accordion data-allow-all-closed="true">
							<?php while ($about_documents_query->have_posts()) : $about_documents_query->the_post(); ?>
							<li class="accordion-item" data-accordion-item>
								<a href="#" class="accordion-title"><?php the_title();?></a>
								<div class="accordion-content" data-tab-content>
									<p><?php the_content(); ?></p>
									<?php if( get_field( "document_upload") ): ?>
									<a href="<?php the_field('document_upload'); ?>">View the Document</a>
									<?php endif; ?>
									<?php if( get_field( "resource_link") ): ?>
									<a href="http://<?php the_field('resource_link'); ?>">Read Additional <?php the_title();?> Information</a>
									<?php endif; ?>
								</div>
							</li>
							<?php endwhile; ?>
						</ul>
					</div>
					<?php endif; ?>
					<?php
					// args
					$args = array(
						'posts_per_page'	=> 250,
						'orderby' => 'title',
						'order' => 'asc',
						'post_type'		=> 'documents',
						'meta_query'	=> array(
							array(
								'key'		=> 'affiliated_section',
								'value'		=> 'about',
								'compare'	=> 'LIKE'
							)
						)
					);
					// query
					$related_about_query = new WP_Query( $args );

					?>
					<?php if( $related_about_query->have_posts() ): ?>
					<div class="cell small-12 large-6">
						<h3>Related Documents & Resources</h3>
						<ul class="accordion" data-accordion data-allow-all-closed="true">
							<?php while( $related_about_query->have_posts() ) : $related_about_query->the_post(); ?>
							<li class="accordion-item" data-accordion-item>
								<a href="#" class="accordion-title"><?php the_title();?></a>
								<div class="accordion-content" data-tab-content>
									<p><?php the_content(); ?></p>
									<?php if( get_field( "document_upload") ): ?>
									<a target="_blank" href="<?php the_field('document_upload'); ?>">View the Document</a>
									<?php endif; ?>
									<?php if( get_field( "resource_link") ): ?>
									<a target="_blank" href="http://<?php the_field('resource_link'); ?>">Read Additional <?php the_title();?> Information</a>
									<?php endif; ?>
								</div>
							</li>
							<?php endwhile; ?>
						</ul>
					</div>
					<?php endif; ?>
					<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
				</div>
			</section>
		 </main>
		 <?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();
