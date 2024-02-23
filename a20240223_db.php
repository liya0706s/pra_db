<?php
date_default_timezone_set("Asia/Taipei");
Session_start();

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=web09";
    protected $pdo;
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    function q($sql)
    {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    private function a2s($array)
    {
        foreach ($array as $col => $value) {
            $tmp[] = "`$col`='$value'";
        }
        return $tmp;
    }
    private function sql_all($sql, $array, $other)
    {
       if(isset($this->table) && !empty($this->table)){
        if(is_array($array)){
            if(!empty($array)){
                $tmp=$this->a2s($array);
                $sql .= " where ".join(" && ", $tmp);
            }
        }else{
            $sql .= " $array";
        }
        $sql .=$other;
        return $sql;
       } 
    }

    private function math($math, $col, $array = '', $other = '')
    {
        $sql="select $math(`$col`) from `$this->table` ";
        $sql=$this->sql_all($sql,$array,$other);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function sum($col = '', $where = '', $other = '')
    {
        return $this->math('sum', $col, $where, $other);
    }
    function max($col, $where, $other)
    {
         
    }
    function min($col, $where, $other)
    {

        function find($id)
        {
        }
        function del($id)
        {
        }
        function save($array)
        {
        }
        function all($where = '', $other = '')
        {
        }
        function count($where = '', $other = '')
        {
        }
    }
}
