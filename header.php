<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
    <head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link rel="stylesheet" type="text/css" href="include/style.css"/>
        <link rel="stylesheet" type="text/css" href="include/responsive.css"/>
        
		<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
        <![endif]-->
        
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery/jquery-scrolltofixed-min.js"></script>
        
        <script type="text/javascript">
			$(document).ready(function() {
				$('header').scrollToFixed();
			});
		</script>
        <!-- Plugin and other dynamic header content -->
        <?php wp_head(); ?>
    </head>


    <body <?php body_class(); ?>>
        <div class="outer-wrapper">
            <div class="wrapper">
                <header class="header">
                    <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="include/images/logo.jpg" rel="home" alt="img"></a>
                    <nav class="navigation">
                        <ul>
                            <li><a href="#">Blog</a></li>
                            <li><a class="active-nav" href="#">Tech</a></li>
                            <li><a href="#">Forum</a></li>
                            <li><a href="#">Store</a></li>
                        </ul>
                    </nav>
                    <!--mobile navigation-->
                    <nav class="nav">
                        <ul>
                            <li class="current"><a href="#">Blog</a></li>
                            <li><a href="#">Tech</a></li>
                            <li><a href="#">Forum</a></li>
                            <li><a href="#">Store</a></li>
                        </ul>
                    </nav>
                    <!---->
                    <div class="search">
                        <input class="submitbtn" type="submit" value=""/>
                        <input class="textbx" type="text" value="" onfocus="if(this.value=='')this.value=''" onblur="if(this.value=='')this.value=''"/>
                    </div>
                </header>




			<h1 class="site-title"><a href="" title="" ><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->

		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
	</header><!-- #masthead -->

	<div id="main" class="wrapper">