<?php
/**
 * Plugin Name: Huskii - Varnish Helper
 * Plugin URI: https://github.com/HuskiiBE/Huskii-Plugin-Varnish-Helper
 * Description: Huskii plugin that helps clear varnish manually on Combell servers
 * Version: 1.0.0
 * Author: Christophe Vanleeuw
 * Author URI: https://huskii.be
 * Text Domain: huskii-varnish-helper
 */

namespace Huskii\VarnishHelper;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Load environment variables if available
if (file_exists(__DIR__ . '/.env')) {
    if (class_exists('Dotenv\\Dotenv')) {
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();
    }
}

/**
 * Execute Varnish cache flush via varnishadm command
 *
 * @return string|\WP_Error Success message or error
 */
function flush_varnish_cache() {
    if (!current_user_can('manage_options')) {
        return new \WP_Error('forbidden', __('Insufficient permissions.', 'huskii-varnish-helper'));
    }

    $secret = getenv('VARNISH_SECRET_PATH');
    $host   = getenv('VARNISH_HOST');
    $port   = getenv('VARNISH_PORT');

    if (!$secret || !$host || !$port) {
        return new \WP_Error('missing_env', __('Varnish CLI settings missing in environment.', 'huskii-varnish-helper'));
    }

    $command = sprintf(
        'varnishadm -S %s -T %s:%s "ban req.url ~ ."',
        escapeshellarg($secret),
        escapeshellarg($host),
        escapeshellarg($port)
    );

    $output = shell_exec($command);

    if (is_string($output) && str_contains($output, '200')) {
        return __('Varnish cache successfully cleared.', 'huskii-varnish-helper');
    }

    return new \WP_Error('flush_failed', __('Flush failed: ', 'huskii-varnish-helper') . $output);
}

/**
 * Register admin bar button
 *
 * @param \WP_Admin_Bar $admin_bar
 */
function add_admin_bar_button($admin_bar) {
    if (!current_user_can('manage_options')) return;

    $url = wp_nonce_url(admin_url('?flush_varnish=1'), 'flush_varnish');
    $admin_bar->add_menu([
        'id'    => 'huskii_flush_varnish',
        'title' => '🧹 Flush Varnish',
        'href'  => $url,
    ]);
}
add_action('admin_bar_menu', __NAMESPACE__ . '\\add_admin_bar_button', 100);

/**
 * Handle admin init action to process flush
 */
function maybe_flush_varnish() {
    if (!is_admin() || !isset($_GET['flush_varnish']) || !current_user_can('manage_options') || !check_admin_referer('flush_varnish')) return;

    $result = flush_varnish_cache();

    if (is_wp_error($result)) {
        wp_die(__('Varnish flush error: ', 'huskii-varnish-helper') . esc_html($result->get_error_message()));
    }

    wp_safe_redirect(admin_url('?flush=ok'));
    exit;
}
add_action('admin_init', __NAMESPACE__ . '\\maybe_flush_varnish');

/**
 * Show admin notice on successful flush
 */
function show_admin_notice() {
    if (isset($_GET['flush']) && $_GET['flush'] === 'ok') {
        echo '<div class="notice notice-success is-dismissible"><p>' . esc_html(__('Varnish cache is leeggemaakt.', 'huskii-varnish-helper')) . '</p></div>';
    }
}
add_action('admin_notices', __NAMESPACE__ . '\\show_admin_notice');
