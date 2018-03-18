<?php
/**
 * HSPK functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package HSPK
 */

if ( ! function_exists( 'hspk_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hspk_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on HSPK, use a find and replace
	 * to change 'hspk' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'hspk', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'hspk' ),
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

	
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'hspk_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hspk_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hspk_content_width', 640 );
}
add_action( 'after_setup_theme', 'hspk_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hspk_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hspk' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hspk' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'hspk_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hspk_scripts() {


	wp_enqueue_style( 'foundation-style', '//fonts.googleapis.com/css?family=Open+Sans:300,400,700%7CMontserrat:400,700%7CPlayfair+Display:400,400italic');
	wp_enqueue_style( 'core-css', get_template_directory_uri() . '/css/core.min.css' );
	wp_enqueue_style( 'skin-css', get_template_directory_uri() . '/css/skin.css' );
	wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/css/custom.css' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'timber', get_template_directory_uri() . '/js/timber.master.min.js', array(), '', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hspk_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}





 //Add Custom Widget

class Author_Description_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        'author_description_widget', // Base ID
        __('Author Description Widget', 'hspk'), // Name
        array( 'description' => __( 'Author_Description_Widget', 'hspk' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {
   
    echo $args['before_widget'];
   
    //$title = get_field('_widget_title', 'widget_' . $this->id);
   $author_image = get_field('author_image_sidebar', 'widget_' . $this->id);
   $heading = get_field('heading_sidebar', 'widget_' . $this->id);
   $description = get_field('author_description', 'widget_' . $this->id);


    ?>
	<div class="box bkg-grey-ultralight mb-50 center">
		<img class="mb-20 " src="<?php echo $author_image;?>">
		<h3 class="widget-title"><?php echo $heading ;?></h3>
		<p class="left"><?php echo $description ;?><p>
	</div>
  
       
   
   
   
    <?php
    echo $args['after_widget'];
    }

    public function form( $instance ) {
   
    }

}

// function register_security_logos_widget should copy in add_action section
// Copy  class name from top and pest it on  register_widget section below

function register_author_description_widget() {
register_widget( 'Author_Description_Widget' );
}
add_action( 'widgets_init', 'register_author_description_widget' );


function h2_comments( $comment, $args, $depth ) {
	global $post;
	$author_id = $post->post_author;
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments. ?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'twenties' ); ?></span> <?php comment_author_link(); ?></div>
	<?php
		break;
		default :
		// Proceed with normal comments. ?>
	<li id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" <?php comment_class('comment'); ?>>
			<div class="user-avatar">
				<?php echo get_avatar( $comment, 70 ); ?>
			</div>
			<div class="comment-content">
				<h5 class="name"><?php comment_author_link(); ?></h5>
				<div class="comment-meta">
					<span class="post-date"><?php echo get_comment_date( 'l, F jS, Y', $comment_ID );?></span>/<?php comment_reply_link( array_merge( $args, array('reply_text' => esc_html__( 'Reply', 'twenties' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>         
				</div>
				<?php comment_text(); ?>

				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'twenties' ); ?></em></p>
				<?php endif; ?>

			</div>
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // End comment_type check.
}