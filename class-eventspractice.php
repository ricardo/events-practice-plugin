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
