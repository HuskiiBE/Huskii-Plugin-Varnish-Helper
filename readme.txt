=== Huskii - Varnish Helper ===
Contributors: christophevanleeuw
Tags: varnish, cache, admin, combell
Requires at least: 6.0
Tested up to: 6.5
Stable tag: 1.0.0
License: MIT
License URI: https://opensource.org/licenses/MIT

Huskii plugin that helps clear Varnish cache manually on Combell servers from the WordPress admin dashboard.

== Description ==
Adds an admin bar button to manually flush the Varnish cache using varnishadm.
This plugin is tailored for Combell hosting environments with Varnish CLI access.

== Installation ==
1. Upload the plugin to `/wp-content/plugins/huskii-varnish-helper`
2. Create a `.env` file in the root of the plugin with the required VARNISH_ variables.
3. Activate the plugin.
4. Use the admin bar button "Flush Varnish" to clear the cache.

== Changelog ==
= 1.0.0 =
* Initial release with adminbar integration and CLI flush via `varnishadm`.

== Author ==
Christophe Vanleeuw – https://huskii.be
