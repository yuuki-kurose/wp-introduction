<?php
/**
 * functions.php
 * テーマの設定を読み込む用のphp
 */

/**
 * 各ページごとにcssを読み込む設定
 */
function add_css_link_files() {
  // homeページ
  if(is_home()) {
    wp_enqueue_style('home', get_stylesheet_directory_uri() . '/assets/css/home.css');
  }
  // chatページ
  if(get_query_var('pagename') == 'chat') {
      wp_enqueue_style('chat', get_stylesheet_directory_uri() . '/assets/css/chat.css');
  }
}
add_action('wp_enqueue_scripts', 'add_css_link_files');

/**
 * カスタムテンプレートリライトルール設定
 */
function add_rewrite_rules() {
  // chatページ
  add_rewrite_rule('chat/?$', 'index.php?pagename=chat', 'top');
}
add_action('init', 'add_rewrite_rules');

/**
 * カスタムテンプレート読み込み
 */
function load_chat_template($template) {
  // chatページ
  if(get_query_var('pagename') == 'chat') {
    return locate_template('chat.php');
  }
  return $template;
}
add_filter('template_include', 'load_chat_template');

/**
 * クエリ変数の登録
 */
function add_query_vars($query_vars) {
  $query_vars[] = 'pagename';
  return $query_vars;
}
add_filter('query_vars', 'add_query_vars');
?>