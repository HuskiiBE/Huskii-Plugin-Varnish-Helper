<?php
/**
 * Register all admin menu and submenu pages (in English, with reordered Info on top)
 */
namespace Huskii\VarnishHelper;

function register_admin_pages() {
    add_menu_page(__('Varnish Helper', 'huskii-varnish-helper'), __('Varnish Helper', 'huskii-varnish-helper'), 'manage_options', 'huskii-varnish-helper', __NAMESPACE__ . '\\render_info_page', 'dashicons-shield-alt', 80);
    add_submenu_page('huskii-varnish-helper', __('Info', 'huskii-varnish-helper'), __('Info', 'huskii-varnish-helper'), 'manage_options', 'huskii-varnish-helper', __NAMESPACE__ . '\\render_info_page');
    add_submenu_page('huskii-varnish-helper', __('General', 'huskii-varnish-helper'), __('General', 'huskii-varnish-helper'), 'manage_options', 'huskii-vh-general', __NAMESPACE__ . '\\render_general_page');
    add_submenu_page('huskii-varnish-helper', __('Templates', 'huskii-varnish-helper'), __('Templates', 'huskii-varnish-helper'), 'manage_options', 'huskii-vh-templates', __NAMESPACE__ . '\\render_templates_page');
    add_submenu_page('huskii-varnish-helper', __('Pages', 'huskii-varnish-helper'), __('Pages', 'huskii-varnish-helper'), 'manage_options', 'huskii-vh-pages', __NAMESPACE__ . '\\render_pages_page');
    add_submenu_page('huskii-varnish-helper', __('Custom Post Types', 'huskii-varnish-helper'), __('CPTs', 'huskii-varnish-helper'), 'manage_options', 'huskii-vh-cpts', __NAMESPACE__ . '\\render_cpt_page');
    add_submenu_page('huskii-varnish-helper', __('CPT Archives', 'huskii-varnish-helper'), __('CPT Archives', 'huskii-varnish-helper'), 'manage_options', 'huskii-vh-cpt-archives', __NAMESPACE__ . '\\render_cpt_archive_page');
    add_submenu_page('huskii-varnish-helper', __('Posts', 'huskii-varnish-helper'), __('Posts', 'huskii-varnish-helper'), 'manage_options', 'huskii-vh-posts', __NAMESPACE__ . '\\render_posts_page');
    add_submenu_page('huskii-varnish-helper', __('Export/Import', 'huskii-varnish-helper'), __('Export/Import', 'huskii-varnish-helper'), 'manage_options', 'huskii-vh-export', __NAMESPACE__ . '\\render_export_import_page');
    add_submenu_page('huskii-varnish-helper', __('Support', 'huskii-varnish-helper'), __('Support', 'huskii-varnish-helper'), 'manage_options', 'huskii-vh-support', __NAMESPACE__ . '\\render_support_page');
}

add_action('admin_menu', __NAMESPACE__ . '\\register_admin_pages');
