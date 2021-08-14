<?php
/**
 * Plugin Name:       Events Practice
 * Plugin URI:        https://github.com/AtrumGeost/events-practice-plugin
 * Description:       A plugin to practice for the Dev. App.
 * Version:           0.0.1
 * Author:            Jorge Calle
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       eventspractice
 * Domain Path:       /languages
 */

 // If this file is called directly, abort
 if ( ! defined( 'WPINC' ) ) {
     die;
 }

 // Add page to WP Admin
 function eventspractice_settings_page()
 {
     add_menu_page(
         'Events Practice',
         'Events Practice',
         'manage_options',
         'eventspractice',
         'eventspractice_settings_page_markup',
         'dashicons-calendar-alt',
         100
     );
 }
add_action( 'admin_menu', 'eventspractice_settings_page' );

// Display content for the admin page
function eventspractice_settings_page_markup()
{
    // Double check user capabilities
    if ( !current_user_can('manage_options') ) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( get_admin_page_title(), 'eventspractice' ); ?></h1>
        <p><?php esc_html_e( 'Some content.', 'eventspractice' ); ?></p>
    </div>
    <?php
}

?>