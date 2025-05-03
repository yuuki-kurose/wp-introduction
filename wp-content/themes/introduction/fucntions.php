<?php
/**
 * functions.php
 * テーマの設定を読み込む用のphp
 */

/** 各ページごとにcssを読み込む設定 */
function add_link_files() {
  if(is_home()) {
    wp_enqueue_style( 'home', get_stylesheet_directory_uri() . '/assets/css/home.css');
  }
}
add_action( 'wp_enqueue_scripts', 'add_link_files' );
?>