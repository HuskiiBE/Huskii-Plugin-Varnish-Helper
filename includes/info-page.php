<?php
/**
 * Plugin Info Page
 */
namespace Huskii\VarnishHelper;

function render_info_page() {
    echo '<div class="wrap"><h1>How does this plugin work?</h1>';
    echo '<p>This plugin allows you to disable Varnish caching for specific content types in WordPress.</p>';
    echo '<ul>';
    echo '<li><strong>General:</strong> Disable caching for general page types such as archives, search results, and pagination.</li>';
    echo '<li><strong>Templates:</strong> Select page templates where caching should be disabled.</li>';
    echo '<li><strong>Pages / Posts:</strong> Choose individual pages or posts that should not be cached.</li>';
    echo '<li><strong>CPTs & Archives:</strong> Support for custom post types and their archive pages.</li>';
    echo '<li><strong>Export/Import:</strong> Export or import your settings as JSON.</li>';
    echo '</ul>';
    echo '<p>The plugin works by adding “Cache-Control” headers to selected pages. Varnish will then bypass its cache for those pages.</p>';
    echo '</div>';
}
