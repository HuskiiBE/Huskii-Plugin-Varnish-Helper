<?php
/**
 * Plugin Name: Huskii - Varnish Helper
 * Plugin URI: https://github.com/HuskiiBE/Huskii-Plugin-Varnish-Helper
 * Description: Prevent Varnish caching on specific WordPress content types (pages, templates, CPTs, posts, etc.)
 * Version: 2.5.5
 * Author: Christophe Vanleeuw
 * Author URI: https://huskii.be
 * Text Domain: huskii-varnish-helper
 */

namespace Huskii\VarnishHelper;

if (!defined('ABSPATH')) exit;

require_once __DIR__ . '/includes/settings-pages.php';
require_once __DIR__ . '/includes/settings-fields.php';
require_once __DIR__ . '/includes/export-import.php';
require_once __DIR__ . '/includes/cache-control.php';
require_once __DIR__ . '/includes/info-page.php';
require_once __DIR__ . '/includes/support-page.php';
