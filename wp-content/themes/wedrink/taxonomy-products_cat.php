<?php
get_header();
global $wp_query;
$tag = $wp_query->get_queried_object();
?>
<div id="pagewrap" class="page-content">
    <div class="page-left fl">
        <?php if (is_active_sidebar('sidebar-1')) : ?>
            <?php dynamic_sidebar('sidebar-1'); ?>
        <?php endif; ?>
    </div>
    <div class="page-middle">
        <div>
            <?php echo get_field('wdrink_category_head', 'products_cat_' . $tag->term_id); ?>
        </div>
        <nav id="secondary-nav" role="navigation">
            <?php wp_nav_menu(array('theme_location' => 'Menu-Products', 'menu_class' => '')); ?>
        </nav>
        <article>
            <section id="juices-list">
                <h1 id="all-juices">All Juices</h1>
                <div class="<?php echo $tag->slug; ?>">
                    <h2 style="background: url('<?php echo get_field('wdrink_category_background', 'products_cat_' . $tag->term_id); ?>') no-repeat; width: 100px; height: 30px;line-height: 30px;"><span><?php echo $tag->name; ?></span></h2>
                    <ul class="grid">
                        <?php
                        $args = array(
                            'numberposts' => -1,
                            'post_type' => 'products',
                            'tax_query' => array(array(
                                    'taxonomy' => 'products_cat',
                                    'field' => 'id',
                                    'terms' => $tag->term_id
                            )));
                        $prds = get_posts($args);
                        ?>
                        <?php foreach ($prds as $prd) { ?>
                            <li class="product">
                                <div class="thumb">
                                    <a href="<?php echo get_permalink($prd->ID); ?>"><?php echo get_the_post_thumbnail($prd->ID, 'medium', array('title' => $prd->post_title)); ?></a>
                                </div>
                                <div class="description">
                                    <p><a style="color: <?php echo get_field('wdrink_category_text_color', 'products_cat_' . $tag->term_id); ?>;" href="<?php echo get_permalink($prd->ID); ?>"><?php echo $prd->post_title; ?></a></p>
                                </div>
                                <div class="description">
                                    <p class="price" style="color: <?php echo get_field('wdrink_category_text_color', 'products_cat_' . $item->term_id); ?>;"><?php  if( get_field('product_gia_500', $prd->ID)!='' ) {echo number_format(get_field('product_gia_500', $prd->ID)).get_custom('product_unit');} ?></p>
                                </div>
                            </li>
                        <?php } ?>
                        <?php wp_reset_query(); ?>
                    </ul>
                </div>
                <div class="clr"></div>
                <?php
                if ($count > 0) {
                    ?>
                    <div class="hr"></div>
                <?php } ?>
            </section>
        </article>
    </div>
</div><!-- #primary -->

<?php get_footer(); ?>