<?php
date_default_timezone_set("Asia/Taipei");
session_start();

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db11";
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
        if (isset($this->table) && !empty($this->table)) {
            if (is_array($array)) {
                if (!empty($array)) {
                    $tmp = $this->a2s($array);
                    $sql .= " where " . join(" && ", $tmp);
                }
            } else {
                $sql .= " $array";
            }
            $sql .= $other;
            return $sql;
        }
    }
    function all($where = '', $other = '')
    {
        $sql = "select * from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function count($where = '', $other = '')
    {
        $sql = "select count(*) from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchColumn();
    }

    function math($math, $col, $array = '', $other = '')
    {
        $sql = "select $math(`$col`) from `$this->table` ";
        $sql = $this->sql_all($sql, $array, $other);
        return $this->pdo->query($sql)->fetchColumn();
    }

    function sum($col = '', $where = '', $other = '')
    {
        return $this->math('sum', $col, $where, $other);
    }
    function max($col, $where = '', $other = '')
    {
        return $this->math('max', $col, $where, $other);
    }
    function min($col, $where = '', $other = '')
    {
        return $this->math('min', $col, $where, $other);
    }

    function find($id)
    {
        $sql = "select * from `$this->table` ";
        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= " where " . join(" && ", $tmp);
        } else if (is_numeric($id)) {
            $sql .= " where `id`='$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function del($id)
    {
        $sql = "delete from `$this->table` ";
        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= " where " . join(" && ", $tmp);
        } else if (is_numeric($id)) {
            $sql .= " where `id`='$id'";
        }
        return $this->pdo->exec($sql);
    }

    // EX: UPDATE `users` SET name='John',age='30' WHERE `id`='1'
    // EX: INSERT INTO `users` (`name`,`age`) VALUES ('John','30')
 
    function save($array) 
    {
        if (isset($array['id'])) {
            $sql = "update `$this->table` set ";
            if (!empty($array)) {
                $tmp = $this->a2s($array);
            }
            $sql .= join(",", $tmp);
            $sql .= " where `id`='{$array['id']}'";
        } else {
            $sql = "insert into `$this->table` ";
            $cols = "(`" . join("`,`", array_keys($array)) . "`)";
            $vals = "('" . join("','", $array) . "')";
            $sql = $sql . $cols . " values " . $vals;
        }
        return $this->pdo->exec($sql);
    }
}

    // 1. 先判斷有沒有id
        // 1.1 建立基本的update SQL語句
        // 1.2 如果參數array不是空的
        // 1.3 用a2s()方法提取陣列鍵和值放到變數tmp中
        // 1.2.2 用join()方法用逗號和tmp變數合併
        // 1.2.3 再用where `id`=陣列值合併
    // 2.沒有id的話
        // 2.1 建立基本的insert into SQL語句
        // 2.2 建立cols 拼接 (`和 `,` 鍵 和 `)
        // 2.3 建立vals拼接 (' 和 ',' 值 和 ')
    // 3. 返回執行sql語句


function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url)
{
    header("location:$url");
}

$Total = new DB('total');

if (!isset($_SESSION['visited'])) {
    if ($Total->count(['date' => date("Y-m-d")]) > 0) {
        $total = $Total->find(['date' => date("Y-m-d")]);
        $total['total']++;
        $Total->save($total);
    } else {
        $Total->save(['total' => 1, 'date' => date("Y-m-d")]);
    }
    $_SESSION['visited'] = 1;
}
