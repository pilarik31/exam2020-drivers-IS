<?php
namespace PilaLib;

class Migration extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = parent::getInstance()->getConnection();
        
    }

    public function run()
    {
        echo "Migrating table \"users\"." . PHP_EOL;
        $this->createUsersTable();
    }

    private function createUsersTable()
    {
        $sql = "CREATE TABLE users (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";
        return $this->db->query($sql);
    }
}
