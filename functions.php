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


/**
 * Custom function to repurpose custom-background functionality to our footer
 * http://wp.tutsplus.com/articles/tips-articles/modifying-custom-background-feature-for-any-html-element-you-want/
 */

function mclub_custom_background_cb() {
	$background = get_background_image();
	$color = get_background_color();

	if ( ! $background && ! $color )
		return;

	$style = $color ? "background-color: #$color;" : '';

	if ( $background ) {
		$image = " background-image: url('$background');";

		$repeat = get_theme_mod( 'background_repeat', 'repeat' );

		if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
			$repeat = 'repeat';

		$repeat = " background-repeat: $repeat;";

		$position = get_theme_mod( 'background_position_x', 'left' );

		if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
			$position = 'left';

		$position = " background-position: top $position;";

		$attachment = get_theme_mod( 'background_attachment', 'scroll' );

		if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
			$attachment = 'scroll';

		$attachment = " background-attachment: $attachment;";

		$style .= $image . $repeat . $position; //. $attachment;
	}
?>
<style type="text/css">
	#colophon { <?php echo trim( $style ); ?> background-size: cover; }
</style>
<?php
}

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
	add_image_size( 'front-page-thumb', 400, 260, true );

	/**
	 * This theme uses wp_nav_menu() in two locations.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'mclub' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	add_theme_support( 'custom-background', array(
		'wp-head-callback' => 'mclub_custom_background_cb',
	) );

}
endif; // mclub_setup
add_action( 'after_setup_theme', 'mclub_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function mclub_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'mclub' ),
		'id'            => 'sidebar-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Main Page Top Area', 'mclub' ),
		'id'            => 'homepage-top',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'			=> __( 'Footer Column 1', 'mclub' ),
		'id'            => 'footer-col-1',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<span class="footer-col-header">',
		'after_title'   => '</span>',
	));
	register_sidebar( array(
		'name'			=> __( 'Footer Column 2', 'mclub' ),
		'id'            => 'footer-col-2',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<span class="footer-col-header">',
		'after_title'   => '</span>',
	));
	register_sidebar( array(
		'name'			=> __( 'Footer Column 3', 'mclub' ),
		'id'            => 'footer-col-3',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<span class="footer-col-header">',
		'after_title'   => '</span>',
	));
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

	wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', false, null );

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
	
	/**
	 * Enqueue social sharing scripts if singular page
	 */

	if ( is_singular() ) {
		wp_enqueue_script( 'facebook-jssdk', '//connect.facebook.net/en_US/all.js#xfbml=1&appId=563087663768939', false, null ); // Facebook JSSDK

	}

	remove_action('wp_head', 'wlwmanifest_link'); // get rid of live writer
}
add_action( 'wp_enqueue_scripts', 'mclub_scripts' );

/**
 * Add IE7 support for fontawesome
 * http://fontawesome.io/get-started/
 */
function mclub_fontawesome_ie7_support() {
	echo '<!--[if IE 7]>';
	echo '<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome-ie7.min.css">';
	echo '<![endif]-->';
}
//add_action('wp_head', 'mclub_fontawesome_ie7_support');


/**
 * Add ie conditional html5shiv to header
 * http://css-tricks.com/snippets/wordpress/html5-shim-in-functions-php/
 */
function mclub_ie_html5_shim () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'mclub_ie_html5_shim');

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

	/* For the MClub Template, we want to place alignleft/alignright captions vertically 
	   centered to the left/right of the image. Currently doing this with CSS Tables -
	   but the order of the caption/figure needs to be swapped depinging on which side
	   of the image (which "cell") the caption falls:
	   		=Left Image=> Image First, Caption Second
	   		=Right Image=> Caption First, Image Second

	   The default code works for alignleft and aligncenter, we only need to capture alignright
	*/

	if( $align == 'alignright' ) {
		return '<figure id="' . esc_attr($id) . '" class="wp-caption ' . esc_attr($align) . '"><figcaption id="figcaption_'. esc_attr($id) . '" class="wp-caption-text" itemprop="description">' . $caption . '</figcaption>' . do_shortcode( $content ) . '</figure>';
	} else {
		return '<figure id="' . esc_attr($id) . '" class="wp-caption ' . esc_attr($align) . '">' . do_shortcode( $content ) . '<figcaption id="figcaption_'. esc_attr($id) . '" class="wp-caption-text" itemprop="description">' . $caption . '</figcaption></figure>';
	}

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
