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


// Adds page hide snippet from Google Optimize to <head> for A/B testing. Note: Only adds it to the front-page
function ab_test_page_hide() {

	if(is_front_page()) {

	?>
	<!-- Page hiding snippet (recommended) -->
	<style>.async-hide {
			opacity: 0 !important
		} </style>
	<script>
        (function (a, s, y, n, c, h, i, d, e) {
            s.className += ' ' + y;
            h.end = i = function () {
                s.className = s.className.replace(RegExp(' ?' + y), '')
            };
            (a[n] = a[n] || []).hide = h;
            setTimeout(function () {
                i();
                h.end = null
            }, c);
        })(window, document.documentElement, 'async-hide', 'dataLayer', 4000, {'GTM-T8DSWV': true});
	</script>

	<?php
    }
}
add_action('wp_head', 'ab_test_page_hide');