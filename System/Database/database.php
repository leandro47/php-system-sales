<?php

namespace System\Database;

class Database
{
    protected $conn;
    protected $table;

    public function __construct()
    {
        $this->setConnection();
    }

    private function setConnection()
    {
        try {
            $this->conn = new \PDO(DATABASE['driver'] . ":host=" . DATABASE['host'] . ";port=" . DATABASE['port']  . ";dbname=" . DATABASE['database'], DATABASE['user'], DATABASE['password']);

            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die($e->getCode() .  " - " . $e->getMessage());
        }
    }
}
