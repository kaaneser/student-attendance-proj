<?php

namespace Core;

class Database 
{
    public $connect;

    public function __construct()
    {
        $this->connect = new \PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_e04f12e14acaf9a;', 'bbf3b4339ae80d', '5cdd0edf');
        $this->connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql, $multi = false)
    {
        if ($multi == false) {
            return $this->connect->query($sql, \PDO::FETCH_ASSOC)->fetch() ?? [];
        } else {
            return $this->connect->query($sql, \PDO::FETCH_ASSOC)->fetchAll() ?? [];
        }
    }

    public function transaction()
    {
        return $this->connect->beginTransaction();
    }

}