<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "vendor". DIRECTORY_SEPARATOR. "autoload.php";

use PilaLib\Database;
use PilaLib\Utilities;
use PilaLib\Auth;

$utils = new Utilities();
$auth = new Auth();

session_start();

$auth->isLogged($_SESSION['logged']);
$db = Database::getInstance()->getConnection();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
</head>
<body>
    <a href="logout.php">Odhlásit se</a>
</body>
</html>

