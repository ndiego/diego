<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package diego
 */

if ( ! defined( 'DIEGO_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'DIEGO_VERSION', '1.0.0' );
}

if ( ! function_exists( 'diego_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function diego_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change 'diego' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'diego', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'diego' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'diego_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		
		// Adds block editor support for wide and full width blocks
		add_theme_support( 'align-wide' );
	}
endif;
add_action( 'after_setup_theme', 'diego_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function diego_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'diego_content_width', 640 );
}
add_action( 'after_setup_theme', 'diego_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function diego_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'diego' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'diego' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'diego' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Add widgets here.', 'diego' ),
			'before_widget' => '<section id="%1$s" class="footer-widget widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Header', 'diego' ),
			'id'            => 'blog-header',
			'description'   => esc_html__( 'Add widgets here.', 'diego' ),
			'before_widget' => '<section id="%1$s" class="blog-header-widget widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
}
add_action( 'widgets_init', 'diego_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function diego_scripts() {
	wp_enqueue_style( 'diego-style', get_stylesheet_uri(), array(), DIEGO_VERSION );
	wp_style_add_data( 'diego-style', 'rtl', 'replace' );
	
	wp_enqueue_script( 'diego-navigation', get_template_directory_uri() . '/js/navigation.js', array(), DIEGO_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	/* Load Fontawesome scripts */
	wp_enqueue_script( 'diego-fontawesome', 'https://kit.fontawesome.com/8da28bfbc7.js', array(), DIEGO_VERSION, false );
}
add_action( 'wp_enqueue_scripts', 'diego_scripts' );

/**
 * Append Font Awesome script attributes 
 */
function diego_fontawesome_script_attributes( $tag, $handle ) {
	if ( 'diego-fontawesome' !== $handle )
  	return $tag;

 	return str_replace( ' src', ' data-search-pseudo-elements crossorigin="anonymous" src', $tag );
}
add_filter('script_loader_tag', 'diego_fontawesome_script_attributes', 10, 2);

/**
 * Load dashicons on the frontend.
 */
function diego_load_dashicons(){
   wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'diego_load_dashicons' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Block Editor Specific Styles.
 */
add_theme_support( 'editor-styles' );
add_editor_style( 'style-editor.css' );

/* Add custom colors to the editor */
add_theme_support( 'editor-color-palette', array(
    array(
        'name' => __( 'Almost Black', 'diego' ),
        'slug' => 'almost-black',
        'color' => '#222',
    ),
	array(
		'name' => __( 'Background Green', 'diego' ),
		'slug' => 'background-green',
		'color' => '#f2f4f1',
	),
	array(
		'name' => __( 'Background Grey', 'diego' ),
		'slug' => 'background-grey',
		'color' => '#f0f1f2',
	),
) );

/**
 * Create a custom read more link.
 */
function diego_excerpt_more( $more ) {
	return sprintf( ' … <a href="%1$s" class="more-link">%2$s</a>',
		  esc_url( get_permalink( get_the_ID() ) ),
		  sprintf( __( 'Continue reading &rarr; %s', 'wpdocs' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
	);
}
add_filter( 'excerpt_more', 'diego_excerpt_more' );

/**
 * Create a custom archive title.
 */
function diego_filter_archive_title($title) {    
    if ( is_category() ) {    
            $title = '<span class="archive-label">' . __( 'Category:', 'diego' ) . '</span>' . single_cat_title( '', false );    
        } elseif ( is_tag() ) {    
            $title = '<span class="archive-label">' . __( 'Tag:', 'diego' ) . '</span>' . single_tag_title( '', false );    
        } elseif ( is_author() ) {    
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
        } elseif ( is_tax() ) { //for custom post types
            $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title( '', false );
        }
    return $title;    
};
add_filter( 'get_the_archive_title', 'diego_filter_archive_title' );

