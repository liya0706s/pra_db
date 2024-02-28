<?php
date_default_timezone_set("Asia/Taipei");
session_start();
class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db15";
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
        // 判斷資料表是否存在且不為空
        if (isset($this->table) && !empty($this->table)) {
            // 判斷是不是陣列
            if (is_array($array)) {
                // 是陣列的話且不是空的
                if (!empty($array)) {
                    $tmp = $this->a2s($array);
                    $sql .= " where " . join(" && ", $tmp);
                }
            } else {
                // 不是陣列
                $sql .= " $array";
            }
            // 不是陣列是其他的
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

    private function math($math, $col, $array = '', $other = '')
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
        $row = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    function del($id)
    {
        $sql = "delete from `$this->table` where ";

        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= join(" && ", $tmp);
        } else if (is_numeric($id)) {
            $sql .= " `id`='$id'";
        }
        return $this->pdo->exec($sql);
    }

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
// class DB 到此

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
        // 如果沒有當天被訪問的紀錄, 將當天日期的資料數量設定為一
        $Total->save(['total' => 1, 'date' => date("Y-m-d")]);
    }
    // 設置拜訪的紀錄為1, 標記當前用戶有訪問
    $_SESSION['visited'] = 1;
}

// 測試dd方法如下:
$Total = new DB('total');
$t_q = $Total->q("select * from total");
$t_all = $Total->all();
$t_find = $Total->find(5);
$t_del = $Total->del(2);
$t_save = $Total->save(['total' => 20, 'date' => date('Y-m-d')]);
$t_update = $Total->save(['id' => 3, 'total' => 20]);
$t_sum = $Total->sum('total');
$t_max = $Total->max('total');
$t_min = $Total->min('total');
$t_count = $Total->count();

dd($t_q);
dd($t_all);
dd($t_find);
dd($t_del);
dd($t_save);
dd($t_update);
dd($t_sum);
dd($t_max);
dd($t_min);
dd($t_count);
