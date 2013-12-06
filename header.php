<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package MClub LA
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="initial-scale=1.0, width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php wp_head(); ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#masthead_wrapper').scrollToFixed() ;
	});
</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<div id="masthead_wrapper">
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>
		<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php bloginfo('template_directory') ?>/images/logo.svg" onerror="this.onerror=null; this.src='logo.png'" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
		<nav id="site-navigation" class="navigation-main" role="navigation">
			<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'mclub' ); ?>"><?php _e( 'Skip to content', 'mclub' ); ?></a></div>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
		<div class="search">
		<?php get_search_form(); ?>
		</div><!-- .search -->
	</header><!-- #masthead -->
    </div><!-- #masthead_wrapper -->
	<div class="wrapper">
		<?php if ( is_home() ) : ?>
			<?php if ( ! dynamic_sidebar( 'homepage-top' ) ) {
			}// end page top widget area ?>
		<?php endif; ?>
	<div id="main" class="site-main">
