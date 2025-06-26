<?php
/**
 * Plugin Support Page
 */
namespace Huskii\VarnishHelper;

function render_support_page() {
    echo '<div class="wrap"><h1>Support</h1>';
    echo '<p>This plugin is developed and maintained by:</p>';
    echo '<ul>';
    echo '<li><strong>Name:</strong> Christophe Vanleeuw</li>';
    echo '<li><strong>Company:</strong> Huskii</li>';
    echo '<li><strong>Website:</strong> <a href="https://huskii.be" target="_blank">https://huskii.be</a></li>';
    echo '<li><strong>Email:</strong> <a href="mailto:christophe.vanleeuw@huskii.be">christophe.vanleeuw@huskii.be</a></li>';
    echo '<li><strong>Phone:</strong> +32 499 61 92 81</li>';
    echo '</ul>';
    echo '<p>Feel free to get in touch for support or custom development.</p>';
    echo '</div>';
}