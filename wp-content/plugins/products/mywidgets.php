<?php

class Wedrink_tacdung_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'Wedrink_tacdung_Widget', // Base ID
                'Wedrink_tacdung_Widget', // Name
                array('description' => 'Tác dụng Widget')
        );
    }

    public function widget($args, $instance) {
        if (!empty($instance['title'])) {
            $t = $instance['title'];
        } else {
            $t = '';
        }
        get_Wedrink_tacdung_Widget($t);
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    public function form($instance) {
        if (empty($instance['title'])) {
            $title = '';
        } else {
            $title = $instance['title'];
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <?php
    }

}

add_action('widgets_init', create_function('', 'register_widget( "Wedrink_tacdung_Widget" );'));

function get_Wedrink_tacdung_Widget($t) {
    ?>
        <h3 class="widget-title"><?php echo $t;?></h3>
            <?php wp_nav_menu(array('theme_location' => 'Menu-Left', 'menu_class' => 'mnl')); ?>
    <?php
}