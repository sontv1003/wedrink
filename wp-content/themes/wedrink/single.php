<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header();
?>
<div id="pagewrap-news" class="page-content-news">
    <?php while (have_posts()) : the_post(); ?>
        <div class="page-left-news fl single" style="background: <?php the_field('tintuc_sukien_maunen'); ?>;">
            <p class="news-date"><?php _e('Ngày'); ?> <?php the_date(); ?></p>
            <p class="news-title"><?php the_title(); ?></p>
            <div class="news-content">
                <?php the_content(); ?>
            </div>
        </div>
        <?php
        $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
        $url = $img[0];
        ?>
        <div class="page-middle-news fl single" style="background: #fff url('<?php echo $url; ?>') no-repeat; background-position: center;">
            <?php // echo get_the_post_thumbnail($post->ID, 'full');
            ?>
        </div>
        <div class="clr"></div>
    <?php endwhile; // end of the loop.   ?>
</div><!-- #primary -->
<div class="clr"></div>
<?php get_footer(); ?>