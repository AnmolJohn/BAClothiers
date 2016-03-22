<?php
/**
 * BA Clotheirs functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BA_Clotheirs
 */
 
/**
*this code is enqueing google fonts into the theme
*/

function ba_clothiers_google_fonts() {
	wp_enqueue_style('ba-google-fonts', 'https://fonts.googleapis.com/css?family=Lobster|Libre+Baskerville', false );
}
add_action('wp_enqueue_scripts', 'ba_clothiers_google_fonts');
if ( ! function_exists( 'ba_clotheirs_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ba_clotheirs_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on BA Clotheirs, use a find and replace
	 * to change 'ba-clotheirs' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ba-clotheirs', get_template_directory() . '/languages' );

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
	add_image_size( 'seasons', 400, 700, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'ba-clotheirs' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ba_clotheirs_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'ba_clotheirs_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ba_clotheirs_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ba_clotheirs_content_width', 640 );
}
add_action( 'after_setup_theme', 'ba_clotheirs_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ba_clotheirs_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ba-clotheirs' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ba_clotheirs_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ba_clotheirs_scripts() {
	wp_enqueue_style( 'ba-clotheirs-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ba-clotheirs-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ba-clotheirs-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

  
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
		 
	}
}
add_action( 'wp_enqueue_scripts', 'ba_clotheirs_scripts' );


/**
 * Register a custom post type called season with only these attributes. This post is only used for slider
 */
function ba_clothiers_custom_init() {
	$args = array(
        'public'             => true,
        'label'              => __( 'seasons', 'textdomain' ),
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );
   
    register_post_type( 'seasons', $args );
}
add_action( 'init', 'ba_clothiers_custom_init' );

/**
 * This code below will give different options to the user to change the background color
 * of the website to either black, grey or navy.
 */
function change_background_color() {
	$options = get_option( 'bac_options_settings' );
   	if ($options['bac_radio_field'] == 'black'){
   		echo '<style type="text/css"> .site-main {background:#000000 !important} </style>';
   	}elseif ($options['bac_radio_field'] == 'grey'){
   		echo '<style type="text/css"> .site-main {background:#808080 !important} </style>';
   	}elseif ($options['bac_radio_field'] == 'navy'){
   		echo '<style type="text/css"> .site-main {background: #0033cc !important} </style>';
   	}
}
      add_action('wp_enqueue_scripts', 'change_background_color');

/**
 * This code below will give different options to the user to change the font color
 * of the website to either red, white or navy.
 */
function change_font_color() {
	$options = get_option( 'bac_options_settings' );
   	if ($options['bac_select_field'] == 'red'){
   		echo '<style type="text/css"> div.entry-content {color:#d92626 !important} </style>';
   	}elseif ($options['bac_select_field'] == 'white'){
   		echo '<style type="text/css"> div.entry-content {color:#ffffff !important} </style>';
   	}elseif ($options['bac_select_field'] == 'navy'){
   		echo '<style type="text/css"> div.entry-content {color: #0033cc !important} </style>';
   	}
}
      add_action('wp_enqueue_scripts', 'change_font_color');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
* The code below will link to options page on Wordpress.*/
require get_template_directory() . '/inc/options.php';


// This code here tells the theme where which folder to get the slider from. Currently is is situated in the inc folder
require get_template_directory() . '/inc/slider.php';