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
  // 新規登録ページ
  if(get_query_var('pagename') == 'chat-register') {
      wp_enqueue_style('chat-register', get_stylesheet_directory_uri() . '/assets/css/chat-register.css');
  }
  // chat-signinページ
  if(get_query_var('pagename') == 'chat-signin') {
      wp_enqueue_style('chat-signin', get_stylesheet_directory_uri() . '/assets/css/chat-signin.css');
  }
  // chatページ
  if(get_query_var('pagename') == 'chat') {
      wp_enqueue_style('chat', get_stylesheet_directory_uri() . '/assets/css/chat.css');
  }
}
add_action('wp_enqueue_scripts', 'add_css_link_files');

/**
 * リライトルールの読み込み
 */
add_action('init', function() {
  // 新規登録ページ
  add_rewrite_rule('^chat-register/?$', 'index.php?pagename=chat-register', 'top');
  // ログインページ
  add_rewrite_rule('^chat-signin/?$', 'index.php?pagename=chat-signin', 'top');
  // chatページ
  add_rewrite_rule('^chat/?$', 'index.php?pagename=chat', 'top');
});

/**
 * カスタムテンプレート読み込み
 */
function load_custom_template($template) {
  // 新規登録ページ
  if(get_query_var('pagename') == 'chat-register') {
    return get_template_directory() . '/chat-register.php';
  }
  // ログインページ
  if(get_query_var('pagename') == 'chat-signin') {
    return get_template_directory() . '/chat-signin.php';
  }
  // chatページ
  if(get_query_var('pagename') == 'chat') {
    return get_template_directory() . '/chat.php';
  }
  return $template;
}
add_filter('template_include', 'load_custom_template');

/**
 * クエリ変数の登録
 */
function add_query_vars($query_vars) {
  $query_vars[] = 'pagename';
  return $query_vars;
}
add_filter('query_vars', 'add_query_vars');
?>