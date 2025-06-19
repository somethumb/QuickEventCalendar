<?php
if(!defined('ABSPATH')) exit; // Exit if accessed directly

function qcc_calendar_admin_page() {
    ?>
    <div class="wrap">
        <h1><?php _e('Quick Event Calendar', 'quick-event-calendar'); ?></h1>

        <?php
        $t = isset($_GET['tab']) ? $_GET['tab'] : 'dashboard_tab';
        if(isset($_GET['tab']))
            $t = $_GET['tab'];

        $i = get_option('ip_slug');
        ?>
        <h2 class="nav-tab-wrapper">
            <a href="options-general.php?page=qcc&amp;tab=dashboard_tab" class="nav-tab <?php echo $t == 'dashboard_tab' ? 'nav-tab-active' : ''; ?>"><?php _e('Dashboard', 'quick-event-calendar'); ?></a>
            <a href="options-general.php?page=qcc&amp;tab=settings_tab" class="nav-tab <?php echo $t == 'settings_tab' ? 'nav-tab-active' : ''; ?>"><?php _e('Settings', 'quick-event-calendar'); ?></a>
            <a href="options-general.php?page=qcc&amp;tab=configurator_tab" class="nav-tab <?php echo $t == 'configurator_tab' ? 'nav-tab-active' : ''; ?>"><?php _e('Configurator', 'quick-event-calendar'); ?></a>
            <a href="options-general.php?page=qcc&amp;tab=documentation" class="nav-tab <?php echo $t == 'documentation' ? 'nav-tab-active' : ''; ?>"><?php _e('Documentation', 'quick-event-calendar'); ?></a>
        </h2>

        <div class="qcc-admin-content">
            <div class="qcc-admin-main">
                <?php if($t == 'dashboard_tab') {
                    global $wpdb; ?>

                    <h2 class="gb-h"><?php _e('Quick Event Calendar Overview', 'quick-event-calendar'); ?></h2>
                    <div class="qcc-video-container">
                    <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/981290390?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Quick Event Calendar Settings Overview"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
                    </div>

                    <?php
                    echo '<p>You are using Quick Event Calendar plugin version <strong>' . QEC_VERSION . '</strong>.</p>';
                } else if($t == 'configurator_tab') {
                    if(isset($_POST['isQCCSubmit'])) {
                        update_option('qcc_accent_colour', sanitize_text_field($_POST['qcc_accent_colour']));
                        update_option('qcc_day_colour', sanitize_text_field($_POST['qcc_day_colour']));
                        update_option('qcc_event_colour', sanitize_text_field($_POST['qcc_event_colour']));

                        echo '<div class="updated notice is-dismissible"><p>Settings updated successfully!</p></div>';
                    }
                    ?>
                    <form method="post" action="">
                        <h2><?php _e('Calendar Configurator', 'qcc'); ?></h2>
                        <p>The <b>Calendar configurator</b> allows you to select calendar colours to match your site design.</p>
                        <table class="form-table">
                            <tbody>
                                <tr>
                                    <th scope="row"><label>Calendar design</label></th>
                                    <td>
                                        <p>
                                            <input type="text" name="qcc_accent_colour" id="qcc_accent_colour" placeholder="#1e2833" class="qcc-color-picker" value="<?php echo get_option('qcc_accent_colour'); ?>" data-default-color="#1e2833"> <label for="qcc_accent_colour">Accent colour</label>
                                            <br><small><?php _e('The accent colour is used for selected dates background and hover states.', 'qcc'); ?></small>
                                        </p>
                                        <p>
                                            <input type="text" name="qcc_day_colour" id="qcc_day_colour" placeholder="#1e2833" class="qcc-color-picker" value="<?php echo get_option('qcc_day_colour'); ?>" data-default-color="#1e2833"> <label for="qcc_day_colour">Current day background colour</label>
                                            <br><small><?php _e('The current day colour is used for current date background.', 'qcc'); ?></small>
                                        </p>
                                        <p>
                                            <input type="text" name="qcc_event_colour" id="qcc_event_colour" placeholder="#1e2833" class="qcc-color-picker" value="<?php echo get_option('qcc_event_colour'); ?>" data-default-color="#1e2833"> <label for="qcc_event_colour">Event colour</label>
                                            <br><small><?php _e('The event colour is used for event dot indicators.', 'qcc'); ?></small>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <hr>
                        <p><input type="submit" name="isQCCSubmit" value="<?php _e('Save Changes', 'qcc'); ?>" class="button-primary"></p>
                    </form>
                <?php } else if($t == 'settings_tab') {
                    if(isset($_POST['isQCCSubmit'])) {
                        update_option('qcc_post_type', sanitize_text_field($_POST['qcc_post_type']));
                        update_option('qcc_category', (int) $_POST['qcc_category']);

                        update_option('qcc_show_published', (int) $_POST['qcc_show_published']);
                        update_option('qcc_show_scheduled', (int) $_POST['qcc_show_scheduled']);

                        update_option('qcc_use_date_meta', (int) $_POST['qcc_use_date_meta']);
                        update_option('qcc_date_meta_month', sanitize_text_field($_POST['qcc_date_meta_month']));
                        update_option('qcc_date_meta_day', sanitize_text_field($_POST['qcc_date_meta_day']));
                        update_option('qcc_date_meta_year', sanitize_text_field($_POST['qcc_date_meta_year']));
                        update_option('qcc_date_meta_start', sanitize_text_field($_POST['qcc_date_meta_start']));
                        update_option('qcc_date_meta_end', sanitize_text_field($_POST['qcc_date_meta_end']));

                        echo '<div class="updated notice is-dismissible"><p>Settings updated successfully!</p></div>';
                    }
                    ?>
                    <form method="post" action="">
                        <h2><?php _e('General Settings', 'qcc'); ?></h2>
                        <p><?php _e('These settings apply to the default behaviour of your calendar.', 'qcc'); ?></p>
                        <table class="form-table">
                            <tbody>
                                <tr>
                                    <th scope="row"><label for="qcc_post_type">(Custom) Post Type</label></th>
                                    <td>
                                        <p>
                                            <select name="qcc_post_type" id="qcc_post_type" placeholder="<?php _e('Select a custom post type...', 'qcc'); ?>">
                                                <option value="" disabled selected><?php _e('Select a custom post type...', 'qcc'); ?></option>
                                                <?php
                                                $qcc_post_type = get_option('qcc_post_type');

                                                $args = [
                                                    'public' => true,
                                                ];
                                                $post_types = get_post_types($args, 'names');
                                                foreach($post_types as $post_type) {
                                                    if($qcc_post_type == $post_type) {
                                                        $selected = 'selected';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                    echo '<option value="' . $post_type . '" ' . $selected . '>' . $post_type . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <br><small><?php _e('Use this (custom) post type as calendar event type.', 'qcc'); ?></small>
                                        </p>
                                        <p>
                                            <?php
                                            $qcc_category = get_option('qcc_category');

                                            $args = [
                                                'show_count'        => 1,
                                                'hide_empty'        => 0,
                                                'hierarchical'      => 1,
                                                'name'              => 'qcc_category',
                                                'taxonomy'          => 'category',
                                                'selected'          => $qcc_category,
                                            ];

                                            wp_dropdown_categories($args);
                                            ?>
                                            <br><small><?php _e('Use this category as calendar event category.', 'qcc'); ?></small>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="qcc_show_published">Visibility</label></th>
                                    <td>
                                        <p>
                                            <input type="checkbox" class="wppd-ui-toggle" name="qcc_show_published" id="qcc_show_published" value="1" <?php if(get_option('qcc_show_published') == 1) echo 'checked'; ?>> <label for="qcc_show_published"><?php _e('Show published posts', 'qcc'); ?></label><br>
                                            <small><?php _e('Show published posts in the calendar.', 'qcc'); ?></small><br>

                                            <input type="checkbox" class="wppd-ui-toggle" name="qcc_show_scheduled" id="qcc_show_scheduled" value="1" <?php if(get_option('qcc_show_scheduled') == 1) echo 'checked'; ?>> <label for="qcc_show_scheduled"><?php _e('Show scheduled/future posts', 'qcc'); ?></label><br>
                                            <small><?php _e('Show scheduled/future posts in the calendar.', 'qcc'); ?></small>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="qcc_use_date_meta">Date</label></th>
                                    <td>
                                        <p>
                                            <input type="checkbox" class="wppd-ui-toggle" name="qcc_use_date_meta" id="qcc_use_date_meta" value="1" <?php if(get_option('qcc_use_date_meta') == 1) echo 'checked'; ?>> <label for="qcc_use_date_meta"><?php _e('Use custom fields for date', 'qcc'); ?></label>
                                            <br><small><?php _e('Use existing custom fields for date (as opposed to post date). Use third party plugins to add custom meta data to your post types. Make sure your existing custom fields are numerical. If this option is checked, it will override the visibility options above.', 'qcc'); ?></small>
                                        </p>
                                        <p class="qcc_use_date_meta_hidden">
                                            <input type="text" class="regular-text" name="qcc_date_meta_month" id="qcc_date_meta_month" value="<?php echo get_option('qcc_date_meta_month'); ?>">
                                            <label for="qcc_date_meta_month"><?php _e('Month custom field name', 'qcc'); ?></label>
                                            <br><small><?php _e('Your Month custom field name.', 'qcc'); ?></small>
                                        </p>
                                        <p class="qcc_use_date_meta_hidden">
                                            <input type="text" class="regular-text" name="qcc_date_meta_day" id="qcc_date_meta_day" value="<?php echo get_option('qcc_date_meta_day'); ?>">
                                            <label for="qcc_date_meta_day"><?php _e('Day custom field name', 'qcc'); ?></label>
                                            <br><small><?php _e('Your Day custom field name.', 'qcc'); ?></small>
                                        </p>
                                        <p class="qcc_use_date_meta_hidden">
                                            <input type="text" class="regular-text" name="qcc_date_meta_year" id="qcc_date_meta_year" value="<?php echo get_option('qcc_date_meta_year'); ?>">
                                            <label for="qcc_date_meta_year"><?php _e('Year custom field name', 'qcc'); ?></label>
                                            <br><small><?php _e('Your Year custom field name.', 'qcc'); ?></small>
                                        </p>
                                        <p class="qcc_use_date_meta_hidden">
                                            <input type="text" class="regular-text" name="qcc_date_meta_start" id="qcc_date_meta_start" value="<?php echo get_option('qcc_date_meta_start'); ?>">
                                            <label for="qcc_date_meta_start"><?php _e('Start Time custom field name', 'qcc'); ?></label>
                                            <br><small><?php _e('Your Start Time custom field name.', 'qcc'); ?></small>
                                        </p>
                                        <p class="qcc_use_date_meta_hidden">
                                            <input type="text" class="regular-text" name="qcc_date_meta_end" id="qcc_date_meta_end" value="<?php echo get_option('qcc_date_meta_end'); ?>">
                                            <label for="qcc_date_meta_end"><?php _e('End Time custom field name', 'qcc'); ?></label>
                                            <br><small><?php _e('Your End Time custom field name.', 'qcc'); ?></small>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <hr>
                        <p><input type="submit" name="isQCCSubmit" value="<?php _e('Save Changes', 'qcc'); ?>" class="button-primary"></p>
                    </form>
                <?php } else if($t == 'documentation') { ?>
                    <h2 class="gb-h">Getting started with Quick Event Calendar</h2>

                    <p class="p"><b>Quick Event Calendar</b> is a lightweight, performant, and WordPress-integrated event calendar plugin. It allows you to display events, posts, or any other custom post type in a flexible, responsive calendar format. The calendar can be easily embedded into posts, pages, or widgets using shortcodes or template tags.</p>
                    <h3>Installation</h3>
                    <ul>
                    <li>Log in to your WordPress admin panel.</li>
                    <li>Go to <code>Plugins > Add New</code>.</li>
                    <li>Search for <code>“Quick Event Calendar”</code> and click <code>“Install Now”</code>.</li>
                    <li>After installation, click <code>“Activate”</code>.</li>
                    </ul>

                    <h3>Configuration</h3>
                    <p>Navigate to Settings > Quick Event Calendar.</p>
                    <p>In the <code>Settings</code> tab, select the desired post type (e.g., posts, events, or a custom post type) to display in the calendar.</p>
                    <p>If the selected post type is <code>“Posts”</code>, choose the desired category.</p>
                    <p>Select which posts you want to display in the calendar (published, scheduled, or future).</p>
                    <p>If you want to use custom meta fields, note that Quick Event Calendar works with preexisting custom meta fields. You may need to install a third-party plugin to add new custom fields.</p>
                    <p>In the <code>Configurator</code> tab, select the accent colour, the event colour and the background colour for the current day.</p>
                    <p>When you are done with the settings, use the <code>[qcc-calendar]</code> shortcode in any post, page or widget to show the calendar.</p>

                    <h3>Help with shortcodes</h3>
                    <p>Use the <code>[qcc-calendar]</code> shortcode in any post or page or widget to show the calendar.</p>
                    <p>Use the <code>[qcc-form]</code> shortcode in any post or page or widget to show the calendar submission form.</p>

                    <h3>Help with template tags</h3>
                    <p>Use the <code>&lt;?php echo do_shortcode("[qcc-calendar]"); ?&gt;</code> code in any page template to show the calendar.</p>
                    <p>Use the <code>&lt;?php echo do_shortcode("[qcc-form]"); ?&gt;</code> code in any page template to show the calendar submission form.</p>

                    <h3>Help with styling</h3>
                    <p>Use the included themes to style your calendar. Use the Default or the Flat theme to match your current WordPress theme appearance.</p>

                    <h3>Support</h3>
                    <p>If you encounter any issues or have questions regarding Quick Event Calendar, please <a href="https://wordpress.org/support/plugin/quick-event-calendar/">visit the plugin's support forum</a> or <br>
                    <a href="mailto:support@wpcorner.co">contact us</a> for assistance.</p>
                <?php } ?>
            </div>
            <div class="qcc-admin-sidebar">
            <div class="qcc-card">
            <h3><?php _e('Documentation', 'quick-event-calendar'); ?></h3>
            <p><?php _e('Get started by spending some time with the documentation to get familiar with Quick Event Calendar. The Documentation will cover all the information needed when using our plugin to build an amazing calendar, as well as some helpful tips and tricks that will make your experience easier and more enjoyable.', 'quick-event-calendar'); ?></p>
            <a href="<?php echo admin_url('options-general.php?page=qcc&tab=documentation'); ?>" class="button button-primary"><?php _e('Documentation', 'quick-event-calendar'); ?></a>
            </div>
                <div class="qcc-card">
                    <h3><?php _e('Need Help?', 'quick-event-calendar'); ?></h3>
                    <p><?php _e('Having issues or difficulties? Get help from the community on our support forum or contact us through our website contact form.', 'quick-event-calendar'); ?></p>
                    <a href="https://wordpress.org/support/plugin/quick-event-calendar/" class="button button-secondary"><?php _e('Visit Support Forum', 'quick-event-calendar'); ?></a>
                    <a href="https://wpcorner.co/contact" class="button button-secondary"><?php _e('Contact Support', 'quick-event-calendar'); ?></a>
                </div>
                <div class="qcc-card">
                    <h3 class="mot"><?php _e('Motivate us!', 'quick-event-calendar'); ?></h3>
                    <p><?php _e('Could you please do us a BIG favor and give it a 5-star rating on WordPress? This would boost our motivation and help other users make a comfortable decision while choosing the Quick Event Calendar.', 'quick-event-calendar'); ?></p>
                    <div class="star-rating">
                        <!-- Add star rating HTML here -->
                    </div>
                    <a href="https://wordpress.org/support/plugin/quick-event-calendar/reviews/#new-post" class="button button-secondary"><?php _e('Write a review', 'quick-event-calendar'); ?></a>
                </div>
            </div>
        </div>
    </div>
    <style>
        .qcc-admin-content {
            display: flex;
            margin-top: 20px;
        }
        .qcc-admin-main {
            flex: 1;
            background-color: #fff;
            padding: 20px;
            margin-right: 20px;
        }
        .qcc-admin-sidebar {
            width: 300px;
        }
        .qcc-card {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
        }
        .qcc-card h3 {
            margin-top: 0;
        }
        .qcc-card .button {
            display: inline-block;
            margin-top: 10px;
        }
        /* New styles to match all buttons with the Documentation button */
        .qcc-card .button-primary,
        .qcc-card .button-secondary {
            background-color: #0085ba;
            border-color: #0073aa #006799 #006799;
            color: #fff;
            text-decoration: none;
            text-shadow: 0 -1px 1px #006799, 1px 0 1px #006799, 0 1px 1px #006799, -1px 0 1px #006799;
        }
        .qcc-card .button-primary:hover,
        .qcc-card .button-secondary:hover {
            background-color: #008ec2;
            color: #fff;
            border-color: #006799;
        }
        .star-rating {
            /* Add star rating styles here */
        }
        .qcc-video-container {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
            max-width: 100%;
        }
        .qcc-video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
    <?php
}
