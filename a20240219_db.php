<?php
date_default_timezone_set("Asia/Taipei");
session_start();
class DB
{
    protected $dsn = "mysql:host=localhot;charset:utf8;dbname=db09";
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
        // 如果有設定的資料表且不是空的
        if (isset($this->table) && !empty($this->table)) {
            // 參數是陣列
            if (is_array($array)) {
                // 參數是陣列且不是空的
                if (!empty($array)) {
                    // 將陣列轉成字串放在$tmp變數
                    $tmp = $this->a2s($array);
                    $sql .= " where " . join(" && ", $tmp);
                }
            } else {
            // 有資料表，裡面的參數不是陣列
                $sql .= " $array";
            }
            $sql .= $other;
            return $sql;
        }
    }

    function all($where='', $other=''){
        $sql = "select * from `$this->table` ";
        $sql=$this->sql_all($sql,$where,$other);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function count($where='',$other=''){
        $sql="select count(*) from `$this->table` ";
        $sql=$this->sql_all($sql,$where,$other);
        return $this->pdo->query($sql)->fetchColumn();
    }

    private function math($math, $col, $array='',$other=''){
        
    }
}
