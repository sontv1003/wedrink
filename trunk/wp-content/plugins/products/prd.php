<?php
### Load WP-Config File If This File Is Called Directly
if (!function_exists('add_action')) {
    $wp_root = '../../..';
    if (file_exists($wp_root . '/wp-load.php')) {
        require_once($wp_root . '/wp-load.php');
    } else {
        require_once($wp_root . '/wp-config.php');
    }
}
$first_id = $_POST['id'];
$key = $_POST['key'];
switch($key){
    case 'gt':
        $key = 'oto_gioi_thieu';
        break;
    case 'kd':
        $key = 'oto_kieu_dang';
        break;
    case 'at':
        $key = 'oto_an_toan';
        break;
    case 'ts':
        $key = 'oto_thong_so_ky_thuat';
        break;
    case 'nt':
        $key = 'oto_noi_that';
        break;
    case 'tn':
        $key = 'oto_tinh_nang_hoat_dong';
        break;
}
the_field($key, $first_id);
?>