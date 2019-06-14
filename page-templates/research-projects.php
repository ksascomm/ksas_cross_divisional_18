<?php
/*
Template Name: Research Projects
*/
get_header(); ?>
<?php
//Set Research Projects Query Parameters
$flagship_researchprojects_query = new WP_Query(array(
	'post_type' => 'ksasresearchprojects',
	'orderby' => 'date',
	'order' => 'DESC',
	'posts_per_page' => 250
	));
?>

<div class="main-container" id="page">
	<div class="main-grid">
		<main class="main-content-full-width">
			<div class="secondary">
				<?php foundationpress_breadcrumb(); ?>
			</div>			
			<?php do_action( 'foundationpress_before_content' ); ?>
			<?php
            while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<header aria-label="<?php the_title(); ?>">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
			<?php endwhile; ?>
			<div class="directory-search callout lightgrey" role="region" aria-label="Filters">
			<?php $projects = get_terms('project_type', array(
					'orderby' 		=> 'ID',
					'order'			=> 'ASC',
					'hide_empty'	=> true,
				));
				
					$count_projects = count($projects);
					if ($count_projects > 0) : ?>
						<p>Filter by Project Type or Research Area:</p>
						<ul class="filter-list menu role-group" data-filter-group="role">
							<?php foreach ( $projects as $project ) : ?>
							<li class="research-project role-filter">
								<a class="button capitalize" href="javascript:void(0)" data-filter=".<?php echo $project->slug; ?>" class="selected"><?php echo $project->name; ?></a>
							</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				<div class="grid-x search-sort">
					<div class="large-8 cell">
						<label for="id_search">
							<p>Search by keyword:</p>
						</label>
						<div class="input-group">
							<span class="input-group-label">
								<span class="fa fa-search"></span>
							</span>
							<input class="quicksearch input-group-field" type="text" name="search" id="id_search" aria-label="Search by keyword"  />
						</div>
					</div>
				</div>
			</div>
			<div id="isotope-list" class="people-directory loading grid-x grid-padding-x small-up-1 medium-up-2 large-up-3" role="region" aria-label="Results">
				<?php while ($flagship_researchprojects_query->have_posts()) : $flagship_researchprojects_query->the_post();
					//Pull discipline array (humanities, natural, social)
					$program_types = get_the_terms( $post->ID, 'project_type' );
						if ( $program_types && ! is_wp_error( $program_types ) ) :
							$program_type_names = array();
							$degree_types = array();
								foreach ( $program_types as $program_type ) {
									$program_type_names[] = $program_type->slug;
									$project_types[] = $program_type->name;
								}
							$program_type_name = join( " ", $program_type_names );
							$project_type = join( ", ", $project_types );
				endif; ?>
				
				<!-- Set classes for isotype.js filter buttons -->
				<div class="cell item  <?php echo $program_type_name; ?>">
					
					<div class="field" id="<?php echo $program_type->slug ?>">
						
						<?php if ( has_post_thumbnail()) { ?>
							<?php the_post_thumbnail('thumbnail'); ?>
						<?php } ?>
						<h5>
							<a href="<?php echo get_permalink() ?>" title="<?php the_title(); ?>" class="field"><?php the_title(); ?></a>
						</h5>
						
						<div class="grid-x">
							<div class="small-12 cell fields ">
								<p>
									<?php if (get_post_meta($post->ID, 'ecpt_associate_name', true)) : ?>
										<strong><?php echo get_post_meta($post->ID, 'ecpt_associate_name', true); ?></strong><br>
									<?php endif; ?>
									<?php if (get_post_meta($post->ID, 'ecpt_dates', true)) : ?>
										<strong><?php echo get_post_meta($post->ID, 'ecpt_dates', true); ?></strong><br>
									<?php endif; ?>
									<?php if (get_post_meta($post->ID, 'ecpt_description_short', true)) : ?>
										<?php echo get_post_meta($post->ID, 'ecpt_description_short', true); ?><br>
									<?php endif; ?>
								</p>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
				<div id="noResult">
					<div class="callout warning">
						<h3> No matching results</h3>
					</div>
				</div>
			</div>
		</main>
		<?php do_action( 'foundationpress_after_content' ); ?>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();