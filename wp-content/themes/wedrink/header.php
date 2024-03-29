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
        <meta charset="<?php bloginfo('charset'); ?>" />
        <!--<meta name="viewport" content="width=device-width" />-->
        <title><?php wp_title('|', true, 'right'); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png" />
        
        <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
        <![endif]-->

        <?php
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-tabs');
        ?>
        <?php wp_head(); ?>
        <script src="<?php echo get_template_directory_uri(); ?>/js/custom.js" type="text/javascript"></script>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.css"/>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery-ui.css"/>

    </head>

    <body <?php body_class(); ?>>
        <header id="masthead" class="site-header" role="banner">
            <!--                <hgroup>
                                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                <h2 class="site-description"><?php bloginfo('description'); ?></h2>
                            </hgroup>-->


            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php
                $header_image = get_header_image();
                if (!empty($header_image)) :
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo"><img src="<?php echo esc_url($header_image); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
                <?php endif; ?>
                <?php wp_nav_menu(array('theme_location' => 'Menu-Header', 'menu_class' => 'nav-menu')); ?>
            </nav><!-- #site-navigation -->


        </header>

        <div class="clr"></div>
        <div id="page" class="hfeed site">

            <!-- #masthead -->

            <div id="main" class="wrapper">

<script type="text/javascript">var subiz_account_id = "1420";(function() { var sbz = document.createElement("script"); sbz.type = "text/javascript"; sbz.async = true; sbz.src = ("https:" == document.location.protocol ? "https://" : "http://") + "widget.subiz.com/static/js/loader.js?v="+ (new Date()).getFullYear() + ("0" + ((new Date()).getMonth() + 1)).slice(-2) + ("0" + (new Date()).getDate()).slice(-2); var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(sbz, s);})();</script>
