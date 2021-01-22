<?php

namespace System\Database;

class Database
{
    protected $conection;

    public function __construct()
    {
        $this->getConection();
    }

    private function getConection()
    {
        try {
            $this->conection = new \PDO(
                DATABASE['driver'] . ":host=" . DATABASE['host'] .  ";port=" . DATABASE['port']  . ";dbname=" . DATABASE['database'],
                DATABASE['user'],
                DATABASE['password']
            );

            $this->conection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function run(string $sql)
    {
        $result =  $this->conection->query($sql)->fetchAll();
        return (object) $result[0];
    }
}
