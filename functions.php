<?php
/**
 * Corona functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Corona
 */

if ( ! function_exists( 'corona_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function corona_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Corona, use a find and replace
	 * to change 'corona' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'corona', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'corona' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'corona_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'corona_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function corona_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'corona_content_width', 640 );
}
add_action( 'after_setup_theme', 'corona_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function corona_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'corona' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'corona' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'corona_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function corona_scripts() {
	wp_enqueue_style( 'corona-style', get_stylesheet_uri() );

	wp_enqueue_style( 'corona-base-css', get_template_directory_uri() . '/inc/css/winstrap.css', true, '1.0', 'all' );

	wp_enqueue_script( 'corona-main', get_template_directory_uri() . '/inc/js/app.js', array(), '20151215', true );

	wp_enqueue_script( 'corona-base-js', get_template_directory_uri() . '/inc/js/winstrap.js', array(), '20151215', true );
}

add_action( 'wp_enqueue_scripts', 'corona_scripts' );

