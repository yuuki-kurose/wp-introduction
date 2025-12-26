<?php
/**
 * Plugin Name: Test register
 * description: テストDBに値が保存されるかをテストする
 */

// echo '現在のファイル場所' . __DIR__;
// exit;
// wp-load.phpを読み込むようにパスを設定
require_once __DIR__ . '../../../../../wp-load.php';

$data = [
  'user_name' => 'テスト',
  'password' => 'testtest'
];

function test_to_signin($data) {
  global $wpdb;
  $table_name = $wpdb->prefix . 'test_chat_users';
  $test_result = $wpdb->insert($table_name, [
    'username' => $data['user_name'],
    'password' => $data['password'],
    'created_at' => current_time('mysql')
  ]);

  if(!$test_result) {
    echo "接続エラー：" . $wpdb->last_error . PHP_EOL;
  } else {
    return $test_result;
  }
}

echo '<pre>';
print_r(test_to_signin($data));
echo '</pre>';
?>