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

?>