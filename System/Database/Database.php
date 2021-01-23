<?php

namespace System\Database;

use Exception;

class Database
{
    protected $conection;
    protected $table;

    public function __construct()
    {
        $this->getConection();
    }

    // ==================================================

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

    // ==================================================

    protected function run(string $sql)
    {
        $result =  $this->conection->query($sql)->fetchAll();
        return $result;
    }

    // ==================================================

    protected function get()
    {
        $sql = "SELECT * FROM {$this->table} order by id desc";
        return $this->conection->query($sql)->fetchAll();
    }

    // ==================================================

    protected function insert(array $datas)
    {
        $fields = array_keys($datas);
        $fields = implode(", ", $fields);

        $bind = [];
        foreach ($datas as $data)
            $bind[] = "?";

        $bind = implode(", ", $bind);

        $query = "INSERT INTO {$this->table} ({$fields}) VALUES ({$bind})";

        $pre = $this->conection->prepare($query);

        try {
            $pre->execute(array_values($datas));
            return (int) $this->conection->lastInsertId();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // ==================================================

    protected function update(int $id, array $datas)
    {
        $fields = implode("=?, ", array_keys($datas)) . '= ?';

        $query = "UPDATE {$this->table} set {$fields} where id = {$id}";
        $pre = $this->conection->prepare($query);

        try {
            $pre->execute(array_values($datas));
            return false;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // ==================================================

    protected function delete(int $id)
    {
        $query = "DELETE FROM {$this->table} where id = ?";
        $pre = $this->conection->prepare($query);

        try {
            $pre->execute([$id]);
            return false;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
