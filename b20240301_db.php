<?php
date_default_timezone_set("Asia/Taipei");
session_start();

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db09";
    protected $pdo;
    protected $table;

    public function __construct($table)
    {
    }

    function q($sql)
    {
    }
    private function a2s($array)
    {
    }
    private function sql_all($sql, $array, $other)
    {
    }

    function all($where = '', $other = '')
    {
    }
    function count($where = '', $other = '')
    {
    }
    private function math($math, $col, $array = '', $other = '')
    {
    }
    function sum($col = '', $where = '', $other = '')
    {
    }
    function max($col, $where='', $other='')
    {
    }
    function min($col, $where='', $other='')
    {
    }

    function find($id)
    {
    }
    function del($id)
    {
    }
    function save($array)
    {
    }
}
