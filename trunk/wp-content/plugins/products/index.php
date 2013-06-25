<?php

/*
  Plugin Name:  QQ_San_Pham
  Plugin URI: http://cyasoft.com
  Description: http://cyasoft.com
  Author: Tim http://cyasoft.com
  Author URI: http://cyasoft.com
  Version: 0.0.0.1
 */

require_once ('mywidgets.php');

//require_once ABSPATH. '/wp-content/plugins/sanpham/mywidgets.php';
function QQ_product() {
    register_post_type(
            "orders", array(
        'labels' => array(
            'add_new' => 'Add New',
            'name' => __('Orders'),
            'singular_name' => __("Orders"),
            'all_items' => __("All Order"),
            'add_new_item' => __("Add News"),
            'edit_item' => __("Edit")),
        'public' => true,
        'show_ui' => true,
        'hierarchical' => true,
        'supports' => array('title','custom-fields'))
    );
    
    register_post_type(
            "products", array(
        'labels' => array(
            'add_new' => 'Add News Product',
            'name' => __('WeDrink'),
            'singular_name' => __('WeDrink'),
            'all_items' => __("All Product"),
            'add_new_item' => __("Add News Product"),
            'edit_item' => __("Edit")),
        'public' => true,
        'show_ui' => true,
        'rewrite' => array(
            'slug'=> 'san-pham'
        ),
        'hierarchical' => true,
        'supports' => array('title', 'comments', 'editor', 'author', 'excerpt', 'thumbnail', 'custom-fields', 'trackbacks', 'revisions', 'page-attributes', 'post-formats'),)
    );

    register_taxonomy('products_cat', 'products', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => 'Category',
            'add_new_item' => 'Thêm mới',
            'edit_item' => 'Sửa'
        ),
        'rewrite' => array(
            'slug'=> 'san-pham'
        )
    ));
    register_taxonomy('products_effects', 'products', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => 'Tác dụng',
            'add_new_item' => 'Thêm mới',
            'edit_item' => 'Sửa'
        ),
        'rewrite' => array(
            'slug'=> 'tac-dung'
        )
    ));
}

add_action('init', 'QQ_product');
?>