<?php
date_default_timezone_set("Asia/Taipei");
session_start();

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utft8;dbname=db11";
    protected $table;
    protected $pdo;

    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    private function a2s($array){
        foreach($array as $col => $value){
            tmp[]="`$col`='value'";
        }
    }
    private function sql_all($sql, $array, $other){}
    function all($where='', $other=''){}
    function count($where='', $other=''){}
    
    private function math($col, $where='', $other=''){}
    function sum($col='', $where='', $other=''){}
    function max($col, $where='', $other=''){}
    function min($col, $where='', $other=''){}

    function find($id){}
    function del($id){}
    function save($array){}

}
