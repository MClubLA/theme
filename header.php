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
        <meta description="<?php bloginfo( 'description' ); ?>" />
        <title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css"/>
        
		<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
        <![endif]-->
        
        <?php // TODO ::: MODIFY JS LOADS ?>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery/jquery-scrolltofixed-min.js"></script>
        
        <script type="text/javascript">
			$(document).ready(function() {
				$('header').scrollToFixed();
			});
		</script>
        <!-- Plugin and other dynamic header content -->
        <?php //wp_head(); ?>
    </head>


    <body <?php //body_class(); ?>>
        <div class="outer-wrapper">
            <div class="wrapper">
                <header class="header">
                    <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.jpg" rel="home" alt="img"></a>
                    <!--big nav-->
                    <nav class="navigation" role="navigation">
                    <?php wp_nav_menu( array() ); ?>
                    </nav>
                    <!--mobile navigation-->
                    <nav class="nav" role="navigation">
                    	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav', 'container' => 'nav' ) ); ?>
                    </nav>
                    <!---->
                    <div class="search">
                        <input class="submitbtn" type="submit" value=""/>
                        <input class="textbx" type="text" value="" onfocus="if(this.value=='')this.value=''" onblur="if(this.value=='')this.value=''"/>
                    </div>
                </header>
                <!-- REMOVE : end of header.php -->