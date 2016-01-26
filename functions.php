<?php
/* DEFINE SITE VARIABLES
*/

function tnatheme_globals() {
    global $tnatheme;
    $tnatheme['ischildsite'] = 1;
    $tnatheme['childsitename'] = 'Jobs and opportunities';
    if (substr($_SERVER['REMOTE_ADDR'], 0, 3) === '10.') {
        $tnatheme['subsitepath'] = '';
        $tnatheme['subsitepatharr'] = array();
    } else {
        $tnatheme['subsitepath'] = '/about/jobs';
        /* array containing the path to the root with trailing slash - example below */
        $tnatheme['subsitepatharr'] = array(
            'About us' => '/about/'
        );
    }
}
tnatheme_globals();
/*
 *
 * ================================================================================================
 *              Removing Metaboxes & Post Tags from Child Theme
 * ================================================================================================
 *
 */


// REMOVE POST META BOXES
if (!function_exists('remove_page_metaboxes')) {
    function remove_page_metaboxes() {
        remove_meta_box('commentstatusdiv', 'page', 'normal'); // Comments Metabox
        remove_meta_box('trackbacksdiv', 'page', 'normal'); // Talkback Metabox
        remove_meta_box('slugdiv', 'page', 'normal'); // Slug Metabox
        remove_meta_box('authordiv', 'page', 'normal'); // Author Metabox
        remove_meta_box('postimagediv', 'page', 'normal'); // Featured Image Metabox
        remove_meta_box('postcustom', 'page', 'normal');
        remove_meta_box('commentsdiv', 'page', 'normal');
    }
}
add_action('admin_menu','remove_page_metaboxes');



/*
 *
 * ================================================
 *    Override unneeded functions from parent
 * ================================================
 *
 */


function education_resource_init () {
	// remove
}
function create_post_type () {
	// remove
}
function create_post_type2 () {
	// remove
}
function get_indicator () {
	// remove
}
function get_glossary () {
	// remove
}
function guidance_init () {
	// remove
}
function m_explode () {
	// remove
}
function banner_messages () {
	// remove
}
function create_events_cpt () {
	// remove
}
function include_template_function () {
	// remove
}
function flexslider_shortcode () {
	// remove
}
