<?php

namespace app\models;

class Users extends Model
{
    public int $id;
    public string $login;
    public mixed $pass;

    public function getTableName()
    {
        return 'users';
    }
}