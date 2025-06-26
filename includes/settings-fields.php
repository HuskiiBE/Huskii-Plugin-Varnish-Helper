<?php
/**
 * Register settings and render field UIs
 */

namespace Huskii\VarnishHelper;

add_action('admin_init', function () {
    register_setting('huskii_varnish_helper', 'huskii_vh_settings');
    wp_enqueue_style('select2', plugins_url('../assets/select2/select2.min.css', __FILE__));
    wp_enqueue_script('select2', plugins_url('../assets/select2/select2.min.js', __FILE__), ['jquery'], null, true);
    wp_add_inline_script('select2', 'jQuery(document).ready(function($){ $(".huskii-vh-multiselect").select2(); });');
});

/**
 * Render settings form for multiselect fields
 */
function settings_form($section, $options, $field_key = '') {
    $key = $field_key ?: 'uncache_' . $section;
    $saved = get_option('huskii_vh_settings');
    echo '<div class="wrap"><form method="post" action="options.php">';
    settings_fields('huskii_varnish_helper');
    do_settings_sections('huskii_varnish_helper');
    echo '<p class="description">Hold down Ctrl (Windows) or Cmd (Mac) to select multiple items. Pages you select here will not be cached by Varnish.</p>';
    echo '<select multiple class="huskii-vh-multiselect" style="width:100%;" name="huskii_vh_settings[' . esc_attr($key) . '][]">';
    foreach ($options as $value => $label) {
        $selected = isset($saved[$key]) && in_array($value, (array) $saved[$key]) ? 'selected' : '';
        echo '<option value="' . esc_attr($value) . '" ' . $selected . '>' . esc_html($label) . '</option>';
    }
    echo '</select>';
    submit_button();
    echo '</form></div>';
}

function render_general_page() {
    $saved = get_option('huskii_vh_settings');
    echo '<div class="wrap"><h1>' . esc_html__('General Cache Settings', 'huskii-varnish-helper') . '</h1>';
    echo '<form method="post" action="options.php">';
    settings_fields('huskii_varnish_helper');
    do_settings_sections('huskii_varnish_helper');
    echo '<label><input type="checkbox" name="huskii_vh_settings[uncache_archives]" value="1" ' . checked(1, $saved['uncache_archives'] ?? '', false) . '> ' . __('Disable cache for all archive/search/paged pages.', 'huskii-varnish-helper') . '</label><br><br>';
    submit_button();
    echo '</form></div>';
}

function render_templates_page() {
    settings_form('templates', wp_get_theme()->get_page_templates(), 'uncache_templates');
}

function render_pages_page() {
    $options = [];
    foreach (get_pages() as $page) {
        $options[$page->ID] = $page->post_title;
    }
    settings_form('pages', $options, 'uncache_pages');
}

function render_cpt_page() {
    $options = [];
    foreach (get_post_types(['_builtin' => false], 'objects') as $type => $obj) {
        $options[$type] = $obj->labels->name;
    }
    settings_form('cpts', $options, 'uncache_cpts');
}

function render_cpt_archive_page() {
    $options = [];
    foreach (get_post_types(['_builtin' => false], 'objects') as $type => $obj) {
        if ($obj->has_archive) {
            $options[$type] = $obj->labels->name . ' (Archive)';
        }
    }
    settings_form('cpt_archives', $options, 'uncache_cpt_archives');
}

function render_posts_page() {
    $query = new \WP_Query(['post_type' => 'any', 'posts_per_page' => -1]);
    $options = [];
    foreach ($query->posts as $post) {
        $options[$post->ID] = $post->post_title . ' (' . $post->post_type . ')';
    }
    settings_form('posts', $options, 'uncache_posts');
}
