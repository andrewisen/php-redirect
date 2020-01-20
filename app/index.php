<?php
	define('WPIZED_AUTH_USER', 'admin');
	define('WPIZED_AUTH_PASS', 'password');
	define('WPIZED_URL', 'https://google.com/');

	header( 'Cache-Control: no-cache, must-revalidate, max-age=0' );

	$has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
	$is_not_authenticated = (
		!$has_supplied_credentials ||
		$_SERVER['PHP_AUTH_USER'] != WPIZED_AUTH_USER ||
		$_SERVER['PHP_AUTH_PW']   != WPIZED_AUTH_PASS
	);

	$unauthorized = "<h1>Unauthorized</h1><p>Wrong password!</p>";

	if( $is_not_authenticated ){
		header( 'HTTP/1.1 401 Authorization Required' );
		header( sprintf('WWW-Authenticate: Basic realm="Please sign in"', WPIZED_AUTH_USER, WPIZED_AUTH_PASS) );
			
		if (!$has_supplied_credentials) {
			echo $unauthorized;
		}
		else {
			echo $unauthorized;
		}
	}
	else {
		header("Location: " . WPIZED_URL);
	}
?>