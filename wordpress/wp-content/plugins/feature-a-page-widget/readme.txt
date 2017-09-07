=== Feature A Page Widget ===
Contributors: mrwweb
Donate link: https://www.paypal.me/rootwiley
Tags: Widget, Widgets, Sidebar, Featured Page, Featured Post
Requires at least: 3.9
Tested up to: 4.8
Stable tag: 2.1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A widget to display an attractive summary of any page in any widget area.

== Description ==

Feature A Page Widget provides a "just works" solution for showcasing a Page, Post, or custom post type in any widget area (aka sidebar). It leverages core WordPress features, a *simple* set of options, and a sleek UI for selecting one of three widget layouts.

= How to Use the Widget =

1. Install and activate the plugin.
1. Edit the page you want to feature.
1. Fill out the [Excerpt](http://en.support.wordpress.com/splitting-content/excerpts/#creating-excerpts) and select a [Featured Image](http://en.support.wordpress.com/featured-images/#setting-a-featured-image) on that page.
1. Go to Appearance > Widgets or Customize > Widgets.
1. Add an instance of the "Feature a Page Widget" to the widget area (Sidebar, Footer, etc.) of your choosing.
1. Select the page, choose a layout, and optionally give the widget a title.
1. Save the widget!
1. Admire your handiwork.

This plugin enables Featured Images (aka "Post Thumbnails") and Excerpts for Pages and Posts (by default) with the ability to support custom post types. If you don't see one or both of those fields, they may be hidden in the "Screen Options" (top-right corner) while editing a Page or Post.

= Important Note: Image Sizes =

This plugin creates multiple custom image sizes. If you use images that were uploaded to the  media library before you installed this plugin, you may need to use a plugin like [Regenerate Thumbnails](http://wordpress.org/extend/plugins/regenerate-thumbnails/) to create the correctly-sized images.

= Customizing the Widget =

There are multiple ways to modify the widget based on your needs:

1. Prewritten CSS selectors in `/css/fpw_starter_styles.css` to help you get started with custom CSS styles in a child theme or the Custom CSS Customizer field
1. Three default overridable templates and the ability to create custom templates
1. Eight filters to modify most parts of the widget output (Title, Read More, Image sizes, etc.)
1. Interested in commissioning a custom layout just for your site? [Get in touch.](https://mrwweb.com/contact/)

See [the FAQs](https://wordpress.org/plugins/feature-a-page-widget/faq/) for links to code snippets with inline documentation.

= Like the Plugin? =

* [We love 5-star ratings!](http://wordpress.org/support/view/plugin-reviews/feature-a-page-widget)
* [Donations accepted](https://www.paypal.me/rootwiley)

= Available Languages =

Please [help translate Feature A Page Widget](https://translate.wordpress.org/projects/wp-plugins/feature-a-page-widget). Users have contributed translations in the following languages:

English (default), German (`de_DE`), Serbian (`sr_RS`), Polish (`pl_PL`), Spanish (`es_ES`), Italian (`it_IT`), Dutch (`nl_NL`)

= Other Plugins by @MRWweb =

* [MRW Web Design Simple TinyMCE](https://wordpress.org/plugins/mrw-web-design-simple-tinymce/) - Get rid of bad and obscure TinyMCE buttons. Move the rest to a single top row. Comes with a bit of help for adding custom CSS classes too.
* [Post Status Menu Items](http://wordpress.org/plugins/post-status-menu-items/) - Adds post status links–e.g. "Draft" (7)–to post type admin menus.
* [Post Type Archive Description](http://wordpress.org/plugins/post-type-archive-descriptions/) - Enables an editable description for a post type to display at the top of the post type archive page.
* [Hawaiian Characters](http://wordpress.org/plugins/hawaiian-characters/) - Adds the correct characters with diacriticals to the WordPress editor Character Map for Hawaiian

== Frequently Asked Questions ==

**[Full Version 2.0 Documentation](http://mrwweb.com/wordpress-plugins/feature-a-page-widget/version-2-documentation/)**

= How do I set the widget image? =

The widget gets its image from the "Featured Image" field on the page you are featuring.

1. Go to the page you're featuring.
1. In the right sidebar, look for the "Set Featured Image" link.
1. Use the media picker to find the image and then select "Use as Featured Image."
1. Update the page and you're ready to go.

= How do I set the widget text? =

The widget gets its text from the "Excerpt" field on the page you are featuring. See also: "Can I use HTML or a WYSIWYG/TinyMCE Editor with the Excerpt Field?"

1. Go to the page you want to featured.
1. Below the body field, look for the "Excerpt" field.
1. Fill it in.
1. Update the page.

= Where do I find the Featured Image or Excerpt fields? I don't see them. =

The Featured Image and Excerpt fields are found on the Page editing screen of the Page you want to feature. If you don't see them:

1. In the top right corner of any **Page**, click "Screen Options."
1. From the menu that slides down, make sure the "Excerpt" and "Featured Image" are both checked.
1. WordPress will remember this choice on all pages.

= Can I feature Custom Post Types? =

Indeed! Pages and Posts are feature-able by default. Use [`fpw_post_types` filter](https://gist.github.com/mrwweb/cb48eb0700aebc45c273) to add support for custom post types or remove Posts or Pages.

= How can I modify the widget design or output? =

The widget offers three ways to customize its design and output. The right method for you depends on what you want to accomplish and what you're comfortable doing technically.

1. **Write your own CSS rules.** The plugin's CSS selectors have as low a priority as possible, so you should be able to override styles easily. See `/css/fpw_start_styles.css` for a starter stylesheet you can copy and modify.
1. **Filter the Title, Excerpt, or Image.** Version 1.0 included the `fpw_page_title`, `fpw_excerpt`, and `fpw_featured_image` filters. Version 2.0 adds new filters `fpw_post_types`, `fpw_widget_templates`, `fpw_read_more_text`, and `fpw_image_size`.
1. **Override the Widget's output template.** Each widget layout can be overridden by a template in any parent or child theme. Create an `/fpw2_views/` in the active theme's folder and copy any layout files from `/wp-content/plugins/feature-a-page-widget/fpw2_views/` into the new folder to modify.
1. **Create a custom layout.** See this example for using the [`fpw_widget_templates` filter](https://gist.github.com/mrwweb/fd2adace8679b6bfa711). You can add new custom layouts or remove installed ones. Using the filter to only return a single layout removes the layout option from the widget and automatically uses the remaining layout.

= Can I use HTML or a WYSIWYG/TinyMCE Editor with the Excerpt Field? =

Install the [Rich Text Excerpts plugin](http://wordpress.org/extend/plugins/rich-text-excerpts/) or [Advanced Excerpt](http://wordpress.org/extend/plugins/advanced-excerpt/) plugins. Either plugin should take note and display your nicely formatted excerpt.

= Can I change the "Read More…" text? =

Use the [`fpw_read_more_text` filter](https://gist.github.com/mrwweb/b1001f45e94b3c604791).

= How do I change the image's size? =

Use the [`fpw_image_size` filter](https://gist.github.com/mrwweb/56edda993e0b7062c7af).

= Can I use an auto-generated Excerpt if I haven't filled one in? =

There's a filter for that too. See [`fpw_auto_excerpt`](https://gist.github.com/mrwweb/bebf4cbdcf50d4eadd46).

= What are those icons in the "Select Page" drop down? =

When selecting the page to feature in the widget settings, the list of pages includes two icons. The first icon is the featured image, and the second is the excerpt. If the icon is "lit-up," that means that page has that piece of information. If both are lit-up, the page is ready for optimal use in the widget. See this interface in the "Screenshots" tab.

= This widget isn't what I want... =

This widget is intended to be straightforward and avoid melting into "option soup." However, that means it might not be perfect for what you need.

If you think the widget is *almost right*, double-check that can't use the one of the plugin's filters or the widget view template (see "I want to modify how the widget looks/works"). If that doesn't work, [submit some feedback](http://mrwweb.com/feature-a-page-widget-plugin-wordpress/#gform_wrapper_4) for future versions of the plugins. And of course, there's always [the support forum](http://wordpress.org/support/plugin/feature-a-page-widget).

If this plugin is more than a little off, you might be looking for a different plugin like [Posts in Sidebar](http://wordpress.org/extend/plugins/posts-in-sidebar/) or [Genesis Featured Page Advanced](https://wordpress.org/plugins/genesis-featured-page-advanced/) (Genesis only).

== Screenshots ==

1. Choose from three theme-agnostic layouts.
2. No need to choke down "option soup."
3. Widget interface shows you which pages have featured images and excerpts.
4. Uses standard WordPress fields (Title, Featured Image, and Excerpt) that you already know and love.

== Changelog ==

= 2.1.1 (June 8, 2017) =
- Increase "Page to Feature" list transient caching time from 1 to 4 hours following no reported problems since 2.1.0 release.
- [Fix] Revise widget query to avoid conflict with plugins including Events Manager. [Props @betyonfire](https://wordpress.org/support/topic/custom-post-types-appear-in-widget-but-not-on-page/)
- Improve inline documentation thoroughness, clearness, and formatting
- Increase and standardize whitespace throughout plugin

= 2.1.0 (May 18, 2017) =
* [New] Implement caching on Widgets admin screen for massive performance improvements (70-80% reduction in query time in testing) on sites with lots of pages and multiple widgets.
* [Fix] Make sure layout previews appear in browsers other than Chrome.
* [Fix] Update layout image to SVG in supporting browsers so it stays crisp on zoomed pages.
* Update Chosen to 1.7.0
* Rename enqueued Chosen CSS handle to "chosen" (previously "chosen_css") to hopefully reduce potential for plugin and theme conflicts.
* Technical note: The select list HTML is now saved as a transient that expires after 1 hour. The transient is also reset after any time a supported published post is first published or updated. There were no problems during testing, but please be sure to [open a support ticket](https://wordpress.org/support/plugin/feature-a-page-widget) if you have problems with the "Page to Feature."
* Removed 2.0 upgrade info and pre-2.0 documentation. See old version of plugin readme to access that information.
* See also: 2.0.11 changelog

= 2.0.11 (March 31, 2017 - Not publicly released on wordpress.org) =
* [Fix] "Read More" link screen reader text should always contain title, even when "Hide Title" option is true.
* [Fix] Correct logic to hide widgets that don't have a set featured page ID.
* [Workaround] Added way to disable widget select list to resolve performance problems when above fix is still insufficient. Use `add_filter( 'fpw_temp_memory_fix', '__return_true' );`
* Theoretical query performance improvements on Widgets admin screen
* Remove redundant `esc_attr()` ([Props @flyjam](https://wordpress.org/support/topic/using-filter-at-widget_title-to-have-tags-in-it/))
* Ditch PHP "typecasting" with `(int)` for `intval()`
* Cleaned up readme following new plugin repo design.

= 2.0.10 (April 29, 2016) =
* **[Important Notice] Feature a Page Widget now requires WordPress 3.9 or higher.**
* [Fix] Custom Sidebars compatibility fix.

= 2.0.9 (March 29, 2016) =
* [Fix] Restore compatibility with Site Origin Page Builder plugin

= 2.0.8 (March 28, 2016) =
* [Fix] Inexplicable partial update caused old script names to attempt to be loaded. This completes the 2.0.7 update of Chosen and should resolve any issues.

= 2.0.7 (March 27, 2016) =
* [New] Support "selective refresh" feature in WordPress 4.5 for faster previews when using the widget in the customizer.
* Update Chosen to 1.5.1
* Bump "Tested up to:" to 4.5

= 2.0.6 (Dec 15, 2015) =
* [Fix] Add isset checks to resolve AJAX warnings. ([Props @maxwelton.](https://wordpress.org/support/topic/ajax-php-warning))
* [Fix] Support WPML in dropdown page list via `suppress_filters`. (Thanks, Maarten.)
* [Security][i18n] Escape translated strings for improved security.
* [Fix] Show Help Text again on Contextual Help tab of widget screen.
* [Layout] Center images if they don't fill full-width of widget.

= 2.0.5 (Sep 7, 2015) =
* [i18n] New Dutch translation. Thanks to [Patrick Catthoor](https://profiles.wordpress.org/pc1271)!
* [i18n News] If you have translation for this plugin, I would love to include it, ideally before the [move to translate.wordpress.org for plugins](https://make.wordpress.org/plugins/2015/09/01/plugin-translations-on-wordpress-org/). [Contact me](http://mrwweb.com/contact/) if you're interested.
* Bump "Tested to:" number

= 2.0.4 (Aug 28, 2015) =
- [Fix] Compatibility fix for WPMU Custom Sidebars (Thanks [oxygensmith for reporting](https://wordpress.org/support/topic/conflict-with-wpmu-custom-sidebars?replies=1))
- [i18n] New Italian translation. Thanks to [Carmine Scaglione](https://profiles.wordpress.org/scaglione).

= 2.0.3 (May 29, 2015) =
* [i18n] Spanish Translations. Thanks to [Luuuciano](https://wordpress.org/support/profile/luuuciano)!

= 2.0.2 (May 1, 2015) =
* [Fix] One string missing i18n. (Thanks, Maciej Gryniuk!)
* [Fix] Prevent clipped radio buttons with browser zoom.
* [New] `fpw_read_more_ellipsis` to filter punctuation in read more link. [Forum request.](https://wordpress.org/support/topic/excerpt-ellipses?replies=2#post-6861677)
* [i18n] Polish Translation from Maciej Gryniuk! (Update .pot file too.)
* [New] Added  missing space in "Read More" link noted in ["WordPress Plugin Review: Feature a Page Widget."](http://beyond-paper.com/wordpress-plugin-review-feature-a-page-widget/)
* [Documentation] New sticky [Support Forum post about accessible read more link](https://wordpress.org/support/topic/does-your-read-more-link-say-read-more-about-title).

= 2.0.1 (April 19, 2015) =
* [Fix] Give `fieldset` a full `name` attribute to avoid SiteOrigin Page Builder error.
* [New] Explicitly support SiteOrigin Page Builder via new script/style enqueues and JS event bindings.
* [Change] Rename "Chosen" library slug CSS/JS to hopefully avoid conflicts with other bundled versions.
* [Change] Remove priority of enqueues in admin. Not really sure why it was there in the first place...

= 2.0.0 (April 14, 2015) =
* **MAJOR UPDATE** Requires WordPress 3.8+. New template override system. Please update templates ASAP.
* [New] Updated widget form design matches WordPress 3.8 admin and replaces all but one image with Dashicons.
* [New] Options for hiding Title, Image, and Excerpt and adding "Read More" link.
* [New] Features Posts by default! (And new filter for adding other post types!)
* [New] Changes to templates for great flexibility. (Old templates will partially still work but support may be removed in future versions.)
* [New] Filters for adding post types, modifying "Read More" link, adding custom layouts, and more!
* [New] Docblock commenting throughout plugin for better in-code documentation.
* [Change] Rename widget title to "Feature a Page" in admin.
* [Fix] Remove `/assets/` folder from plugin package for faster downloads.
* [Fix] Drop hAtom support because it was broken without author and date. (Would you like to see schema.org support? Let me know.)
* [New] Introduce plugin compatibility fixes for Jetpack, DiggDigg, and podPress.
* Various small CSS changes to widget layouts for [hopefully] improved consistency.
* Reorganized files, WordPress code formatting improvements, and cleaner markup in most places
* Remove use of `extract()` for more readable code.
* [i18n] German translation files by [Christoph Toschko](https://profiles.wordpress.org/jomit/). Thanks, Christoph!
* [i18n] Serbian translation from Ogi Djuraskovic of [FirstSiteGuide.com](http://firstsiteguide.com/). Thanks, Ogi!
* [Update] Update Chosen JS library to v1.4.2.

== Upgrade Notice ==
= 2.1.0 =
Bug fixes and major admin performance improvements.

= 2.0.10 =
New: Requires WordPress 3.9 or higher. Fix Custom Sidebars plugin compatibility.

= 2.0.9 =
Restore Site Origin Page Builder plugin compatibility

= 2.0.8 =
Fixes 2.0.7 release that added "Support for 4.5 'Selective Refresh' Customizer previews"

= 2.0.7 =
Support for 4.5 "Selective Refresh" Customizer previews

= 2.0.6 =
Better WPML support, resolve AJAX warning, and security hardening

= 2.0.5 =
New Dutch translation. v2.0.0 IS A MAJOR UPDATE. Visit plugin home for detailed information about updates. / 2.0.0: Improved interface, ability to feature any post type, new template system, more filters, and more!

= 2.0.4 =
Italian translation & WPMU Sidebars plugin compatibility fix.
v2.0 IS A MAJOR UPDATE. Visit plugin home for detailed information about updates. / 2.0.0: Improved interface, ability to feature any post type, new template system, more filters, and more!

= 2.0.3 =
v2.0 IS A MAJOR UPDATE. Visit plugin home for detailed information about updates. / 2.0.0: Improved interface, ability to feature any post type, new template system, more filters, and more! / 2.0.3: Add Spanish translation.

= 2.0.2 =
v2.0 IS A MAJOR UPDATE. Visit plugin home for detailed information about updates. / 2.0.0: Improved interface, ability to feature any post type, new template system, more filters, and more! / 2.0.2: New Polish translation, multiple small bug fixes, new `fpw_read_more_ellipsis` filter.

= 2.0.1 =
v2.0 IS A MAJOR UPDATE. Visit plugin home for detailed information about updates. / 2.0.0: Improved interface, ability to feature any post type, new template system, more filters, and more! / 2.0.1: Support for SiteOrigin Page Builder Widget Editing

= 2.0.0 =
**MAJOR UPDATE.** Improved interface, ability to feature any post type, new template system, more filters, and more! Visit plugin home for detailed information about updates.