<?php

// Function for learning how to add options
// SQL Query: SELECT * FROM wp_options WHERE option_name = "eventspractice_option";
function wpplugin_options() {

  add_option( 'eventspractice_option', 'My NEW Plugin Options' );
  update_option( 'eventspractice_option', 'My Updated Plugin Options' );
  // delete_option( 'eventspractice_option' );

}
add_action( 'admin_init', 'wpplugin_options' );
