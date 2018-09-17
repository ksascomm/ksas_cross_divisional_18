<?php
/*
Template Name: IRB Members
*/
get_header(); ?>

<div class="main-container" id="page">
   <div class="main-grid">
      <main class="main-content">
			<div class="secondary">
				<?php foundationpress_breadcrumb(); ?>
			</div>
			
			<?php while ( have_posts() ) : the_post(); ?>
			
					<?php get_template_part( 'template-parts/content', 'page' ); ?>
			
			<?php endwhile; ?>
		
         <?php $members_query = new WP_Query(array(
            'posts_per_page'  => -1,
            'orderby' => 'title',
            'order' => 'asc',
            'post_type' => 'documents',
            'meta_key' => 'primary_section',
            'meta_value' => 'members',
         )); ?> 
        <section class="documents">
            <div class="grid-x">
               <?php if ( $members_query->have_posts() ) :?>
               <div class="cell small-12 large-6">
                  <h3>Documents & Resources for Members</h3>
                  <ul class="accordion" data-accordion data-allow-all-closed="true">
                     <?php while ($members_query->have_posts()) : $members_query->the_post(); ?>
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
               <?php 
                  // args
                  $args = array(
                     'posts_per_page'  => -1,
                     'orderby' => 'title',
                     'order' => 'asc',
                     'post_type'    => 'documents',
                     'meta_query'   => array(
                        array(
                           'key'    => 'affiliated_section',
                           'value'     => 'members',
                           'compare'   => 'LIKE'
                           )
                     )
                  );
                  
                  // query
                  $related_members_query = new WP_Query( $args );
                  
                  ?>
               <?php if( $related_members_query->have_posts() ): ?>
                <div class="cell small-12 large-6">
                  <h3>Related Documents & Resources</h3>
                  <ul class="accordion" data-accordion data-allow-all-closed="true">
                     <?php while( $related_members_query->have_posts() ) : $related_members_query->the_post(); ?>
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
               <?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>
            </div>
         </section>
		 </main>
      <?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();