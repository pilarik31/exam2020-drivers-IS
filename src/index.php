<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "vendor". DIRECTORY_SEPARATOR. "autoload.php";

use PilaLib\Database;
use PilaLib\Utilities;
use PilaLib\Auth;

$utils = new Utilities();
$auth = new Auth();
$db = Database::getInstance()->getConnection();



