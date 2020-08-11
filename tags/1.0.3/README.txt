=== Plugin Name ===
Contributors: foack
Donate link: https://punktbar.de
Tags: fusion-builder
Requires at least: 4.9.8
Tested up to: 5.0.3
Stable: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin extends the Fusion Builder plugin with a Youtube element that uses Youtube's "nocookie" domain to embed videos that are GDPR compatible.

== Description ==

The Fusion Builder plugin that comes with ThemeFusion's Avada theme has a Youtube page element that lets you embed Youtube videos. However, those load cookies from Youtube by default, which is not allowed by GDPR.

This plugin can only be used in conjunction with the Fusion Builder plugin. It copies the Youtube element from the Fusion Builder and adds a second "Youtube (No-Cookie)" element.

With the new element, you can embed videos using https://www.youtube-nocookie.com - which is GDPR compatible.

== Installation ==

You can install the plugin directly from the WP repository or upload the plugin via FTP to wp-content/plugins.


== Frequently Asked Questions ==

= Can this plugin be used on its own? =

No. You will need the Fusion Builder plugin activated on your site.


== Changelog ==

= 1.0.3 = 
* Testing wp-continuous-deployment 

= 1.0.2 = 
* Further improved performance by unloading JS/CSS files in frontend.

= 1.0.1 =
* Removed unused JS and CSS files being loaded on frontend.

= 1.0 =
* Initial version of this plugin. Copies the existing Youtube element from the Fusion Builder into a "Youtube (No-Cookie)" element.
