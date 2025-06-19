=== Quick Event Calendar ===
Contributors: lumiblog, divibanks
Donate Link: https://wpcorner.co/donate/
Tags: event calendar, calendar, event, date, schedule
Requires at least: 4.9
Tested up to: 6.7
Requires PHP: 7.0 
Stable tag: 1.5.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Quick Event Calendar is a very simple, performant, and WordPress-integrated event calendar plugin.

== Description ==

### Quick Event Calendar - Simple, fancy event calendar. ###

**Quick Event Calendar** is a very simple, performant, and WordPress-integrated event calendar plugin. Quick Event Calendar allows you to add **posts**, **events** or any other **custom post type** to a flexible, responsive calendar which can be placed in a post, page or widget.

The calendar works on one page only using AJAX loading. All events (or posts) in one month are displayed under the calendar. 

It is simple, and fast, with no bloated styles and visual scripts. Use the included themes to style your calendar. Use the default or the minimal theme to match your current WordPress theme appearance.

The calendar is feature-packed: works with custom posts, only needs one page, includes predefined themes and is responsive.

Add your own event using the `[qcc-form]` shortcode and display all events using the `[qcc-calendar]` shortcode.

### Quick Event Calendar plugin can be used by: ###

* **Website Owners / Administrators: Anyone who runs a WordPress website can use this plugin to display events or custom post types in a calendar format on their site.

* **Event Organizers**: Individuals or organizations that host events can utilize this plugin to create an event calendar on their WordPress website, allowing visitors to easily view and potentially submit events.

* **Bloggers / Content Creators**: If you have a blog or website where you regularly publish content organized by date (e.g., posts, articles, news), you can use Quick Event Calendar to display this content in a calendar format.

* **Business Owners**: Small businesses, especially those in industries like hospitality, retail, or services, can use this plugin to showcase their events, promotions, or special offers in a visually appealing calendar layout.

* **Community Organizations**: Non-profit organizations, clubs, schools, or local communities can benefit from Quick Event Calendar to publicize their upcoming events, meetings, or activities on their WordPress website.

* **Personal Websites / Blogs**: Individuals running personal websites or blogs can use this plugin to display their schedule, milestones, or any date-based content in a calendar format.

### Key Features ###

See the features which are exclusive to the Quick Event Calendar plugin and understand why Quick Event Calendar is possibly the **Best Event Calendar Plugin for WordPress**.

* **Simple and Performant**: Quick Event Calendar is designed to be fast and lightweight, with no bloated styles or visual scripts, ensuring optimal performance.

* **AJAX Loading**: The calendar works on a single page, utilizing AJAX to load events for a specific month, providing a smooth and efficient user experience.

* **Custom Post Type Integration**: Display events from any custom post type, giving you the flexibility to organize and showcase your content as desired.

* **Responsive Design**: The calendar is fully responsive, ensuring a seamless experience across different devices and screen sizes.

* **Predefined Themes**: Quick Event Calendar includes predefined themes, allowing you to easily style your calendar to match your WordPress theme's appearance.

* **Customizable Colors**: Tailor the calendar's appearance by selecting accent colors, event colors, and background colors to match your site's branding.

### How to Use Quick Event Calendar ###

[vimeo https://vimeo.com/981290390]

* **Install and Activate**: Install and activate the Quick Event Calendar plugin from the WordPress plugin repository.

* **Configure Settings**: Navigate to the plugin settings and configure the desired options, such as selecting the post type, category (if applicable), and choosing which posts to display **(published, scheduled, or future)**.

* **Add Events**: Use the `[qcc-form]` shortcode to display the calendar submission form on any post, page, or widget, allowing users to add new events.

* **Display the Calendar**: Use the `[qcc-calendar]` shortcode on any post, page, or widget to display the calendar with the selected events.

* **Customize Appearance**: Select one of the predefined themes and match the calendar's colors with your site's branding by adjusting the accent color, event color, and background color for the current day.

### Help with shortcodes ###

* Use the `[qcc-calendar]` shortcode in any post, page or widget to show the calendar.

* Use the `[qcc-form]` shortcode in any post, page or widget to show the calendar submission form.

### Help with template tags ###

* Use the `<?php echo do_shortcode("[qcc-calendar]"); ?>` code in any page template to show the **calendar**.

* Use the `<?php echo do_shortcode("[qcc-form]"); ?>` code in any page template to show the **calendar submission form**.

### Help with styling ###

Use the included themes to style your calendar. Use the default or the minimal theme to match your current WordPress theme appearance.

**After installing the plugin, you need to configure it by selecting several options:**

* Select the desired post type, the desired category (if post type is ‘post’) and which posts you want to show. For an event calendar, the default should be both published and scheduled/future posts.

* In case you want to use custom meta fields, the calendar works with preexisting meta fields. Using custom meta fields requires a third-party plugin to add new fields.

* After selecting the desired options, pick one of the predefined themes to match your site.

* After selecting a theme, you need to match your site’s colours with the calendar template.

* In your **Configurator** tab, select the accent colour, the event colour and the background colour for the current day.

When you are done with the settings, use the `[qcc-calendar]` shortcode in any post, page or widget to show the calendar.

== Installation ==

1. Go to the WordPress admin dashboard
3. Navigate to `Plugins` > `Add New`
4. Search for Quick Event Calendar
5. Click `Install Now`
6. Activate the plugin

== Frequently Asked Questions ==

= Is the calendar responsive? =

Yes, Quick Event Calendar is fully responsive and will adapt to different screen sizes and devices, ensuring a seamless user experience.

= Can I display the calendar on multiple pages? =

Quick Event Calendar is designed to work on a single page, utilizing AJAX to load events for a specific month. If you need to display the calendar on multiple pages, you can use the provided **shortcodes** or **template tags** on those pages.

= Can I use custom meta fields with Quick Event Calendar? =

Yes, Quick Event Calendar works with preexisting custom meta fields. However, you may need to use a third-party plugin to add new custom fields.

= How do I style the calendar to match my WordPress theme? = 

Quick Event Calendar includes predefined themes that you can select from the plugin settings. Additionally, you can customize the calendar's colors to match your site's branding.

= Can I display events from custom post types? =

Yes, Quick Event Calendar allows you to display events or any other custom post type in the calendar.

= How do I get support? =

If you encounter any issues or have questions regarding Quick Event Calendar, please visit [the plugin’s support forum](https://wordpress.org/support/plugin/quick-event-calendar/) or [contact us](mailto:support@wpcorner.co) for assistance.

== Screenshots ==

1. Quick Event Calendar `Settings` tab
2. Quick Event Calendar `Configurator` tab
3. Event submission form
4. Calendar showing events on a live page

== Changelog ==

= 1.5.0 =
* NEW FEATURE: Use ACF Fields

= 1.4.8 =
* NEW FEATURE: Each month to start from SUNDAY
* FIX: Fixed the form submission success message display location
* UPDATE: Plugin settings page redesigned

= 1.4.7 =
* UPDATE: Updated WordPress compatibility

= 1.4.6 =
* UPDATE: Updated WordPress compatibility

= 1.4.5 =
* UPDATE: Updated readme.txt and plugin info in the main plugin file
* TODO: Add WPML compatibility
* TODO: Compare JS to https://github.com/fdut/ContactDevOps/blob/22dd6f38bbd591aeb3a5e5653cf2cdcb066ca146/contact-web/ContactWeb/client/js/transports/calendarController.js
* TODO: Refactor JS to ES6
* TODO: Test form submission and add demo page
* TODO: Reconsider custom date field

= 1.4.4 =
* TODO: Compare JS to https://github.com/fdut/ContactDevOps/blob/22dd6f38bbd591aeb3a5e5653cf2cdcb066ca146/contact-web/ContactWeb/client/js/transports/calendarController.js
* TODO: Refactor JS to ES6
* TODO: Test form submission and add demo page
* TODO: Reconsider custom date field

= 1.4.3 =
* UPDATE: Updated WordPress compatibility

= 1.4.2 =
* UPDATE: Updated WordPress compatibility

= 1.4.1 =
* UPDATE: Updated WordPress compatibility
* UPDATE: Updated readme.txt and added shortcode documentation

= 1.4.0 =
* FIX: Fixed year not going back further than current year
* FIX: Fixed default styles for the submission form
* UPDATE: Updated WordPress compatibility
* UPDATE: Updated PHP 7 compatibility
* UPDATE: Updated PHP 8 compatibility
* UPDATE: Refactored JS

= 1.3.5 =
* UPDATE: Updated WordPress compatibility

= 1.3.4 =
* FIX: Fixed several condition loops
* UPDATE: Updated WordPress compatibility

= 1.3.3 =
* UPDATE: Updated WordPress compatibility
* UPDATE: Updated installation section

= 1.3.2 =
* UPDATE: Updated WordPress compatibility
* FIX: Fixed performance

= 1.3.1 =
* FIX: Fixed readme.txt file
* FIX: Fixed several i18n tags
* FIX: Fixed documentation
* FIX: Security fixes

= 1.3.0 =
* UPDATE: Moved to WordPress.org
* UPDATE: Updated FontAwesome to latest version
* FIX: Security fixes

= 1.2.3 =
* FIX: Fixed conflict with other calendar plugins by using more CSS specificity
* FIX: Moved some hardcoded styles to their own CSS stylesheet
* FIX: Added default styles for the submission form
* UI: Removed Dashicons requirement

= 1.2.2 =
* FIX: Only apply category query if post type is "post"

= 1.2.1 =
* UPDATE: Added default settings on plugin initialisation
* UPDATE: Updated FontAwesome library
* UPDATE: Added uninstall routine (plugin will clean up after uninstall)
* UPDATE: Added Material theme
* UPDATE: Combined Minimal theme into Default and Flat themes
* UPDATE: Updated translations

= 1.2.0 =
* FIX: Fixed custom CSS not appearing in wp_head()
* FIX: Removed FontAwesome from backend
* UPDATE: Updated FontAwesome version
* UPDATE: Added correct plugin URL in readme.txt
* UPDATE: Increased posts per page to 1000 (from 900)
* FEATURE: Added custom meta fields option for date

= 1.1.0 =
* UPDATE: Added frontend publishing
* UPDATE: Added internationalization

= 1.0.0 =
* First public release