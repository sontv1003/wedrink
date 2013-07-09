<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<div class="page-left-news fl" style="background: <?php the_field('tintuc_sukien_maunen'); ?>;">
    <p class="news-date"><?php _e('Ngày'); ?> <?php the_date(); ?></p>
    <p class="news-title"><a href="<?php echo get_permalink($post_ID);?>"><?php the_title(); ?></a></p>
    <div class="news-content">
        <?php the_excerpt(); ?>
    </div>
</div>
<?php
$img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
$url = $img[0];
?>
<div class="page-middle-news fl" style="background: #fff url('<?php echo $url;?>') no-repeat; background-position: center;">
    <?php // echo get_the_post_thumbnail($post->ID, 'full');
    ?>
</div>
<div class="clr"></div>
