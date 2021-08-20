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
		"show_in_menu" => "eventspractice",
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
	];

	register_post_type( "event", $args );
}

add_action( 'init', 'eventspractice_init' );

/* Meta box setup function. */
function smashing_post_meta_boxes_setup() {

	/* Add meta boxes on the 'add_meta_boxes' hook. */
	add_action( 'add_meta_boxes', 'smashing_add_post_meta_boxes' );
	/* Save post meta on the 'save_post' hook. */
	add_action( 'save_post', 'smashing_save_post_class_meta', 10, 2 );
  }

/* Create one or more meta boxes to be displayed on the post editor screen. */
function smashing_add_post_meta_boxes() {

	add_meta_box(
	  'smashing-post-class',      // Unique ID
	  esc_html__( 'Post Class', 'eventspractice' ),    // Title
	  'smashing_post_class_meta_box',   // Callback function
	  'event',         // Admin page (or post type)
	  'side',         // Context
	  'default'         // Priority
	);
  }

/* Display the post meta box. */
function smashing_post_class_meta_box( $post ) { ?>

	<?php wp_nonce_field( basename( __FILE__ ), 'smashing_post_class_nonce' ); ?>
  
	<p>
	  <label for="smashing-post-class"><?php _e( "Add a custom CSS class, which will be applied to WordPress' post class.", 'eventspractice' ); ?></label>
	  <br />
	  <input class="widefat" type="text" name="smashing-post-class" id="smashing-post-class" value="<?php echo esc_attr( get_post_meta( $post->ID, 'smashing_post_class', true ) ); ?>" size="30" />
	</p>
  <?php }


/* Save the meta box’s post metadata. */
function smashing_save_post_class_meta( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['smashing_post_class_nonce'] ) || !wp_verify_nonce( $_POST['smashing_post_class_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['smashing-post-class'] ) ? sanitize_html_class( $_POST['smashing-post-class'] ) : ’ );

  /* Get the meta key. */
  $meta_key = 'smashing_post_class';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  if ( isset( $new_meta_value ) ) {
	update_post_meta( $post_id, $meta_key, $new_meta_value );
  } 

 
}

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'smashing_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'smashing_post_meta_boxes_setup' );