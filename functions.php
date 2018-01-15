<?php 

function tnatheme_globals() {
	global $pre_path;
	global $pre_crumbs;
	if (substr($_SERVER['REMOTE_ADDR'], 0, 3) === '10.') {
		$pre_path = '';
		$pre_crumbs = array(
				'Jobs and opportunities' => '/'
			);
	} else {
		$pre_crumbs = array(
				'About us' => '/about/',
				'Jobs and opportunities' => '/about/jobs/'
			);
		$pre_path = '/about/jobs';
	}
}
tnatheme_globals();


function set_theme_capabilities() {
	$role = get_role( 'author' );

	/* remove "post" capabilities as posts aren't used in this section */
	$role->remove_cap( 'edit_posts' );
	$role->remove_cap( 'publish_posts' );
	$role->remove_cap( 'delete_posts' );
	$role->remove_cap( 'delete_published_posts' );
	$role->remove_cap( 'edit_published_posts' );

	/* add page capabilities */
	$role->add_cap( 'edit_pages' );
	$role->add_cap( 'edit_others_pages' );
	$role->add_cap( 'edit_published_pages' );
}
add_action ( 'admin_init', 'set_theme_capabilities' );


// Dequeue parent styles for re-enqueuing in the correct order
function dequeue_parent_style() {
	wp_dequeue_style( 'tna-styles' );
	wp_deregister_style( 'tna-styles' );
}
add_action( 'wp_enqueue_scripts', 'dequeue_parent_style', 9999 );
add_action( 'wp_head', 'dequeue_parent_style', 9999 );

// Enqueue styles in the correct order
function tna_child_styles() {
	wp_register_style( 'tna-parent-styles', get_template_directory_uri() . '/css/base-sass.css.min', array(),
		EDD_VERSION, 'all' );
	wp_register_style( 'tna-child-styles', get_stylesheet_directory_uri() . '/style.css', array(), '0.1', 'all' );
	wp_enqueue_style( 'tna-parent-styles' );
	wp_enqueue_style( 'tna-child-styles' );
}
add_action( 'wp_enqueue_scripts', 'tna_child_styles' );