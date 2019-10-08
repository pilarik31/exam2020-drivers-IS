<?php
require_once 'vendor/autoload.php';

use PilaLib\Database;
use PilaLib\Migration;
use PilaLib\Utilities;
use PilaLib\Auth;

$utils = new Utilities();
$auth = new Auth();
$db = Database::getInstance()->getConnection();
$migration = new Migration();

$migration->createUsersTable();


