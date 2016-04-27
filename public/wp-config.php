<?php
ini_set('display_errors', 0);

if (file_exists(dirname(__FILE__) . '/../production-config.php')) {
  define('WP_LOCAL_DEV', false);
  include(dirname(__FILE__) . '/../production-config.php');
} else {
  define('WP_LOCAL_DEV', true);
  include(dirname(__FILE__) . '/../local-config.php');
}

define('WP_CONTENT_DIR', dirname(__FILE__) . '/wp-content');
define('WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content');

define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('WPLANG', '');

define('WP_DEBUG_DISPLAY', false);
define('WP_DEBUG', false);

define('AUTOMATIC_UPDATER_DISABLED', true);

$table_prefix  = 'wp_';

if (!defined('ABSPATH')) {
  define('ABSPATH', dirname(__FILE__) . '/wp/');
}
require_once(ABSPATH . 'wp-settings.php');
