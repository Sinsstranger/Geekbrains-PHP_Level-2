<?php

namespace app\models;
use app\interfaces\{IModel,ILog};
use app\engine\Db;

abstract class Model implements IModel, ILog
{

    protected $db;


    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function log($str)
    {
        echo $str;
    }

    abstract public function getTableName();


    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

}