<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header();
?>

<div id="pagewrap" class="page-content">
    <div class="page-left fl">
        <?php if (is_active_sidebar('sidebar-1')) : ?>
            <?php dynamic_sidebar('sidebar-1'); ?>
        <?php endif; ?>
    </div>
    <div class="page-middle">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('content', 'page'); ?>
        <?php endwhile; // end of the loop. ?>
    </div>
</div><!-- #primary -->

<?php get_footer(); ?>