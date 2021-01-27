<?php
/**
Template Name: Alumni Testimonials
 * The template for displaying the Testimonial custom post type's alumni taxonomy
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package KSASAcademic
 * @since KSASAcademic 1.0.0
 */

get_header(); ?>

<div class="main-container" id="page">
    <div class="main-grid">
        <main class="main-content-full-width">
            <div class="secondary">
                <?php ksasacademic_breadcrumb(); ?>
            </div>
            <?php  while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/content', 'page' ); ?>
            <?php endwhile; ?>
            <?php
            $ksas_alumni_testimonial_query = new WP_Query(
                array(
					'post-type' => 'testimonial',
					'testimonialtype' => 'alumni-testimonial',
					'meta_key' => 'ecpt_testimonial_alpha',
					'orderby' => 'meta_value',
					'order' => 'ASC',
					'posts_per_page' => 100,
				)
                );
            ?>
            <?php if ($ksas_alumni_testimonial_query->have_posts() ) : ?>
                <div class="grid-x grid-padding-x small-up-2 medium-up-3 large-up-4">
                    <?php while ($ksas_alumni_testimonial_query->have_posts() ) :  $ksas_alumni_testimonial_query->the_post(); ?>
                    <div class="cell testimonial-container">
                        <div class="card testimonial">
                            <div class="card-section testimonial-avatar">
                                <?php
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail();  }
                                ?>
                            </div>
                            <div class="card-section testimonial-bio">
                                <h2><?php the_title(); ?></h2>
                                <?php if ( get_post_meta($post->ID, 'ecpt_job', true) ) : ?>
                                <h3><?php echo get_post_meta($post->ID, 'ecpt_job', true); ?></h3>
                                <?php endif; ?>
                                <?php if ( get_post_meta($post->ID, 'ecpt_class', true) ) : ?>
                                <h3>Class of: <span class="light"><?php echo get_post_meta($post->ID, 'ecpt_class', true); ?></span></h3>
                                <?php endif; ?>
                                <p class="full-testimonial">
                                    <button class="button testimonial-button" data-open="post-<?php the_ID(); ?>">
                                    Read Testimonial
                                    </button>
                                </p>
                            </div>
                            <div class="reveal testimonial-content" id="post-<?php the_ID(); ?>" aria-labelledby="Modal-<?php the_ID(); ?>" data-reveal>
                                <h1 id="Modal-<?php the_ID(); ?>"><?php the_title(); ?></h1>
                                <div aria-label="<?php the_title(); ?>'s Full Testimonial">
                                <?php if ( get_post_meta($post->ID, 'ecpt_class', true) ) : ?>
                                    <p><strong>Class of: <?php echo get_post_meta($post->ID, 'ecpt_class', true); ?></strong></p>
                                <?php endif; ?>
                                <?php if ( get_post_meta($post->ID, 'ecpt_internship', true) ) : ?>
                                    <p><strong>Internship:</strong> <?php echo get_post_meta($post->ID, 'ecpt_internship', true); ?></p>
                                <?php endif; ?>
                                <?php if ( get_post_meta($post->ID, 'ecpt_job', true) ) : ?>
                                    <p><?php echo get_post_meta($post->ID, 'ecpt_job', true); ?></p>
                                <?php endif; ?>
                                <?php the_content(); ?>
                                </div>
                                <button class="close-button" data-close aria-label="Close reveal" type="button">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            <?php endif;?>
        </main>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php
get_footer();
