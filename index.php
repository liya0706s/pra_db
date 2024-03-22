<?php
include_once "./a20240322_db.php";

// CRUD 

// CREATE 
// $Title->save(['text'=>'mp我是誰我是誰我是誰']);

// READ 
// $all=$Title->all();
// dd($all);

// update 
// $Title->save(['id'=>22, 'text'=>'penny chiu是天使來著']);

// del 
// $Title->del(16);

// math 
// $sum=$Title->sum('sh');
// dd($sum);

// 算單日人數
$total=$Total->find(['date'=>'2024-03-22'])['total'];
// dd($total);
echo $total;
?>