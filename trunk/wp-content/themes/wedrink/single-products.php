<?php
if (isset($_POST['submit'])) {
    $sanpham = $_POST['sanpham'];
    $urlprd = $_POST['link'];
    $soluong = $_POST['soluong'];
    $thetich = $_POST['thetich'];
    $diachi = $_POST['diachi'];
    $hoten = $_POST['hoten'];
    $dienthoai = $_POST['dienthoai'];
    $ghichu = $_POST['ghichu'];
    $title = $dienthoai . " - " . $hoten;
    $link = '<a href="' . $urlprd . '">' . $sanpham . '</a>';
    $defaults = array(
        'post_status' => 'publish',
        'post_type' => 'orders',
        'post_title' => wp_strip_all_tags($title),
        'post_content' => $cten
    );
    $postid = wp_insert_post($defaults);
    if ($postid) {
        add_post_meta($postid, 'orders_link', $link);
        add_post_meta($postid, 'orders_soluong', $soluong);
        add_post_meta($postid, 'orders_thetich', $thetich);
        add_post_meta($postid, 'orders_diachinhanhang', $diachi);
        add_post_meta($postid, 'orders_ghichu', $ghichu);
        add_post_meta($postid, 'orders_anhsanpham', get_the_post_thumbnail($post->ID, array(100, 100)));
        $mess = '<script type="text/javascript">alert("Chúng tôi đã nhận được yêu cầu và sẽ sớm liên hệ với bạn!");</script>';
    } else {
        $mess = '<script type="text/javascript">alert("Quá trình xử lý đã gặp lỗi, bạn hãy thử lại");</script>';
    }
}

/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header();
$tags = wp_get_object_terms($post->ID, 'products_cat');
$cat = $tags[0];
$index = rand(0, count($tags) - 1);
$tag = $tags[$index];

if (isset($_POST['submit'])) {
    echo $mess;
}
?>
<div id="pagewrap" class="page-content">
    <div class="page-left fl">
        <?php if (is_active_sidebar('sidebar-1')) : ?>
            <?php dynamic_sidebar('sidebar-1'); ?>
        <?php endif; ?>
    </div>
    <?php while (have_posts()) : the_post(); ?>
        <div class="page-middle">
            <div style="height: 50px;"></div>
            <h2 style="color: #fff; margin-left: 15px; background: url('<?php echo get_field('wdrink_category_background', 'products_cat_' . $cat->term_id); ?>') no-repeat; width: 100px; height: 30px;line-height: 30px; clear: none;"><span class="fo"><?php echo $cat->name; ?></span></h2>
            <h1 class="fo" style="color: <?php echo get_field('wdrink_category_text_color', 'products_cat_' . $cat->term_id); ?>;"><?php the_title(); ?></h1>
            <div class="fl thumprd">
                <?php echo get_the_post_thumbnail($post->ID, array(600, 600), array('title' => $post->post_title)); ?>
            </div>
            <div class="fr infoprd">
                <div class="descriptionprd">
                    <?php the_excerpt(); ?>
                </div>
                <div class="singleprice" style="color: <?php echo get_field('wdrink_category_text_color', 'products_cat_' . $cat->term_id); ?>;">
                    <?php echo get_field('product_gia', $post->ID); ?>
                </div>
                <div class="orderprd">
                    <table >
                        <tr>
                            <td><label for="soluong0"><?php _e('SỐ LƯỢNG'); ?></label></td>
                            <td><input id="soluong0" name="soluong0" type="text" value="<?php echo $soluong; ?>" size="10"></td>
                        </tr>
                        <tr>
                            <td><label for="thetich0"><?php _e('THỂ TÍCH'); ?></td>
                            <td>
                                <select name="thetich0" id="thetich0" >
                                    <option value="0.25 Lit">0.25 Lít</option>
                                    <option value="0.5 Lit">0.5 Lít</option>
                                    <option value="1 Lit">1 Lít</option>
                                    <option value="1.5 Lit">1.5 Lít</option>

                                </select>
                            </td>
                        </tr>
                    </table>
                    <div class="aaa">
                        <input type="button" name="order" value="<?php _e('MUA HÀNG'); ?>" class="btorder" id="btorder">
                        <div class="orderright fr">
                            <p class="orderright_1"><?php _e('WEDRINK GIAO HÀNG TẬN NƠI'); ?></p>
                            <p class="orderright_2">
                                <span class="orderhotline_t"><?php _e('HOTLINE: '); ?></span><span class="orderhotline_n"><?php echo get_custom('product_hotline'); ?></span>
                                <a href="<?php echo get_custom('product_shipping_detail'); ?>" class="orderright_link"><?php _e('Xem chi tiết vận chuyển'); ?></a>
                            </p>
                        </div>
                    </div>

                    <div class="wrappop">
                    </div>
                    <div class="popupprd">
                        <span class="close fr">X</span>
                        <div class="clr"></div>
                        <form id="frmorder" name="frmorder" action="" method="post" >
                            <input type="hidden" name="link" value="<?php echo get_permalink($post->ID); ?>" />							
                            <p class="message"></p>
                            <table style="margin-top: 15px;">
                                <tr>
                                    <td><label for="sanpham"><?php _e('Tên sản phẩm'); ?>&nbsp;<span class="sp_error">*</span></label></td>
                                    <td><input id="sanpham" name="sanpham" type="text" value="<?php echo $post->post_title; ?>" size="43"></td>
                                </tr>
                                <tr>
                                    <td><label for="soluong"><?php _e('Số lượng'); ?>&nbsp;<span class="sp_error">*</span></label></td>
                                    <td><input id="soluong" name="soluong" type="text" value="<?php echo $soluong; ?>" size="30" class="required"></td>
                                </tr>
                                <tr>
                                    <td><label for="thetich"><?php _e('Thể tích'); ?>&nbsp;<span class="sp_error">*</span></label></td>
                                    <td><input id="thetich" name="thetich" type="text" value="<?php echo $thetich; ?>" size="30" class="required"></td>
                                </tr>
                                <tr>
                                    <td><label for="hoten"><?php _e('Họ và tên'); ?>&nbsp;<span class="sp_error">*</span></label></td>
                                    <td><input id="hoten" name="hoten" type="text" value="<?php echo $hoten; ?>" size="30" class="required"></td>
                                </tr>
                                <tr>
                                    <td><label for="dienthoai"><?php _e('Điện thoại'); ?>&nbsp;<span class="sp_error">*</span></span></td>
                                    <td><input id="dienthoai" name="dienthoai" type="text" value="<?php echo $dienthoai; ?>" size="30" class="required"></td>
                                </tr>
                                <tr>
                                    <td><label for="diachi"><?php _e('Đ/c nhận hàng'); ?>&nbsp;<span class="sp_error">*</span></td>
                                    <td><input id="diachi" name="diachi" type="text" value="<?php echo $diachi; ?>" size="30" class="required"></td>
                                </tr>
                                <tr>
                                    <td><label for="ghichu"><?php _e('Ghi chú'); ?></td>
                                    <td><textarea cols="26" name="ghichu" id="ghichu"><?php echo $ghichu; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input id="ordersubmit" type="submit" name="submit" value="<?php _e('GỬI THÔNG TIN'); ?>"/></td>
                                </tr>
                            </table>

                        </form>
                    </div>

                </div>
                <div class="socialprd">
                    <?php echo do_shortcode('[social_share]') ?>
                </div>
                <div id="tabs">
                    <ul>
                        <li><a href="#tabs-1"><?php _e('DINH DƯỠNG'); ?></a></li>
                        <li><a href="#tabs-2"><?php _e('BÌNH LUẬN'); ?></a></li>
                    </ul>
                    <div id="tabs-1">
                        <?php the_content(); ?>
                    </div>
                    <div id="tabs-2">
                        <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id))
                                    return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=542409615782070";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>

                        <fb:comments href="<?php echo get_permalink(); ?>" width="550" num_posts="10"></fb:comments>
    <?php //comments_template('', true);  ?>
                    </div>
                </div>
            </div>
            <div class="clr"></div>

            <?php
            $args = array(
                'numberposts' => 4,
                'orderby' => 'rand',
                'post_type' => 'products',
                'tax_query' => array(array(
                        'taxonomy' => 'products_cat',
                        'field' => 'id',
                        'terms' => $tag->term_id
            )));
            $prds = get_posts($args);
            ?>
            <aside id="related-products">
                <h2><span class="fo"><?php _e('Sản phẩm liên quan'); ?></span></h2>
                <ul class="grid">
    <?php foreach ($prds as $prd) { ?>
                        <li class="product">
                            <div class="thumb">
                                <a href="<?php echo get_permalink($prd->ID); ?>"><?php echo get_the_post_thumbnail($prd->ID, 'medium', array('title' => $prd->post_title)); ?></a>
                            </div>
                            <div class="description">
                                <p><a href="<?php echo get_permalink($prd->ID); ?>"><?php echo $prd->post_title; ?></a></p>
                            </div>
                        </li>
    <?php } ?>
    <?php wp_reset_query(); ?>
                </ul>
            </aside>
        </div>
<?php endwhile; // end of the loop.  ?>
</div>


<?php get_footer(); ?>