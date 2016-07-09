<?php
	## Misc Settings
	$baseurl = "http://localhost/theGamesDb";
	$apache_type = "windows";  // Types are unix or windows

	## DB Settings
	$db_user = "root"; // Database Username
	$db_password = ""; // Database Password
	$db_database = "tgdb-dev"; // Database Name
	$db_server = "localhost"; // Usually Localhost

	## Mail Settings
	$mail_server = "localhost";
	$mail_username = "";
	$mail_password = "";

	## Recaptcha Settings
	// (Developers will need to get their own keys from recaptcha, if you are running from 'localhost' try making the key usable for 'all domains')
	$recpatcha_publickey = "";
    $recaptcha_privatekey = "";

    ## Timezone Settings
	date_default_timezone_set('UTC'); 
?>
