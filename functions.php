<?php
/**
 * MClub LA functions and definitions
 *
 * @package MClub LA
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 900; /* pixels */

if ( ! function_exists( 'mclub_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function mclub_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on MClub LA, use a find and replace
	 * to change 'mclub' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'mclub', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/* Add home page thumbnail size */
	add_image_size( 'front-page-thumb', 278, 185, true );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'mclub' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // mclub_setup
add_action( 'after_setup_theme', 'mclub_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function mclub_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'mclub' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Main Page Top Area', 'mclub' ),
		'id'            => 'sidebar-2',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'mclub_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function mclub_scripts() {

	/**
	*	Use latest jQuery release
	*/
	if( !is_admin() ){
		wp_deregister_script('jquery');
		wp_register_script('jquery', ("//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false, null);
		wp_enqueue_script('jquery');
	}

	wp_enqueue_style( 'mclub-style', get_stylesheet_uri() );

	wp_enqueue_script( 'mclub-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'mclub-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_script( 'jquery-scrolltofixed', get_template_directory_uri() . '/js/jquery-scrolltofixed-min.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'mclub-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
	
	remove_action('wp_head', 'wlwmanifest_link'); // get rid of live writer
}
add_action( 'wp_enqueue_scripts', 'mclub_scripts' );

/**
 * Excerpt 'read more' customization
 * http://codex.wordpress.org/Function_Reference/the_excerpt
 */
function mclub_excerpt_more( $more ) {
	return ' (<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">More</a>)';
}
add_filter( 'excerpt_more', 'mclub_excerpt_more' );

/**
 * Improves the caption shortcode with HTML5 figure & figcaption; microdata
 * 
 * @param  string $val     Empty
 * @param  array  $attr    Shortcode attributes
 * @param  string $content Shortcode content
 * @return string          Shortcode output
 * https://gist.github.com/JoostKiens/4477366
 */
function mclub_img_caption_shortcode_filter($val, $attr, $content = null)
{
	extract(shortcode_atts(array(
		'id'      => '',
		'align'   => 'aligncenter',
		'width'   => '',
		'caption' => ''
	), $attr));
	
	// No caption, no dice... But why width? 
	if ( 1 > (int) $width || empty($caption) )
		return $val;
 
	if ( $id )
		$id = esc_attr( $id );
     
	// Add itemprop="contentURL" to image - Ugly hack
	$content = str_replace('<img', '<img itemprop="contentURL"', $content);

	return '<figure id="' . esc_attr($id) . '" class="wp-caption ' . esc_attr($align) . '">' . do_shortcode( $content ) . '<figcaption id="figcaption_'. esc_attr($id) . '" class="wp-caption-text" itemprop="description">' . $caption . '</figcaption></figure>';
}
add_filter( 'img_caption_shortcode', 'mclub_img_caption_shortcode_filter', 10, 3 );

/**
 * Custom function to search for the first image in a post
 * http://www.wprecipes.com/how-to-get-the-first-image-from-the-post-and-display-it
 */
function mclub_post_image_search() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

/*  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/default.jpg";
  } 
*/
  return $first_img;
}


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
