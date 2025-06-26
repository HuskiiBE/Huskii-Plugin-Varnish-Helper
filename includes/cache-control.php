<?php
/**
 * Hook into template_redirect and apply no-cache headers
 */
namespace Huskii\VarnishHelper;

add_action('template_redirect', function () {
    if (is_admin() || headers_sent()) return;
    $settings = get_option('huskii_vh_settings');

    if (!empty($settings['uncache_archives']) && (is_search() || is_home() || is_paged())) send_headers();
    elseif (!empty($settings['uncache_templates']) && is_page_template() && in_array(get_page_template_slug(), $settings['uncache_templates'])) send_headers();
    elseif (!empty($settings['uncache_pages']) && is_page() && in_array(get_the_ID(), $settings['uncache_pages'])) send_headers();
    elseif (!empty($settings['uncache_posts']) && is_single() && in_array(get_the_ID(), $settings['uncache_posts'])) send_headers();
    elseif (!empty($settings['uncache_cpts']) && is_singular() && in_array(get_post_type(), $settings['uncache_cpts'])) send_headers();
    elseif (!empty($settings['uncache_cpt_archives']) && is_post_type_archive() && in_array(get_query_var('post_type'), $settings['uncache_cpt_archives'])) send_headers();
});

function send_headers() {
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');
}
