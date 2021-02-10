<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package KSASAcademic
 * @since KSASAcademic 1.0.0
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

		<meta name="msapplication-config" content="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/assets/images/favicons/browserconfig.xml" />

		<!--Scripts-->
		<?php get_template_part( 'template-parts/analytics' ); ?>
		<?php get_template_part( 'template-parts/script-initiators' ); ?>
	</head>
	<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5VTN64C"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<div class="alert" role="navigation" aria-label="COVID-19 Alerts">
		<a class="alert-message" href="https://covidinfo.jhu.edu/">COVID-19 information and resources for the Johns Hopkins University community</a>
	</div>
	<div role="navigation" aria-label="Skip to main content">
		<a class="skip-main show-on-focus" href="#page" >Skip to main content</a>
	</div>
	<div class="show-for-print" aria-hidden="true">
		<img width="300" height="87" src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/assets/images/krieger.blue.svg" alt="krieger logo" loading="lazy">
		<h1><?php bloginfo( 'description' ); ?> <?php bloginfo( 'title' ); ?></h1>
	</div>
	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>


	<header class="site-header" role="banner" aria-labelledby="dept-info">
		<div class="site-title-bar title-bar" <?php ksasacademic_title_bar_responsive_toggle(); ?>>
			<div class="title-bar-left">
				<button aria-label="<?php _e( 'Main Menu', 'ksasacademic' ); ?>" class="menu-icon" type="button" data-toggle="<?php ksasacademic_mobile_menu_id(); ?>"></button>
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
		<div class="small-site-holder">
			<div class="site-information hide-for-print">
				<div class="nav-shield">
					<?php
					$theme_option = flagship_sub_get_global_options();
					$shield       = $theme_option['flagship_sub_shield'];
					if ( 'jhu' === $shield ) :
						?>
						<a href="https://www.jhu.edu/" title="Johns Hopkins University">
							<img width="300" height="87" src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/assets/images/university.logo.white.png" alt="Johns Hopkins University" loading="eager">
						</a>
					<?php elseif ( 'custom' === $shield ) : ?>
						<a href="https://www.jhu.edu/" title="Johns Hopkins University">
							<img width="300" height="87" src="<?php echo esc_url( $theme_option['flagship_sub_shield_location'] ); ?>" alt="Johns Hopkins University">
						</a>
					<?php else : ?>
					<a href="https://krieger.jhu.edu" title="Krieger School of Arts & Sciences">
						<img width="300" height="87" src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/assets/images/krieger.white.svg" alt="KSAS Shield" loading="eager">
					</a>
					<?php endif; ?>
				</div>
				<div class="site-desktop-title top-bar-title">
					<h1>
						<a id="dept-info" href="<?php echo esc_url( site_url() ); ?>">
							<?php if ( ! empty( get_bloginfo( 'description' ) ) ) : ?>
								<small class="hide-for-small-only"><?php bloginfo( 'description' ); ?></small>
							<?php endif; ?>
						<?php bloginfo( 'title' ); ?>
						</a>
					</h1>
				</div>
			</div>
		</div>
		<nav class="top-bar main-navigation hide-for-print" aria-label="Main Menu">
			<div class="top-bar-left">
				<div class="grid-container">
					<div class="grid-x grid-padding-x">
						<?php ksasacademic_top_bar_r(); ?>
						<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
							<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</nav>
	</header>
