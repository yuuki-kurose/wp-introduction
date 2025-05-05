<?php
/**
 * Plugin Name: Plugin Chat
 */
add_action('wp_ajax_chatgpt_request', 'handle_chatgpt_request');
add_action('wp_ajax_nopriv_chatgpt_request', 'handle_chatgpt_request');

// リクエストの確認
function handle_chatgpt_request() {
  // admin-ajax.phpからのリクエスト
  $message = $_POST['user_message'];
  if(empty($message)) {
    // メッセージがからの場合はエラーを返す
    wp_die('No message');
  }

  // chatgpt APIへリクエストを送信
  $api_url = 'CHATGPT_API_URL';
  $api_key = 'CHATGPT_API_KEY';
  wp_die();
}
?>

