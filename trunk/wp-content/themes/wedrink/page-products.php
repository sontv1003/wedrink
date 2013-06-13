<?php
/*
  Template Name: Products
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
        <div>
            <?php while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; // end of the loop. ?>
        </div>
        <nav id="secondary-nav" role="navigation">
            <?php wp_nav_menu(array('theme_location' => 'Menu-Products', 'menu_class' => '')); ?>
        </nav>
        <?php
        $taxonomy = 'products_cat';
        $tax_terms = get_terms($taxonomy);
        $count = count($tax_terms);
        ?>
        <article>
            <section id="juices-list">
                <h1 id="all-juices">All Juices</h1>
                <?php foreach ($tax_terms as $item): ?>
                    <?php $count--; ?>
                    <div class="<?php echo $item->slug; ?>">
                        <h2 style="background: url('<?php echo get_field('wdrink_category_background', 'products_cat_' . $item->term_id); ?>') no-repeat; width: 100px; height: 30px;line-height: 30px;"><span><?php echo $item->name;?></span></h2>
                        <ul class="grid">
                            <?php
                            $args = array(
                                'numberposts' => 8,
                                'post_type' => 'products',
                                'tax_query' => array(array(
                                        'taxonomy' => 'products_cat',
                                        'field' => 'id',
                                        'terms' => $item->term_id
                                )));
                            $prds = get_posts($args);
                            ?>
                            <?php foreach ($prds as $prd) { ?>
                                <li class="product">
                                    <div class="thumb">
                                        <?php echo get_the_post_thumbnail( $prd->ID, 'medium', array('title'=>$prd->post_title) ); ?>
                                    </div>
                                    <div class="description">
                                        <p><a style="color: <?php echo get_field('wdrink_category_text_color', 'products_cat_' . $item->term_id); ?>;" href="<?php echo get_permalink($prd->ID);?>"><?php echo $prd->post_title; ?></a></p>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php wp_reset_query(); ?>
                        </ul>
                    </div>
                    <p class="xemnhieuhon" style="text-align: right;height: 30px;">
                        <a href="<?php echo get_term_link($item->slug, 'products_cat'); ?>">
                            <?php _e('Xem nhiều hơn'); ?>
                        </a>
                    </p>
                    <div class="clr"></div>
                    <?php
                    if ($count > 0) {
                        ;
                        ?>
                        <div class="hr"></div>
                    <?php } ?>
                <?php endforeach; ?>
            </section>
        </article>
    </div>
</div><!-- #primary -->

<?php get_footer(); ?>