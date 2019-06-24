<?php
#
# set error handling
#
define('ENVIRONMENT', 'dev');
#
# errors are visible
#
if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev')
{
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    define('DB_TYPE', 'mysql');
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'dents');
	define('DB_USER', 'root');
	define('DB_PASS', 'root');
	define('DB_CHARSET', 'utf8');
	define('DB_PORT', '3306');
}
#
# errors are not visible
#
elseif (ENVIRONMENT == 'production' || ENVIRONMENT == 'prod')
{
    ini_set("display_errors", 0);

    define('DB_TYPE', 'mysql');
	define('DB_HOST', 'sql312.byethost.com');
	define('DB_NAME', 'b31_17483903_dental');
	define('DB_USER', 'b31_17483903');
	define('DB_PASS', 'tutulegleg');
	define('DB_CHARSET', 'utf8');
	define('DB_PORT', '3306');
}
#
# do not change anything here
#
define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', '//');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);
define('UPLOADS', $_SERVER['DOCUMENT_ROOT'] . URL_SUB_FOLDER . 'uploads/');
define('BACKUP', $_SERVER['DOCUMENT_ROOT'] . URL_SUB_FOLDER . 'backup/');

define('UPLOAD_URL', URL . 'uploads/');
#
# version handling for scripts to reload and not cache
#
define('VERSION', '0.2');
#
# application's title. this should be in every HTML title
#
define('TITLE', 'Dental Clinic by Rod Ortega :: ');
#
# this will be used as timezone in every PHP datetime NOW
#
date_default_timezone_set("Asia/Manila");
#
# database configuration
#
#
# json function
#
require APP . 'Libs/Json.php';
#
# cryptography credentials: do not share this to public
#
define('AES_256_CBC', 'aes-256-cbc');
define('KEY', 'insertthirtytwocharactersonlypls');
define('IV', 'insert16charspls');
require APP . 'Libs/Crypto.php';
#
?>