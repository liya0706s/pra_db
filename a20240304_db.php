<?php
date_default_timezone_set("Asia/Taipei");
session_start();

class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db09";
    protected $pdo;
    protected $table;

    public function __construct($table)
    {
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    private function a2s($array){
        foreach($array as $col => $value){
            $tmp[]="`$col`='$value'";
        }
        return $tmp;
    }
    private function sql_all($sql, $array, $other){
        if(isset($this->table) && !empty($this->table)){
            if(is_array($array)){
                if(!empty($array)){
                    $tmp=$this->a2s($array);
                    $sql .= " where ".join(" && ", $tmp);
                }
            }
            $sql.= " $array";
        }
        $sql .= $other;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function all($where='', $other=''){
        $sql="select * from `$this->table` ";
        
    }
    function count($where='', $other=''){}
    private function math($math, $col, $where='', $other=''){}
    function sum($col='', $where='', $other=''){}
    function max($col, $wher='', $other=''){}
    function min($col, $where='', $other=''){}

    function find($id){}
    function del($id){}
    function save($array){}
}

function dd($array){}
function to($url){}

$Title=new DB('title');


?>