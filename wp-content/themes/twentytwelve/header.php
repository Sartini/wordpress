<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
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
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>

<!-- Configuracao do backbone e plugins -->

<?php 
        //Carrega Libs e Frameworks JS
        loadJS("
            js/vendors/jquery;
            js/vendors/underscore;
            js/vendors/backbone;
            js/vendors/modernizr
        ");

        //Carrega estilos compartilhados CSS
        loadCSS("
            style; 
            css/reset; 
            css/shared
        ");
    ?>

    <?php  
        //Carrega plugin Validate
        loadJS("
            js/plugins/validate/jquery.validate.min;
            js/plugins/validate/additional-methods
        ");
    ?>

    <?php  
        //Carrega plugin Fancybox, suas dependências e helpers
        loadJS("
            js/vendors/jquery.mousewheel-3.0.6.pack;
            js/plugins/fancybox/jquery.fancybox.pack;
            js/plugins/fancybox/helpers/jquery.fancybox-buttons;
            js/plugins/fancybox/helpers/jquery.fancybox-media;
            js/plugins/fancybox/helpers/jquery.fancybox-thumbs
        ");

        loadCSS("
            css/plugins/fancybox/jquery.fancybox;
            css/plugins/fancybox/helpers/jquery.fancybox-buttons;
            css/plugins/fancybox/helpers/jquery.fancybox-thumbs
        ");
    ?>

    <?php  
        //Carrega plugin checkbox
        loadJS("
            js/plugins/checkbox/zebra_transform
        ");

        loadCSS("
            css/plugins/checkbox/zebra_transform
        ");
    ?>

    <?php 
        //Carrega JS de inicialização da app
        loadJS("
            js/routes/app;
            js/views/app;
            js/views/page;
            js/vieww/home
        ");
    ?>


<!-- Fim configuracao backbone e plugins -->
 

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
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