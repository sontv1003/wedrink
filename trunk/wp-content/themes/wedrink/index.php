<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header();
?>
<div class="homewedrink">
    <div class="home_body">
        <p class="home_title_line_1"><?php echo get_custom('home_title_line_1'); ?></p>
        <p class="home_title_line_2"><?php echo get_custom('home_title_line_2'); ?></p>
        <p class="home_title_line_3"><?php echo get_custom('home_title_line_3'); ?></p>
        <div class="business fl">
            <a href="<?php echo trim(get_custom('home_link_shops')); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/images/business.jpg" class="business_img fl"/>
            <span class="business_span fl fo"><?php echo get_custom('home_welcome'); ?></span>
            </a>
        </div>
        <div class="business_des fl">
            <span class="fl fo"><?php echo get_custom('home_description'); ?></span>
        </div>
        <a href="<?php echo trim(get_custom('home_link _products')); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/images/cungthuongthuc.png" class="linkprd fl"/>
        </a>
        <div class="clr"></div>
    </div>
</div>
<?php get_footer(); ?>