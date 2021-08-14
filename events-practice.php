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

 // Add pages to WP Admin
 function eventspractice_settings_page()
 {
     add_menu_page(
         __( 'Events Practice', 'eventspractice' ),
         __( 'Events Practice', 'eventspractice' ),
         'manage_options',
         'eventspractice',
         'eventspractice_settings_page_markup',
         'dashicons-calendar-alt',
         25
     );

     add_submenu_page(
        'eventspractice',
        __( 'Events', 'eventspractice' ),
        __( 'Events', 'eventspractice' ),
        'manage_options',
        'wpplugin-events',
        'eventspractice_settings_subpage_markup'
     );

     add_submenu_page(
        'eventspractice',
        __( 'RSVPs', 'eventspractice' ),
        __( 'RSVPs', 'eventspractice' ),
        'manage_options',
        'wpplugin-rsvps',
        'eventspractice_settings_subpage_markup'
     );

     add_submenu_page(
        'eventspractice',
        __( 'Settings', 'eventspractice' ),
        __( 'Settings', 'eventspractice' ),
        'manage_options',
        'wpplugin-settings',
        'eventspractice_settings_subpage_markup'
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

// Display content for the admin subpages
function eventspractice_settings_subpage_markup()
{
    // Double check user capabilities
    if ( !current_user_can('manage_options') ) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( get_admin_page_title(), 'eventspractice' ); ?></h1>
        <p><?php esc_html_e( 'Some subpage content.', 'eventspractice' ); ?></p>
    </div>
    <?php
}

// Add link to the settings page below the plugin description
function eventspractice_add_settings_link( $links )
{
    $settings_link = '<a href="admin.php?page=wpplugin-settings">' . esc_html__( 'Settings', 'eventspractice' ) . '</a>';
    array_push( $links, $settings_link );
    return $links;
}
$filter_name = "plugin_action_links_" . plugin_basename( __FILE__ );
add_filter( $filter_name, 'eventspractice_add_settings_link' );

?>