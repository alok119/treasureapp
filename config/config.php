<?php

//Note: This file should be included first in every php page.
error_reporting(E_ALL);
ini_set('display_errors', 'On');
define('BASE_PATH', dirname(dirname(__FILE__)));
define('APP_FOLDER', 'simpleadmin');
define('CURRENT_PAGE', basename($_SERVER['REQUEST_URI']));

require_once BASE_PATH . '/lib/MysqliDb/MysqliDb.php';
require_once BASE_PATH . '/helpers/helpers.php';

/*
|--------------------------------------------------------------------------
| DATABASE CONFIGURATION
|--------------------------------------------------------------------------
 */

// define('DB_HOST', "localhost");
// define('DB_USER', "DevUser");
// define('DB_PASSWORD', "root@2020");
// define('DB_NAME', "churchadmin");

define('DB_HOST', "rimonobdc.com");
define('DB_USER', "rimonobd_treasus");
define('DB_PASSWORD', "$@J,bcPtM@if");
define('DB_NAME', "rimonobd_mainchurchtreasuryapp");

// define('DB_USER', "root");
// define('DB_PASSWORD', "");
// define('DB_NAME', "churchadmin");

function getDbInstance()
{
    return new MysqliDb(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
}