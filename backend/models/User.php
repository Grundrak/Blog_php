<?php
require_once '../config/config_db.php';

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
}
