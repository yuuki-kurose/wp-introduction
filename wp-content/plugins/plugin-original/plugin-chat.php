<?php
/**
 * Plugin Name: Plugin Chat
 */
add_action('wp_ajax_gemini_request', 'handle_gemini_request');
add_action('wp_ajax_nopriv_gemeni_request', 'handle_gemini_request');

// リクエストの確認
function handle_gemini_request() {
  // admin-ajax.phpからのリクエスト
  $message = $_POST['user_message'];
  if(empty($message)) {
    // メッセージがからの場合はエラーを返す
    wp_die('No message');
  }

  // chatgpt APIへリクエストを送信
  $api_url = GEMINI_API_URL;
  $request_body = wp_remote_post($api_url, [
    'headers' => [
      'Content-Type' => 'application/json',
    ],
    'body' => json_encode([
      'contents' => [
        'parts' => [['text' => $message]]
      ]
    ]),
    'timeout' => 15,
  ]);

  // ログ情報
  // ログの時刻は+9時間
  $log_dir = WP_CONTENT_DIR . '/uploads/logs/';
  $log_file = $log_dir . 'chat_log.txt';
  $log_update_time = date('Y-m-d H:i:s');
  $status_code = wp_remote_retrieve_response_code($request_body);

  // リクエストがAPIに届いているか確認　→成功したらレスポンスを取得
  if(is_wp_error($request_body) !== false) {
    // リクエストエラー
    $request_error_message = $request_body->get_error_message();
    file_put_contents($log_file, $log_update_time . "リクエストエラー原因: $request_error_message\n", FILE_APPEND);
    file_put_contents($log_file, $log_update_time . "リクエストステータス: $status_code\n", FILE_APPEND);
  } else {
    file_put_contents($log_file, $log_update_time . "リクエストステータス: $status_code\n", FILE_APPEND);

    // レスポンスを取得
    $response_body = wp_remote_retrieve_body($request_body);
    $response_data = json_decode($response_body, true);
    if(is_wp_error($response_data) !== false) {
      // レスポンスエラー
      $response_error_message = $response_data->get_error_message();
      file_put_contents($log_file, $log_update_time . "レスポンスエラー原因: $response_error_message\n", FILE_APPEND);
      file_put_contents($log_file, $log_update_time . "レスポンスステータス: $status_code\n", FILE_APPEND);
      wp_send_json_error('Error: ' . $response_error_message);
    } else {
      file_put_contents($log_file, $log_update_time . "レスポンスステータス: $status_code\n", FILE_APPEND);
      $response_message = $response_data['candidates']['0']['content']['parts'][0]['text'];
      wp_send_json_success($response_message);
    }
  }
  wp_die();
}
?>

