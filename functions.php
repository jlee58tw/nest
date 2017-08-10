<?php
/**
 * nest functions and definitions
 * Please browse readme.txt for credits and forking information
 *
 * @package nest
 */


if ( ! function_exists( 'nest_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */


function nest_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on nest, use a find and replace
	 * to change 'nest' to the name of your theme in all the template files
	 */
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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270);
	add_image_size( 'nest-full-width', 1038, 576, true );
	
	
    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
            'primary' => esc_html__( 'Top Primary Menu', 'nest' ),
    ) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		) );
}


endif; // nest_setup
add_action( 'after_setup_theme', 'nest_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 */
function nest_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nest_content_width', 640 );
}
add_action( 'after_setup_theme', 'nest_content_width', 0 );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */

function nest_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nest' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Widgets here will appear in your sidebar', 'nest' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="sidebar-headline-wrapper"><div class="widget-title-lines"></div><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
		) );
}
add_action( 'widgets_init', 'nest_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nest_scripts ( $in_footer ) {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css',true );  
	wp_enqueue_style( 'nest-style', get_stylesheet_uri() );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js',array('jquery'),'',true);  
	wp_enqueue_script( 'nest-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '20130115', true );
	wp_enqueue_script( 'html5shiv', get_template_directory_uri().'/js/html5shiv.js', array(),'3.7.3',false );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'nest_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom nav walker
 */
if(!class_exists('wp_bootstrap_navwalker')){
require get_template_directory() . '/inc/navwalker.php';
}


function nest_google_fonts() {
	$query_args = array(
		'family' => 'Roboto:400,400italic,600,600italic,700,700i,900'
		);
    wp_enqueue_style( 'nest-googlefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
	wp_register_style('noto_font',  '//fonts.googleapis.com/earlyaccess/notosanstc.css' );
	wp_enqueue_style( 'noto_font' );
}

add_action('wp_enqueue_scripts', 'nest_google_fonts');

function nest_new_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}

		$link = sprintf( '<p class="read-more"><a class="readmore-btn" href="'. esc_url(get_permalink( get_the_ID() )) . '' . '">' . __('+', 'nest') . '<span class="screen-reader-text"> '. __(' Read More', 'nest').'</span></a></p>',
		esc_url( get_permalink( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;

}
add_filter( 'excerpt_more', 'nest_new_excerpt_more' );

/**
*
* Custom Logo in the top menu
*
**/

function nest_logo() {
	add_theme_support('custom-logo', array(
		'size' => 'nest-logo',
		'width'                  => 250,
		'height'                 => 50,
		'flex-height'            => true,
		));
}

add_action('after_setup_theme', 'nest_logo');

/**
*
* New Footer Widgets
*
**/

function nest_footer_widget_left_init() {

	register_sidebar( array(
		'name' => esc_html__('Footer Widget left', 'nest'),
		'id' => 'footer_widget_left',
		'description'   => esc_html__( 'Widgets here will appear in your footer', 'nest' ),
		'before_widget' => '<div class="footer-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
		) );
}
add_action( 'widgets_init', 'nest_footer_widget_left_init' );

function nest_footer_widget_middle_init() {

	register_sidebar( array(
		'name' => esc_html__('Footer Widget middle', 'nest'),
		'id' => 'footer_widget_middle',
		'description'   => esc_html__( 'Widgets here will appear in your footer', 'nest' ),
		'before_widget' => '<div class="footer-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
		) );
}
add_action( 'widgets_init', 'nest_footer_widget_middle_init' );

function nest_footer_widget_right_init() {

	register_sidebar( array(
		'name' => esc_html__('Footer Widget right', 'nest'),
		'id' => 'footer_widget_right',
		'before_widget' => '<div class="footer-widgets">',
		'description'   => esc_html__( 'Widgets here will appear in your footer', 'nest' ),
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
		) );
}
add_action( 'widgets_init', 'nest_footer_widget_right_init' );

add_action( 'customize_controls_print_styles', 'nest_customizer_stylesheet' );

function nest_load_custom_wp_admin_style( $hook ) {
    if ( 'appearance_page_about-nest' !== $hook ) {
        return;
    }
    wp_enqueue_style( 'nest-custom-admin-css', get_template_directory_uri() . '/css/admin.css', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'nest_load_custom_wp_admin_style' );


/**
*
* numbered pagination
*
**/

function pagination($pages = '', $range = 4)
{  
     $showitems = ($range * 2)+1;  
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == ''){
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages){
             $pages = 1;
         }
     }   
 
    if(1 != $pages){
         //echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";

         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; 上一頁</a>";
 
        for ($i=1; $i <= $pages; $i++){
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
            	echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
            }
        }
 
        if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">下一頁 &rsaquo;</a>";  
    }
}

/**
*
* remove meta and nav class name
*
**/

remove_action('wp_head', 'wp_generator');
remove_action ('wp_head', 'rsd_link');

add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
	return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}


?>