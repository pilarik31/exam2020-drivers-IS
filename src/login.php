<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";
use PilaLib\Auth;
use PilaLib\Utilities;

$utils = new Utilities();
$auth = new Auth();

session_start();
if (!isset($_SESSION['logged'])) {
    $_SESSION['logged'] = false;
}
if (!isset($_SESSION['mail'])) {
    $_SESSION['mail'] = "";
}

if ($_SESSION['logged']) {
    header("Location: index.php");
}

$submit = filter_input(INPUT_POST, 'submit');

if (isset($submit)) {
    $formMail = filter_input(INPUT_POST, 'loginMail');
    $formPassword = filter_input(INPUT_POST, 'loginPassword');
    $status = $auth->isRegistered($formMail, $formPassword);
    if ($status) {
        $_SESSION['mail'] = $formMail;
        $_SESSION['logged'] = true;
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../dist/bundle.css">
</head>

<body>
    <div id="login-wrapper">
        <div id="" class=" fadeInDown">
            <div id="formContent">
                <!-- Tabs Titles -->

                <!-- Icon -->
                <div class="fadeIn first">
                    <img src="../dist/img/truck.png" id="icon" alt="User Icon" />
                </div>

                <!-- Login Form -->
                <form method="POST" action="">
                    <input type="text" id="login" class="fadeIn second" name="loginMail"
                        placeholder="Přihlašovací jméno">
                    <input type="password" id="password" class="fadeIn third" name="loginPassword" placeholder="Heslo">
                    <input type="submit" class="fadeIn fourth" value="Přihlásit se" name="submit">
                </form>

                <!-- Remind Passowrd -->
                <div id="formFooter">
                    <a class="underlineHover" href="#">Zapomenuté heslo? Kontaktuje administrátora!</a>
                </div>

            </div>
        </div>
    </div>



    <script src="../dist/bundle.js"></script>

</body>

</html>