<?php
/*
Template Name: IRB eHIRB Documents
*/
get_header(); ?>
<div class="main-container" id="page">
	<div class="main-grid">
		<main class="main-content-full-width">
			<div class="secondary">
				<?php foundationpress_breadcrumb(); ?>
			</div>
			
			<?php while ( have_posts() ) : the_post(); ?>
			
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
			
			<?php endwhile; ?>
			
			<section class="documents">
				<div class="callout primary">
				<h2>Revised Common Rule</h2>
				<?php if ( function_exists('get_field') && get_field('callout')) : ?>
					<div class="callout">
						<?php the_field( 'callout' ); ?>
					</div>
				<?php endif;?>
				<div class="grid-x">
					<?php $application_ehirb_revised_common_rule_query = new WP_Query(array(
						'posts_per_page' => 250,
						'orderby' => 'title',
						'order' => 'asc',
						'post_type' => 'documents',
						'meta_query' => array(
							array(
								'key'		=> 'ehirb_category_revised_common_rule',
								'value'		=> 'application',
								'compare'	=> 'LIKE'
							)
						)
					)); if ($application_ehirb_revised_common_rule_query->have_posts() ) :?>
					<div class="cell small-12 large-6">
						<h3>Application Materials</h3>
						<ul class="accordion" data-accordion data-allow-all-closed="true">
							<?php while ($application_ehirb_revised_common_rule_query->have_posts()) : $application_ehirb_revised_common_rule_query->the_post(); ?>
							<li class="accordion-item" data-accordion-item>
								<a href="#" class="accordion-title"><?php the_title();?></a>
								<div class="accordion-content" data-tab-content>
									<?php the_content(); ?>
									<?php if( get_field( "document_upload") ): ?>
									<p><a href="<?php the_field('document_upload'); ?>">View the Document</a></p>
									<?php endif; ?>
									<?php if( get_field( "resource_link") ): ?>
									<p><a href="http://<?php the_field('resource_link'); ?>">Read Additional <?php the_title();?> Information</a></p>
									<?php endif; ?>
								</div>
							</li>
							<?php endwhile; ?>
						</ul>
					</div>
					<?php endif; ?>
					<?php $fsa_ehirb_revised_common_rule_query = new WP_Query(array(
						'posts_per_page' => 250,
						'orderby' => 'title',
						'order' => 'asc',
						'post_type' => 'documents',
						'meta_query' => array(
							array(
								'key'		=> 'ehirb_category_revised_common_rule',
								'value'		=> 'actions',
								'compare'	=> 'LIKE'
							)
						)
					)); if ($fsa_ehirb_revised_common_rule_query->have_posts() ) :?>
					<div class="cell small-12 large-6">
						<h3>Further Study Action (FSA) Documents</h3>
						<ul class="accordion" data-accordion data-allow-all-closed="true">
							<?php while ($fsa_ehirb_revised_common_rule_query->have_posts()) : $fsa_ehirb_revised_common_rule_query->the_post(); ?>
							<li class="accordion-item" data-accordion-item>
								<a href="#" class="accordion-title"><?php the_title();?></a>
								<div class="accordion-content" data-tab-content>
									<?php the_content(); ?>
									<?php if( get_field( "document_upload") ): ?>
									<p><a href="<?php the_field('document_upload'); ?>">View the Document</a></p>
									<?php endif; ?>
									<?php if( get_field( "resource_link") ): ?>
									<p><a href="http://<?php the_field('resource_link'); ?>">Read Additional <?php the_title();?> Information</a></p>
									<?php endif; ?>
								</div>
							</li>
							<?php endwhile; ?>
						</ul>
					</div>
					<?php endif; ?>
				</div>
				<div class="grid-x">
					<?php $consent_ehirb_revised_common_rule_query = new WP_Query(array(
						'posts_per_page' => 250,
						'orderby' => 'title',
						'order' => 'asc',
						'post_type' => 'documents',
						'meta_query'	=> array(
							array(
								'key' => 'ehirb_category_revised_common_rule',
								'value'	=> 'consent',
								'compare' => 'LIKE'
								)
						)
					)); if ($consent_ehirb_revised_common_rule_query->have_posts() ) :?>
					<div class="cell small-12 large-6">
						<h3>Consent Forms</h3>
						<ul class="accordion" data-accordion data-allow-all-closed="true">
							<?php while ($consent_ehirb_revised_common_rule_query->have_posts()) : $consent_ehirb_revised_common_rule_query->the_post(); ?>
							<li class="accordion-item" data-accordion-item>
								<a href="#" class="accordion-title"><?php the_title();?></a>
								<div class="accordion-content" data-tab-content>
									<?php the_content(); ?>
									<?php if( get_field( "document_upload") ): ?>
									<p><a href="<?php the_field('document_upload'); ?>">View the Document</a></p>
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
					<?php $related_ehirb_revised_common_rule_query = new WP_Query(array(
							'posts_per_page'	=> 250,
						'orderby' => 'title',
						'order' => 'asc',
						'post_type'	=> 'documents',
						'meta_query' => array(
							array(
								'key' => 'affiliated_section',
								'value'	=> 'eHIRB-revised',
								'compare' => 'LIKE'
							)
					)
					)); if( $related_ehirb_revised_common_rule_query->have_posts() ): ?>
					<div class="cell small-12 large-6">
						<h3>Related Documents & Resources</h3>
						<ul class="accordion" data-accordion data-allow-all-closed="true">
							<?php while( $related_ehirb_revised_common_rule_query->have_posts() ) : $related_ehirb_revised_common_rule_query->the_post(); ?>
							<li class="accordion-item" data-accordion-item>
								<a href="#" class="accordion-title"><?php the_title();?></a>
								<div class="accordion-content" data-tab-content>
									<?php the_content(); ?>
									<?php if( get_field( "document_upload") ): ?>
									<p><a target="_blank" href="<?php the_field('document_upload'); ?>">View the Document</a></p>
									<?php endif; ?>
									<?php if( get_field( "resource_link") ): ?>
									<p><a target="_blank" href="http://<?php the_field('resource_link'); ?>">Read Additional <?php the_title();?> Information</a></p>
									<?php endif; ?>
								</div>
							</li>
							<?php endwhile; ?>
						</ul>
					</div>
					<?php endif; ?>
				</div>
				<div class="grid-x">
					<?php $general_ehirb_revised_common_rule_query = new WP_Query(array(
						'posts_per_page'	=> 250,
						'orderby' => 'title',
						'order' => 'asc',
						'post_type' => 'documents',
						'meta_key' => 'primary_section',
						'meta_value' => 'ehirb-revised',
						'meta_query' => array(
							array(
								'key'		=> 'ehirb_category_revised_common_rule',
								'compare'	=> 'NOT EXISTS'
							)
						)
					)); if ($general_ehirb_revised_common_rule_query->have_posts() ) :?>
					<div class="cell small-12 large-6">
						<h3>Other eHIRB Materials</h3>
						<ul class="accordion" data-accordion data-allow-all-closed="true">
							<?php while ($general_ehirb_revised_common_rule_query->have_posts()) : $general_ehirb_revised_common_rule_query->the_post(); ?>
							<li class="accordion-item" data-accordion-item>
								<a href="#" class="accordion-title"><?php the_title();?></a>
								<div class="accordion-content" data-tab-content>
									<?php the_content(); ?>
									<?php if( get_field( "document_upload") ): ?>
									<p><a href="<?php the_field('document_upload'); ?>">View the Document</a></p>
									<?php endif; ?>
									<?php if( get_field( "resource_link") ): ?>
									<p><a href="http://<?php the_field('resource_link'); ?>">Read Additional <?php the_title();?> Information</a></p>
									<?php endif; ?>
								</div>
							</li>
							<?php endwhile; ?>
						</ul>
					</div>
					<?php endif; ?>
				</div>
			</div>
				<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
<!--This is where Pre-2018 Common Rule documents go-->
				<div class="callout alert">
					<h3>Common Rule</h3>
					<div class="grid-x">
						<?php $application_ehirb_query = new WP_Query(array(
							'posts_per_page'	=> 250,
							'orderby' => 'title',
							'order' => 'asc',
							'post_type' => 'documents',
							'meta_query' => array(
								array(
									'key'		=> 'ehirb_category',
									'value'		=> 'application',
									'compare'	=> 'LIKE'
								)
							)
						)); if ($application_ehirb_query->have_posts() ) :?>
						<div class="cell small-12 large-6">
							<h4>Application Materials</h4>
							<ul class="accordion" data-accordion data-allow-all-closed="true">
								<?php while ($application_ehirb_query->have_posts()) : $application_ehirb_query->the_post(); ?>
								<li class="accordion-item" data-accordion-item>
									<a href="#" class="accordion-title"><?php the_title();?></a>
									<div class="accordion-content" data-tab-content>
										<?php the_content(); ?>
										<?php if( get_field( "document_upload") ): ?>
										<p><a href="<?php the_field('document_upload'); ?>">View the Document</a></p>
										<?php endif; ?>
										<?php if( get_field( "resource_link") ): ?>
										<p><a href="http://<?php the_field('resource_link'); ?>">Read Additional <?php the_title();?> Information</a></p>
										<?php endif; ?>
									</div>
								</li>
								<?php endwhile; ?>
							</ul>
						</div>
						<?php endif; ?>
						<?php $fsa_ehirb_query = new WP_Query(array(
							'posts_per_page' => 250,
							'orderby' => 'title',
							'order' => 'asc',
							'post_type' => 'documents',
							'meta_query' => array(
								array(
									'key'		=> 'ehirb_category',
									'value'		=> 'actions',
									'compare'	=> 'LIKE'
								)
							)
						)); if ($fsa_ehirb_query->have_posts() ) :?>
						<div class="cell small-12 large-6">
							<h4>Further Study Action (FSA) Documents</h4>
							<ul class="accordion" data-accordion data-allow-all-closed="true">
								<?php while ($fsa_ehirb_query->have_posts()) : $fsa_ehirb_query->the_post(); ?>
								<li class="accordion-item" data-accordion-item>
									<a href="#" class="accordion-title"><?php the_title();?></a>
									<div class="accordion-content" data-tab-content>
										<?php the_content(); ?>
										<?php if( get_field( "document_upload") ): ?>
										<p><a href="<?php the_field('document_upload'); ?>">View the Document</a></p>
										<?php endif; ?>
										<?php if( get_field( "resource_link") ): ?>
										<p><a href="http://<?php the_field('resource_link'); ?>">Read Additional <?php the_title();?> Information</a></p>
										<?php endif; ?>
									</div>
								</li>
								<?php endwhile; ?>
							</ul>
						</div>
						<?php endif; ?>
					</div>
					<div class="grid-x">
						<?php $consent_ehirb_query = new WP_Query(array(
							'posts_per_page' => 250,
							'orderby' => 'title',
							'order' => 'asc',
							'post_type' => 'documents',
							'meta_query' => array(
								array(
									'key'		=> 'ehirb_category',
									'value'		=> 'consent',
									'compare'	=> 'LIKE'
								)
							)
						)); if ($consent_ehirb_query->have_posts() ) :?>
						<div class="cell small-12 large-6">
							<h4>Consent Forms</h4>
							<ul class="accordion" data-accordion data-allow-all-closed="true">
								<?php while ($consent_ehirb_query->have_posts()) : $consent_ehirb_query->the_post(); ?>
								<li class="accordion-item" data-accordion-item>
									<a href="#" class="accordion-title"><?php the_title();?></a>
									<div class="accordion-content" data-tab-content>
										<?php the_content(); ?>
										<?php if( get_field( "document_upload") ): ?>
										<p><a href="<?php the_field('document_upload'); ?>">View the Document</a></p>
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
						<?php $related_ehirb_query = new WP_Query(array(
							'posts_per_page'	=> 250,
							'orderby' => 'title',
							'order' => 'asc',
							'post_type'		=> 'documents',
							'meta_query'	=> array(
								array(
									'key'		=> 'affiliated_section',
									'value'		=> 'eHIRB',
									'compare'	=> 'LIKE'
								)
							)
						)); if( $related_ehirb_query->have_posts() ): ?>
						<div class="cell small-12 large-6">
							<h4>Related Documents & Resources</h4>
							<ul class="accordion" data-accordion data-allow-all-closed="true">
								<?php while( $related_ehirb_query->have_posts() ) : $related_ehirb_query->the_post(); ?>
								<li class="accordion-item" data-accordion-item>
									<a href="#" class="accordion-title"><?php the_title();?></a>
									<div class="accordion-content" data-tab-content>
										<?php the_content(); ?>
										<?php if( get_field( "document_upload") ): ?>
										<p><a target="_blank" href="<?php the_field('document_upload'); ?>">View the Document</a></p>
										<?php endif; ?>
										<?php if( get_field( "resource_link") ): ?>
										<p><a target="_blank" href="http://<?php the_field('resource_link'); ?>">Read Additional <?php the_title();?> Information</a></p>
										<?php endif; ?>
									</div>
								</li>
								<?php endwhile; ?>
							</ul>
						</div>
						<?php endif; ?>
					</div>
					<div class="grid-x">
						<?php $general_ehirb_query = new WP_Query(array(
							'posts_per_page' => 250,
							'orderby' => 'title',
							'order' => 'asc',
							'post_type' => 'documents',
							'meta_key' => 'primary_section',
							'meta_value' => 'ehirb',
							'meta_query' => array(
									array(
										'key'		=> 'ehirb_category',
										'compare'	=> 'NOT EXISTS'
									)
							)
						)); if ($general_ehirb_query->have_posts() ) :?>
						<div class="cell small-12 large-6">
							<h4>Other eHIRB Materials</h4>
							<ul class="accordion" data-accordion data-allow-all-closed="true">
								<?php while ($general_ehirb_query->have_posts()) : $general_ehirb_query->the_post(); ?>
								<li class="accordion-item" data-accordion-item>
									<a href="#" class="accordion-title"><?php the_title();?></a>
									<div class="accordion-content" data-tab-content>
										<?php the_content(); ?>
										<?php if( get_field( "document_upload") ): ?>
										<p><a href="<?php the_field('document_upload'); ?>">View the Document</a></p>
										<?php endif; ?>
										<?php if( get_field( "resource_link") ): ?>
										<p><a href="http://<?php the_field('resource_link'); ?>">Read Additional <?php the_title();?> Information</a></p>
										<?php endif; ?>
									</div>
								</li>
								<?php endwhile; ?>
							</ul>
						</div>
						<?php endif; ?>
					</div>
					<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
				</div>
			</section>
		</main>
	</div>
</div>
<?php get_footer();