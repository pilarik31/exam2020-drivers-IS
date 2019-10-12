<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

use PilaLib\Utilities;
use PilaLib\Auth;

$utils = new Utilities();
$auth = new Auth();

session_start();

// Login check
$auth->isLogged($_SESSION['logged']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="../dist/bundle.css">
</head>

<body>
    <?php include('partials/navbar.php') ?>

    <script src="../dist/bundle.js"></script>
</body>

</html>