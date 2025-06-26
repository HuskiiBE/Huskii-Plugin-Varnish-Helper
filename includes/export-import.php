<?php
/**
 * Export/import UI for Huskii Varnish Helper settings
 */
namespace Huskii\VarnishHelper;

function render_export_import_page() {
    echo '<div class="wrap"><h1>' . esc_html__('Export/Import Settings', 'huskii-varnish-helper') . '</h1>';

    if (!empty($_POST['huskii_vh_export'])) {
        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="varnish-settings-export.json"');
        echo json_encode(get_option('huskii_vh_settings'));
        exit;
    }

    if (!empty($_POST['huskii_vh_import']) && !empty($_FILES['import_file']['tmp_name'])) {
        $data = json_decode(file_get_contents($_FILES['import_file']['tmp_name']), true);
        if (is_array($data)) {
            update_option('huskii_vh_settings', $data);
            echo '<div class="notice notice-success is-dismissible"><p>Settings successfully imported.</p></div>';
        } else {
            echo '<div class="notice notice-error is-dismissible"><p>Invalid import file.</p></div>';
        }
    }

    echo '<form method="post">' . submit_button('Export Settings', 'primary', 'huskii_vh_export', false) . '</form><hr>';
    echo '<form method="post" enctype="multipart/form-data"><input type="file" name="import_file" required> ';
    submit_button('Import Settings', 'secondary', 'huskii_vh_import');
    echo '</form></div>';
}
