<?php
date_default_timezone_set("Asia/Taipei");
session_start();

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db09";
    protected $table;
    protected $pdo;

    function q($sql){}
    private
}
