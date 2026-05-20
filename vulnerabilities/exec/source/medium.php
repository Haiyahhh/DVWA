<?php

if( isset( $_POST[ 'Submit' ]  ) ) {
	// Get input
	$target = $_REQUEST[ 'ip' ];
	$target = escapeshellarg($target);

	// Set blacklist
	// $substitutions = array(
	// 	'&&' => '',
	// 	';'  => '',
	// );

	// Remove any of the characters in the array (blacklist).
	// $target = str_replace( array_keys( $substitutions ), $substitutions, $target );

	// Determine OS and execute the ping command.
	if( stristr( php_uname( 's' ), 'Windows NT' ) ) {
		// Windows
		// nosemgrep: php.lang.security.exec-use.exec-use
		$cmd = shell_exec( 'ping  ' . $target );
	}
	else {
		// *nix
		// nosemgrep: php.lang.security.exec-use.exec-use
		$cmd = shell_exec( 'ping  -c 4 ' . $target );
	}

	// Feedback for the end user
	$html .= "<pre>{$cmd}</pre>";
}

?>
