<?php
/**
 * Register widget areas
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_sidebar_widgets' ) ) :
	function foundationpress_sidebar_widgets() {
register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Global Sidebar', 'foundationpress'),
		'description' => __('The first (primary) sidebar.'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'offcanvas',
		'name' => __('Offcanvas', 'foundationpress'),
		'description' => __('The offcanvas sidebar.', 'foundationpress'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'homepage0',
		'name' => __('Homepage', 'foundationpress'),
		'description' => __('The sidebar for the homepage only. Appears below Global Sidebar', 'foundationpress'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'homepage1',
		'name' => __('Homepage Left', 'foundationpress'),
		'description' => __('The left column on the homepage.', 'foundationpress'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'homepage2',
		'name' => __('Homepage Right', 'foundationpress'),
		'description' => __('The right column on the homepage.', 'foundationpress'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar( array(
		'name' => 'Sidebar 1',
		'id' => 'sidebar-1',
		'description' => __('Sidebar #1. Call this sidebar on each page you want it to appear', 'foundationpress'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));
    register_sidebar( array(
		'name' => 'Sidebar 2',
		'id' => 'sidebar-2',
		'description' => __('Sidebar #2. Call this sidebar on each page you want it to appear', 'foundationpress'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));
    register_sidebar( array(
		'name' => 'Sidebar 3',
		'id' => 'sidebar-3',
		'description' => __('Sidebar #3. Call this sidebar on each page you want it to appear', 'foundationpress'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));
    register_sidebar( array(
		'name' => 'Sidebar 4',
		'id' => 'sidebar-4',
		'description' => __('Sidebar #4. Call this sidebar on each page you want it to appear', 'foundationpress'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));
    register_sidebar( array(
		'name' => 'Sidebar 5',
		'id' => 'sidebar-5',
		'description' => __('Sidebar #5. Call this sidebar on each page you want it to appear', 'foundationpress'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));
    register_sidebar( array(
		'name' => 'Sidebar 6',
		'id' => 'sidebar-6',
		'description' => __('Sidebar #6. Call this sidebar on each page you want it to appear', 'foundationpress'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));
    register_sidebar( array(
		'name' => 'Sidebar 7',
		'id' => 'sidebar-7',
		'description' => __('Sidebar #7. Call this sidebar on each page you want it to appear', 'foundationpress'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));
	register_sidebar(array(
		'id' => 'homepage-left-3rd',
		'name' => __('Homepage Left Third Column', 'foundationpress'),
		'description' => __('The left third column on the homepage. Appears above Left/Right 2', 'foundationpress'),
		'before_widget' => '<div id="%1$s" class="primary callout %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'homepage-middle-3rd',
		'name' => __('Homepage Middle Third Column', 'foundationpress'),
		'description' => __('The middle third column on the homepage. Appears above Left/Right 2', 'foundationpress'),
		'before_widget' => '<div id="%1$s" class="secondary callout %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));


	register_sidebar(array(
		'id' => 'homepage-right-3rd',
		'name' => __('Homepage Right Third Column', 'foundationpress'),
		'description' => __('The right third column on the homepage. Appears above Left/Right 2', 'foundationpress'),
		'before_widget' => '<div id="%1$s" class="primary callout %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));    
	}

	add_action( 'widgets_init', 'foundationpress_sidebar_widgets' );
endif;
