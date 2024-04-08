<?php
include_once "./a20240408_db.php";

// CRUD 
// CREATE 
// $Title->save(['text'=>'今天有下雨']);

// READ 
// $all=$Title->all();
// dd($all);
// $find=$Title->find(['text'=>'今天有下雨']);
// dd($find);
// $count=$Title->count(['sh'=>1]);
// dd($count);

// update 
// $Title->save(['id'=>22, 'text'=>'penny chiu是天使!']);

// DELETE 
// $Title->del(['id'=>19]);

// math sum 
// $sum=$Title->sum('sh');
// dd($sum);

// 某日總瀏覽人數
// $today=$Total->find(['date'=>date("Y-m-d")])['total'];
// echo $today;

// $find=$Total->find(['date'=>date("Y-m-d")]);
// dd($find); 
//陣列用dd, 不能用 echo是字串
?>