<?php

class OTO_QUANG_CAO_TRANGCHU_PHAI_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'OTO_QUANG_CAO_TRANGCHU_PHAI_Widget', // Base ID
                'OTO_QUANG_CAO_TRANGCHU_PHAI_Widget', // Name
                array('description' => 'QUẢNG CÁO TRANG CHỦ PHẢI Widget')
        );
    }

    public function widget($args, $instance) {
        if (!empty($instance['title'])) {
            $t = $instance['title'];
        } else {
            $t = '';
        }

        if (!empty($instance['number'])) {
            $n = $instance['number'];
        } else {
            $n = 5;
        }
        get_OTO_QUANG_CAO_PHAI_Widget($t, $n);
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        return $instance;
    }

    public function form($instance) {
        if (empty($instance['title'])) {
            $title = '';
        } else {
            $title = $instance['title'];
        }
        if (empty($instance['number'])) {
            $number = 5;
        } else {
            $number = $instance['number'];
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of posts to show:', 'ossthemes'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" />

        </p>
        <?php
    }

}

add_action('widgets_init', create_function('', 'register_widget( "OTO_QUANG_CAO_TRANGCHU_PHAI_Widget" );'));

function get_OTO_QUANG_CAO_PHAI_Widget($t, $n) {
    ?>
    <div class="widget">
        <?php if (!empty($t)) { ?>
            <h4 class="widget-title"><?php echo __($t); ?></h4>
        <?php } ?>
        <div class="widget-content">
            <?php
            $args = array(
                'numberposts' => $n,
                'category' => '',
                'orderby' => 'menu_order',
                'order' => 'DESC',
                'include' => '',
                'exclude' => '',
                'meta_key' => 'diachi_hien_thi_trang_chu',
                'meta_value' => 1,
                'post_type' => 'diachi',
                'post_mime_type' => '',
                'post_parent' => '',
                'post_status' => 'publish',
                'suppress_filters' => true);
            $items = get_posts($args);
            ?>
            <?php if (count($items) > 0) foreach ($items as $item) { ?>
                    <div class="diachi_widgets">
                        <p class="diachi_title">
                            <?php echo $item->post_title; ?>
                        </p>
                        <div class="diachi_content">
                            <?php echo $item->post_content; ?>
                        </div>
                    </div>
                <?php } ?>
        </div>
    </div>
    <div class="clr"></div>
    <?php
}

class OTO_TIN_MOI_NHAT_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'OTO_TIN_MOI_NHAT_Widget', // Base ID
                'OTO_TIN_MOI_NHAT_Widget', // Name
                array('description' => 'TIN TỨC MỚI NHẤT Widget')
        );
    }

    public function widget($args, $instance) {
        if (!empty($instance['title'])) {
            $t = $instance['title'];
        } else {
            $t = '';
        }

        if (!empty($instance['number'])) {
            $n = $instance['number'];
        } else {
            $n = 5;
        }
        get_OTO_TIN_MOI_NHAT_Widget($t, $n);
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        return $instance;
    }

    public function form($instance) {
        if (empty($instance['title'])) {
            $title = '';
        } else {
            $title = $instance['title'];
        }
        if (empty($instance['number'])) {
            $number = 5;
        } else {
            $number = $instance['number'];
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of posts to show:', 'ossthemes'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" />

        </p>
        <?php
    }

}

add_action('widgets_init', create_function('', 'register_widget( "OTO_TIN_MOI_NHAT_Widget" );'));

function get_OTO_TIN_MOI_NHAT_Widget($t, $n) {
    if (!is_home()) {
        return '';
    }
    ?>
    <div class="widget-news">
        <?php if (!empty($t)) { ?>
            <h4 class="widget-title"><?php echo __($t); ?></h4>
        <?php } ?>
        <div class="widget-content">
            <?php
            $args = array(
                'numberposts' => $n,
                'category' => '',
                'orderby' => '',
                'order' => 'ASC',
                'include' => '',
                'exclude' => '',
                'meta_key' => '',
                'meta_value' => '',
                'post_type' => 'tinmoinhat',
                'post_mime_type' => '',
                'post_parent' => '',
                'post_status' => 'publish',
                'suppress_filters' => true);
            $items = get_posts($args);
            ?>
            <?php if (count($items) > 0) foreach ($items as $item) { ?>
                    <?php $url = wp_get_attachment_url(get_post_thumbnail_id($item->ID)); ?>
                    <div class="clr"></div>        
                    <div class="tinmoinhat_widgets">
                        <img src="<?php echo $url; ?>" class="tinmoinhat_url"/>
                        <div class="tinmoinhat_description">
                            <a class="tinmoinhat_title" href="<?php echo get_permalink($item->ID); ?>"><?php echo $item->post_title; ?></a>
                            <?php the_field('tinmoinhat_mo_ta_ngan_gon', $item->ID); ?>
                        </div>
                    </div>
                    <div class="clr"></div>
                <?php } ?>
        </div>
    </div>
    <div class="clr"></div>
    <?php
}

class OTO_NGUOI_DEP_VA_XE_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'OTO_NGUOI_DEP_VA_XE_Widget', // Base ID
                'OTO_NGUOI_DEP_VA_XE_Widget', // Name
                array('description' => 'NGƯỜI ĐẸP VÀ XE Widget')
        );
    }

    public function widget($args, $instance) {
        if (!empty($instance['title'])) {
            $t = $instance['title'];
        } else {
            $t = '';
        }

        if (!empty($instance['number'])) {
            $n = $instance['number'];
        } else {
            $n = 5;
        }
        get_OTO_NGUOI_DEP_VA_XE_Widget($t, $n);
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        return $instance;
    }

    public function form($instance) {
        if (empty($instance['title'])) {
            $title = '';
        } else {
            $title = $instance['title'];
        }
        if (empty($instance['number'])) {
            $number = 5;
        } else {
            $number = $instance['number'];
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of posts to show:', 'ossthemes'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" />

        </p>
        <?php
    }

}

add_action('widgets_init', create_function('', 'register_widget( "OTO_NGUOI_DEP_VA_XE_Widget" );'));

function get_OTO_NGUOI_DEP_VA_XE_Widget($t, $n) {
    if (!is_home()) {
        return '';
    }
    ?>
    <div class="widget-news">
        <?php if (!empty($t)) { ?>
            <h4 class="widget-title"><?php echo __($t); ?></h4>
        <?php } ?>
        <div class="widget-content">
            <?php
            $args = array(
                'numberposts' => $n,
                'category' => '',
                'orderby' => '',
                'order' => 'ASC',
                'include' => '',
                'exclude' => '',
                'meta_key' => '',
                'meta_value' => '',
                'post_type' => 'nguoidepvaxe',
                'post_mime_type' => '',
                'post_parent' => '',
                'post_status' => 'publish',
                'suppress_filters' => true);
            $items = get_posts($args);
            ?>
            <?php if (count($items) > 0) foreach ($items as $item) { ?>
                    <?php $url = wp_get_attachment_url(get_post_thumbnail_id($item->ID)); ?>
                    <div class="clr"></div>        
                    <div class="tinmoinhat_widgets">
                        <img src="<?php echo $url; ?>" class="tinmoinhat_url"/>
                        <div class="tinmoinhat_description">
                            <a class="tinmoinhat_title" href="<?php echo get_permalink($item->ID); ?>"><?php echo $item->post_title; ?></a>
                            <?php the_field('nguoidepvaxe_mo_ta_ngan_gon', $item->ID); ?>
                        </div>
                    </div>
                    <div class="clr"></div>
                <?php } ?>
        </div>
    </div>
    <div class="clr"></div>
    <?php
}

class OTO_QUANG_CAO_TRANGCHU_TOP_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'OTO_QUANG_CAO_TRANGCHU_TOP_Widget', // Base ID
                'OTO_QUANG_CAO_TRANGCHU_TOP_Widget', // Name
                array('description' => 'QUẢNG CÁO TRANG CHỦ TOP Widget')
        );
    }

    public function widget($args, $instance) {
        if (!empty($instance['title'])) {
            $t = $instance['title'];
        } else {
            $t = '';
        }

        if (!empty($instance['number'])) {
            $n = $instance['number'];
        } else {
            $n = 5;
        }
        get_OTO_QUANG_CAO_TOP_Widget($t, $n);
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        return $instance;
    }

    public function form($instance) {
        if (empty($instance['title'])) {
            $title = '';
        } else {
            $title = $instance['title'];
        }
        if (empty($instance['number'])) {
            $number = 5;
        } else {
            $number = $instance['number'];
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of posts to show:', 'ossthemes'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" />

        </p>
        <?php
    }

}

add_action('widgets_init', create_function('', 'register_widget( "OTO_QUANG_CAO_TRANGCHU_TOP_Widget" );'));

function get_OTO_QUANG_CAO_TOP_Widget($t, $n) {
    ?>
    <div class="widget">
        <?php if (!empty($t)) { ?>
            <h4 class="widget-title"><?php echo __($t); ?></h4>
        <?php } ?>
        <div class="widget-content">
            <?php
            $args = array(
                'numberposts' => $n,
                'category' => '',
                'orderby' => 'menu_order',
                'order' => 'DESC',
                'include' => '',
                'exclude' => '',
                'meta_key' => 'diachi_hien_thi_trang_chu_top',
                'meta_value' => 1,
                'post_type' => 'diachi',
                'post_mime_type' => '',
                'post_parent' => '',
                'post_status' => 'publish',
                'suppress_filters' => true);
            $items = get_posts($args);
            ?>
            <?php if (count($items) > 0) foreach ($items as $item) { ?>
                    <div class="diachi_widgets">
                        <p class="diachi_title">
                            <?php echo $item->post_title; ?>
                        </p>
                        <div class="diachi_content">
                            <?php echo $item->post_content; ?>
                        </div>
                    </div>
                <?php } ?>
        </div>
    </div>
    <div class="clr"></div>
    <?php
}

class OTO_QUANG_CAO_HANGXE_TOP_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'OTO_QUANG_CAO_HANGXE_TOP_Widget', // Base ID
                'OTO_QUANG_CAO_HANGXE_TOP_Widget', // Name
                array('description' => 'QUẢNG CÁO HÃNG XE TOP Widget')
        );
    }

    public function widget($args, $instance) {
        if (!empty($instance['title'])) {
            $t = $instance['title'];
        } else {
            $t = '';
        }

        if (!empty($instance['number'])) {
            $n = $instance['number'];
        } else {
            $n = 5;
        }
        get_OTO_QUANG_CAO_HANGXE_TOP_Widget($t, $n);
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        return $instance;
    }

    public function form($instance) {
        if (empty($instance['title'])) {
            $title = '';
        } else {
            $title = $instance['title'];
        }
        if (empty($instance['number'])) {
            $number = 5;
        } else {
            $number = $instance['number'];
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of posts to show:', 'ossthemes'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" />

        </p>
        <?php
    }

}

add_action('widgets_init', create_function('', 'register_widget( "OTO_QUANG_CAO_HANGXE_TOP_Widget" );'));

function get_OTO_QUANG_CAO_HANGXE_TOP_Widget($t, $n) {
    global $wp_query, $mien;
    $tag = $wp_query->get_queried_object();
    $args = array(
        'numberposts' => $n,
        'category' => '',
        'orderby' => 'menu_order',
        'order' => 'DESC',
        'include' => '',
        'tax_query' => array(
            array(
                'taxonomy' => 'oto_cat',
                'field' => 'id',
                'terms' => $tag->term_id
            ),
            array(
                'taxonomy' => 'oto_mien',
                'field' => 'slug',
                'terms' => $mien
            )
        ),
        'exclude' => '',
        'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'diachi',
        'post_mime_type' => '',
        'post_parent' => '',
        'post_status' => 'publish',
        'suppress_filters' => true);
    $items = get_posts($args);
    if (!count($items)) {
        return '';
    }
    ?>
    <div class="widget">
        <?php if (!empty($t)) { ?>
            <h4 class="widget-title"><?php echo __($t); ?></h4>
        <?php } ?>
        <div class="widget-content">
            <?php
            ?>
            <?php if (count($items) > 0) foreach ($items as $item) { ?>
                    <div class="diachi_widgets">
                        <p class="diachi_title">
                            <?php echo $item->post_title; ?>
                        </p>
                        <div class="diachi_content">
                            <?php echo $item->post_content; ?>
                        </div>
                    </div>
                <?php } ?>
        </div>
    </div>
    <div class="clr"></div>
    <?php
}