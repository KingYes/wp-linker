<?php
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';

$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir )
	$_tests_dir = '/tmp/wordpress-tests-lib';

require_once $_tests_dir . '/includes/functions.php';

tests_add_filter(
	'muplugins_loaded',
	function() {
		// Manually load plugin
		require dirname( dirname( __FILE__ ) ) . '/linker.php';
	}
);

// Removes all sql tables on shutdown
// Do this action last
tests_add_filter( 'shutdown', 'drop_tables', 999999 );

require $_tests_dir . '/includes/bootstrap.php';