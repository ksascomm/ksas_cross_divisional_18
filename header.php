<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<meta name="date" content="<?php the_modified_date(); ?>" />
		<title><?php create_page_title(); ?></title>
	
		<?php wp_head(); ?>
		
		<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/dist/assets/images/favicons/browserconfig.xml" />

		<!--Scripts-->
		<script src="https://kit.fontawesome.com/ed22ca715b.js" crossorigin="anonymous" defer></script>
		<?php get_template_part( 'template-parts/analytics' ); ?>
		<?php get_template_part( 'template-parts/script-initiators' ); ?>
	</head>
	<body <?php body_class(); ?>>
	<div class="alert" role="navigation" aria-label="COVID-19 Alerts">
    	<a class="alert-message" href="https://covidinfo.jhu.edu/">COVID-19 information and resources for the Johns Hopkins University community</a>
	</div>		
	<div role="navigation" aria-label="Skip to main content">
		<a class="skip-main show-on-focus" href="#page" >Skip to main content</a>
	</div>
	<div class="show-for-print" aria-hidden="true">
		<img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/krieger.blue.svg" alt="krieger logo">
		<h1><?php echo get_bloginfo( 'description' ); ?> <?php echo get_bloginfo( 'title' ); ?></h1>
	</div>
	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>


	<header class="site-header" role="banner" aria-labelledby="dept-info">
		<div class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle(); ?>>
			<div class="title-bar-left">
				<button aria-label="<?php _e( 'Main Menu', 'foundationpress' ); ?>" class="menu-icon" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></button>
				<span class="site-mobile-title title-bar-title">
					Main Menu
				</span>
			</div>
		</div>

		<div class="roof-header-top show-for-large hide-for-print">
			<div class="row align-justify">
		    	<div class="roof-header-top-links">
		        	<?php get_template_part( 'template-parts/roof' ); ?>
		      	</div>
		    </div>
		</div>
		
		<div class="top-bar site-information hide-for-print">				
			<div class="logo">
				<?php $theme_option = flagship_sub_get_global_options();
						$shield = $theme_option['flagship_sub_shield'];
				if ('jhu' === $shield ) : ?>
				<a href="http://www.jhu.edu/" title="Johns Hopkins University">
					<img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/jhu-horizontal.png" alt="Johns Hopkins University">
				</a>
				<?php elseif ('custom' === $shield ) : ?>
				<a href="http://www.jhu.edu/" title="Johns Hopkins University">
					<img src="<?php echo $theme_option['flagship_sub_shield_location']; ?>" alt="Johns Hopkins University">
				</a>
				<?php else: ?>
				<a href="http://krieger.jhu.edu" title="Krieger School of Arts & Sciences">
					<img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/ksas-horizontal-md.png" alt="Krieger School of Arts and Sciences">
				</a>
				<?php endif; ?>
			</div>
			<div class="site-desktop-title top-bar-title">
				<h1>
					<a id="dept-info" href="<?php echo site_url(); ?>">
						<?php if ( ! empty( get_bloginfo('description') ) ) : ?>
							<small class="hide-for-small-only"><?php echo get_bloginfo( 'description' ); ?></small>
						<?php endif; ?>
					<?php echo get_bloginfo( 'title' ); ?>
					</a>
				</h1>
			</div>
		</div>
		<nav class="top-bar main-navigation hide-for-print" aria-label="Main Menu">
			<div class="top-bar-left">
				<div class="grid-container">
					<div class="grid-x grid-padding-x">						
						<?php foundationpress_top_bar_r(); ?>
						<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
						<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</nav>
	</header>
