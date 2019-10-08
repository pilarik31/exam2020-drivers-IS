<?php
namespace PilaLib;

use PilaLib\Auth;

/**
 * Methods that can be used in custom shell.
 */
class Shell
{
    public function salt()
    {
        $auth = new Auth();

        $hashedPwd = $auth->generateHash('1sp3738');
        $verification = $auth->validatePassowrd('1sp3738',
        '$2y$11$l9YR27Whw4vhO2Xpw26eQ.NyvlbwO8bq91xRk232EoQT2bQl30mdO');

        echo("Hashed password: ${hashedPwd}" . PHP_EOL);
        echo("Is validation successful? ");
        echo $verification ? 'true' : 'false';
    }
}
