<?php
namespace PilaLib;

use Exception;
use PilaLib\Database;

/**
 * Checking passwords, hashing
 */
class Auth
{

    // What the hell is Blowfish algo?!

    /**
    * Generate a secure hash for a given password. The cost is passed
    * to the blowfish algorithm. Check the PHP manual page for crypt to
    * find more information about this setting.
    *
    * @param string $password Password to hash.
    * @param int    $cost
    *
    * @return string
    */
    public function generateHash($password, $cost = 11)
    {
        /* To generate the salt, first generate enough random bytes. Because
         * base64 returns one character for each 6 bits, the we should generate
         * at least 22*6/8=16.5 bytes, so we generate 17. Then we get the first
         * 22 base64 characters
         */
        $salt = substr(base64_encode(openssl_random_pseudo_bytes(17)), 0, 22);
        /* As blowfish takes a salt with the alphabet ./A-Za-z0-9 we have to
         * replace any '+' in the base64 string with '.'. We don't have to do
         * anything about the '=', as this only occurs when the b64 string is
         * padded, which is always after the first 22 characters.
         */
        $salt=str_replace("+", ".", $salt);
        /* Next, create a string that will be passed to crypt, containing all
         * of the settings, separated by dollar signs
         */
        $param='$'.implode('$', array(
            "2y", //select the most secure version of blowfish (>=PHP 5.3.7)
            str_pad($cost, 2, "0", STR_PAD_LEFT), //add the cost in two digits
            $salt //add the salt
        ));
  
        //now do the actual hashing
        return crypt($password, $param);
    }

    /**
    * Check the password against a hash generated by the generateHash
    * function.
    *
    * @param string $password Password in plain text.
    * @param string $hash     Hash to check against.
    *
    * @return bool
    */
    public function validatePassowrd($password, $hash)
    {
        /* Regenerating the with an available hash as the options parameter should
         * produce the same hash if the same password is passed.
         */
        return crypt($password, $hash)==$hash;
    }

    public function isRegistered(string $mail, string $password)
    {
        $db = Database::getInstance()->getConnection();

        $query = "SELECT * FROM users WHERE email='${mail}'";
        if ($result = $db->query($query)) {
            while ($row = $result->fetch_assoc()) {
                $hashedPwd = $this->generateHash($row['password']);
                return $this->validatePassowrd(
                    $row['password'],
                    $hashedPwd
                );
            }
        }
    }

    public function isLogged($sessionInfo)
    {
        if (!$sessionInfo) {
            return header("Location: login.php");
        }
        return true;
    }
}