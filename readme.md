# Huskii - Varnish Helper

A WordPress plugin developed by [Huskii](https://huskii.be) that allows you to prevent Varnish from caching specific parts of your site. Ideal for Combell-hosted sites or any server using Varnish caching.

---

## 🚀 Features

- Disable Varnish cache for:
  - Archive pages, paginated views, and search results
  - Specific pages
  - Specific posts (any post type)
  - Page templates
  - Custom Post Types (CPTs)
  - CPT archive pages
- Admin UI with searchable Select2 multi-select inputs
- Export/Import your settings via JSON
- Built-in **Info** and **Support** pages for clarity and help

---

## 📦 Installation

1. Download or clone this repository into your WordPress plugins directory:
   ```bash
   git clone https://github.com/HuskiiBE/huskii-varnish-helper wp-content/plugins/huskii-varnish-helper
   ```

2. Activate the plugin via the WordPress admin panel

3. Go to **Varnish Helper** in the admin sidebar to configure

---

## 🎛 Composer Installation

If you're using Bedrock or another Composer-based WordPress setup:

1. Add the repository to your `composer.json`:

```json
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/HuskiiBE/huskii-varnish-helper"
  }
]
```

2. Require the package:

```bash
composer require huskii/varnish-helper
```

3. Make sure `"type": "wordpress-plugin"` is supported in your project (e.g. via composer/installers or roots/bedrock).

---

## 🧩 Folder Structure

```
huskii-varnish-helper/
├── includes/
│   ├── cache-control.php
│   ├── export-import.php
│   ├── info-page.php
│   ├── settings-fields.php
│   ├── settings-pages.php
│   └── support-page.php
├── changelog.txt
├── composer.json
├── huskii-varnish-helper.php
├── readme.md
└── readme.txt
```

---

## 📞 Support

This plugin is developed and maintained by:

**Christophe Vanleeuw**  
[Huskii](https://huskii.be)  
📧 [christophe.vanleeuw@huskii.be](mailto:christophe.vanleeuw@huskii.be)  
📞 +32 499 61 92 81

For feature requests, issues or contributions, feel free to open an issue or submit a pull request.

---

## 📜 License

MIT © Huskii – use it, modify it, share it freely.
