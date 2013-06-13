<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
</div><!-- #main .wrapper -->

</div><!-- #page -->
<div class="clr"></div>
<footer id="colophon" role="contentinfo">
    <nav id="footer-navigation" class="footer-navigation footer_a fl" role="navigation">
        <?php wp_nav_menu(array('theme_location' => 'Menu-Bottom-Left-3', 'menu_class' => 'nav-l-menu fr')); ?>
        <?php wp_nav_menu(array('theme_location' => 'Menu-Bottom-Left-2', 'menu_class' => 'nav-l-menu fr')); ?>
        <?php wp_nav_menu(array('theme_location' => 'Menu-Bottom-Left-1', 'menu_class' => 'nav-l-menu fr')); ?>
    </nav><!-- #site-navigation -->
    <div class="footer_b fr">
        <?php wp_nav_menu(array('theme_location' => 'Menu-Bottom-Right', 'menu_class' => 'nav-r-menu fl')); ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_fb.jpg" class="fl footer_fb_icon" />
    </div>
</footer><!-- #colophon -->
<?php wp_footer(); ?>
</body>
</html>