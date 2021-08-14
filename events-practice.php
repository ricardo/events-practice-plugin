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

 // Define plugin URL as a constant
 define( 'EVENTSPRACTICE_URL', plugin_dir_url( __FILE__ ) );

include( plugin_dir_path( __FILE__ ). 'includes/eventspractice-menus.php' );

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