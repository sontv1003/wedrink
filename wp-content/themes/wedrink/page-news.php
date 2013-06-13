<?php
/*
  Template Name: News-Events
 */
get_header();
?>

<div id="pagewrap-news" class="page-content-news">
    <?php
    $args = array(
        'paged' => $paged,
        'post_type' => 'post'
    );
    ?>
    <?php query_posts($args); ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('content', 'page-news'); ?>
    <?php endwhile; // end of the loop. 
    if (function_exists('wp_paginate')) {
    wp_paginate();
    }
    ?>
    <?php wp_reset_query(); ?>
</div><!-- #primary -->
<div class="clr"></div>

<?php get_footer(); ?>