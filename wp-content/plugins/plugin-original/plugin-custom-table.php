<?php
/**
 * Plugin Name: Plugin Custom Table
 */
register_activation_hook(__FILE__, 'create_custom_table');

// カスタムテーブルの作成
function create_custom_table() {
  global $wpdb;
  $table_name = $wpdb->prefix . 'chat_history';
  $charset_collate = $wpdb->get_charset_collate();
  $sql = "CREATE TABLE IF NOT EXISTS $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    user_message text NOT NULL,
    ai_response text NOT NULL,
    created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY (id)
  ) $charset_collate;";
  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  dbDelta($sql);
}