<?php
date_default_timezone_set("Asia/Taiepi");
session_start();

class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db09";
    protected $pdo;
    protected $table;

    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    private function a2s($array){
        foreach($array as $col=>$value){
            $tmp[]="`$col`='$value'";
        }
        return $tmp;
    }

        
    
}

?>