<?php

function eventspractice_init() {

	/**
	 * Post Type: Events.
	 */

	$labels = [
		"name" => __( "Events", "eventspractice" ),
		"singular_name" => __( "Event", "eventspractice" ),
		"menu_name" => __( "My Events", "eventspractice" ),
		"all_items" => __( "All Events", "eventspractice" ),
		"add_new" => __( "Add new", "eventspractice" ),
		"add_new_item" => __( "Add new Event", "eventspractice" ),
		"edit_item" => __( "Edit Event", "eventspractice" ),
		"new_item" => __( "New Event", "eventspractice" ),
		"view_item" => __( "View Event", "eventspractice" ),
		"view_items" => __( "View Events", "eventspractice" ),
		"search_items" => __( "Search Events", "eventspractice" ),
		"not_found" => __( "No Events found", "eventspractice" ),
		"not_found_in_trash" => __( "No Events found in trash", "eventspractice" ),
		"parent" => __( "Parent Event:", "eventspractice" ),
		"featured_image" => __( "Featured image for this Event", "eventspractice" ),
		"set_featured_image" => __( "Set featured image for this Event", "eventspractice" ),
		"remove_featured_image" => __( "Remove featured image for this Event", "eventspractice" ),
		"use_featured_image" => __( "Use as featured image for this Event", "eventspractice" ),
		"archives" => __( "Event archives", "eventspractice" ),
		"insert_into_item" => __( "Insert into Event", "eventspractice" ),
		"uploaded_to_this_item" => __( "Upload to this Event", "eventspractice" ),
		"filter_items_list" => __( "Filter Events list", "eventspractice" ),
		"items_list_navigation" => __( "Events list navigation", "eventspractice" ),
		"items_list" => __( "Events list", "eventspractice" ),
		"attributes" => __( "Events attributes", "eventspractice" ),
		"name_admin_bar" => __( "Event", "eventspractice" ),
		"item_published" => __( "Event published", "eventspractice" ),
		"item_published_privately" => __( "Event published privately.", "eventspractice" ),
		"item_reverted_to_draft" => __( "Event reverted to draft.", "eventspractice" ),
		"item_scheduled" => __( "Event scheduled", "eventspractice" ),
		"item_updated" => __( "Event updated.", "eventspractice" ),
		"parent_item_colon" => __( "Parent Event:", "eventspractice" ),
	];

	$args = [
		"label" => __( "Events", "eventspractice" ),
		"labels" => $labels,
		"description" => "An events CPT to practice plugin development.",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "eventspractice",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "event", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
		"menu_icon" => "dashicons-calendar-alt",
	];

	register_post_type( "event", $args );
}

add_action( 'init', 'eventspractice_init' );

/* Meta box setup function. */
function eventspractice_post_meta_boxes_setup() {

	/* Add meta boxes on the 'add_meta_boxes' hook. */
	add_action( 'add_meta_boxes', 'eventspractice_add_post_meta_boxes' );
	/* Save post meta on the 'save_post' hook. */
	add_action( 'save_post', 'eventspractice_save_post_class_meta', 10, 2 );
  }

/* Create one or more meta boxes to be displayed on the post editor screen. */
function eventspractice_add_post_meta_boxes() {

	add_meta_box(
	  'eventspractice-number-attendees',      // Unique ID
	  esc_html__( 'Number of attendees', 'eventspractice' ),    // Title
	  'eventspractice_number_attendees_meta_box',   // Callback function
	  'event',         // Admin page (or post type)
	  'side',         // Context
	  'default'         // Priority
	);

	add_meta_box(
		'eventspractice-location',      // Unique ID
		__( 'Location', 'eventspractice' ),    // Title
		'eventspractice_location_meta_box',   // Callback function
		'event',         // Admin page (or post type)
		'side',         // Context
		'default'         // Priority
	  );

	  add_meta_box(
		'eventspractice-date',      // Unique ID
		__( 'Date', 'eventspractice' ),    // Title
		'eventspractice_date_meta_box',   // Callback function
		'event',         // Admin page (or post type)
		'side',         // Context
		'default'         // Priority
	  );
  }

/* Display the post meta box. */
function eventspractice_number_attendees_meta_box( $post ) { ?>

	<?php wp_nonce_field( basename( __FILE__ ), 'eventspractice_number_attendees_nonce' ); ?>
  
	<p>
	  <label for="eventspractice-number-attendees"><?php _e( "Maximum number of attendees for this event.", 'eventspractice' ); ?></label>
	  <br />
	  <input class="widefat" type="text" name="eventspractice-number-attendees" id="eventspractice-number-attendees" value="<?php echo esc_attr( get_post_meta( $post->ID, 'eventspractice-number-attendees', true ) ); ?>" size="30" />
	</p>
  <?php }

function eventspractice_location_meta_box( $post ) { ?>

	<?php wp_nonce_field( basename( __FILE__ ), 'eventspractice_location_nonce' ); ?>
  
	<p>
	  <label for="eventspractice-location"><?php _e( "Address for this event.", 'eventspractice' ); ?></label>
	  <br />
	  <input class="widefat" type="text" name="eventspractice-location" id="eventspractice-location" value="<?php echo esc_attr( get_post_meta( $post->ID, 'eventspractice-location', true ) ); ?>" size="30" />
	</p>
  <?php }

function eventspractice_date_meta_box( $post ) { ?>

	<?php wp_nonce_field( basename( __FILE__ ), 'eventspractice_date_nonce' ); ?>
  
	<p>
	  <label for="eventspractice-date"><?php _e( "Date for this event.", 'eventspractice' ); ?></label>
	  <br />
	  <input class="widefat" type="text" name="eventspractice-date" id="eventspractice-date" value="<?php echo esc_attr( get_post_meta( $post->ID, 'eventspractice-date', true ) ); ?>" size="30" />
	</p>
  <?php }

/* Save the meta box’s post metadata. */
function eventspractice_save_post_class_meta( $post_id, $post ) {

	/* Verify the nonce before proceeding. */
	if ( !isset( $_POST['eventspractice_number_attendees_nonce'] ) || !wp_verify_nonce( $_POST['eventspractice_number_attendees_nonce'], basename( __FILE__ ) ) )
		return $post_id;

	if ( !isset( $_POST['eventspractice_location_nonce'] ) || !wp_verify_nonce( $_POST['eventspractice_location_nonce'], basename( __FILE__ ) ) )
		return $post_id;

	if ( !isset( $_POST['eventspractice_date_nonce'] ) || !wp_verify_nonce( $_POST['eventspractice_date_nonce'], basename( __FILE__ ) ) )
		return $post_id;

	/* Get the post type object. */
	$post_type = get_post_type_object( $post->post_type );

	/* Check if the current user has permission to edit the post. */
	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;

	/* Get the posted data and sanitize it for use as an HTML class. */
	$new_meta_value_number_attendees = ( isset( $_POST['eventspractice-number-attendees'] ) ? sanitize_text_field( $_POST['eventspractice-number-attendees'] ) : ’ );
	$new_meta_value_location = ( isset( $_POST['eventspractice-location'] ) ? sanitize_text_field( $_POST['eventspractice-location'] ) : ’ );
	$new_meta_value_date = ( isset( $_POST['eventspractice-date'] ) ? sanitize_text_field( $_POST['eventspractice-date'] ) : ’ );

	/* Get the meta key. */
	$meta_key_number_attendees = 'eventspractice-number-attendees';
	$meta_key_location = 'eventspractice-location';
	$meta_key_date = 'eventspractice-date';

	/* Get the meta value of the custom field key. */
	$meta_value_number_attendees = get_post_meta( $post_id, $meta_key_number_attendees, true );
	$meta_value_location = get_post_meta( $post_id, $meta_key_location, true );
	$meta_value_date = get_post_meta( $post_id, $meta_key_date, true );

	if ( isset( $new_meta_value_number_attendees ) ) {
		update_post_meta( $post_id, $meta_key_number_attendees, $new_meta_value_number_attendees );
	} 
	if ( isset( $meta_value_location ) ) {
		update_post_meta( $post_id, $meta_key_location, $new_meta_value_location );
	} 
	if ( isset( $meta_value_date ) ) {
		update_post_meta( $post_id, $meta_key_date, $new_meta_value_date );
	} 
}

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'eventspractice_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'eventspractice_post_meta_boxes_setup' );

/* Display custom posts at the end of content on CPT */

function eventspractice_add_to_content( $content ) {   
	
	$number_attendees = get_post_meta( get_the_ID(), 'eventspractice-number-attendees', true );
	$location = get_post_meta( get_the_ID(), 'eventspractice-location', true );
	$date = get_post_meta( get_the_ID(), 'eventspractice-date', true );
	
    if( is_single( ) && 'event' == get_post_type() ) {
		$content .= '<hr class="wp-block-separator"/>';
        $content .= '<div class="eventspractice-metadata"><ul>';
        $content .= "<li><strong>" . esc_html__('Max. Number of Attendees:', 'eventspractice') . "</strong> " . esc_attr($number_attendees) . "</li>";
        $content .= "<li><strong>" . esc_html__('Location:', 'eventspractice') . "</strong> " .  esc_attr($location) . "</li>";
        $content .= "<li><strong>" . esc_html__('Date:', 'eventspractice') . "</strong> ".  esc_attr($date) . "</li>";
        $content .= '</ul></div>';
		$content .= '<hr class="wp-block-separator"/>';

    }
    return $content;
}
add_filter( 'the_content', 'eventspractice_add_to_content' );