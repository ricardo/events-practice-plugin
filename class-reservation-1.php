<?php

if ( !class_exists( 'Events_Practice_Reservation' ) ) {
	class Events_Practice_Reservation {
        
        public function __construct(){
            // register_activation_hook( 
            //     __FILE__, 
            //     array( $this, 'create_reservations_table' ) 
            // );
        }

        static function create_reservations_table(){
            global $wpdb;
            $table_name = $wpdb->prefix . 'eventspractice_reservations'; 
            $charset_collate = $wpdb->get_charset_collate();

            $sql = "CREATE TABLE $table_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                name tinytext NOT NULL,
                last_name tinytext NOT NULL,
                email tinytext NOT NULL,
                event_id bigint(20) NOT NULL,
                PRIMARY KEY  (id)
              ) $charset_collate;";
              
              require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
              dbDelta( $sql );

              echo "TEST";
        }
    }
}
