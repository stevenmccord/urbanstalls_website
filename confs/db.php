<?php
$host = $_SERVER["HTTP_HOST"];
//local variables
if ($host == "www.localhost.com" || $host == "localhost:8080"){
	define('DB_NAME', 'urban');
	/** MySQL database username */
	define('DB_USER', 'wordpress');
	/** MySQL database password */
	define('DB_PASSWORD', 'smurfmurph');
	/** MySQL hostname */
	define('DB_HOST', '127.0.0.1');
	/** Database Charset to use in creating database tables. */
	define('DB_CHARSET', 'utf8');
	/** The Database Collate type. Don't change this if in doubt. */
	define('DB_COLLATE', '');
//remote variables
}else{
	define('DB_NAME', 'urban');
	/** MySQL database username */
	define('DB_USER', 'wordpress');
	/** MySQL database password */
	define('DB_PASSWORD', 'smurfmurph');
	/** MySQL hostname */
	define('DB_HOST', 'us-cdbr-iron-east-02.cleardb.net');
	/** Database Charset to use in creating database tables. */
	define('DB_CHARSET', 'utf8');
	/** The Database Collate type. Don't change this if in doubt. */
	define('DB_COLLATE', '');
}
?>