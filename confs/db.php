<?php
$host = $_SERVER["HTTP_HOST"];
//remote variables
if ($host == "urbanstalls.herokuapp.com"){
	define('DB_NAME', 'heroku_c93eb6e13dfc629');
	/** MySQL database username */
	define('DB_USER', 'b25646bfd625db');
	/** MySQL database password */
	define('DB_PASSWORD', '9994db5d');
	/** MySQL hostname */
	define('DB_HOST', 'us-cdbr-iron-east-02.cleardb.net');
	/** Database Charset to use in creating database tables. */
	define('DB_CHARSET', 'utf8');
	/** The Database Collate type. Don't change this if in doubt. */
	define('DB_COLLATE', '');
//local variables
}else{
	define('DB_NAME', 'urbanstalls');
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
}
?>