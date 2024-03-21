<?php

include_once "./a20240304_db.php";

// CREATE 
// 20240308測試是否能insert新增資料進資料庫(exec)
// 有private function a2s()
// $Title->save(['text'=>'安安', 'sh'=>1]);

// UPDATE 
// 測試能否編輯 update 進資料庫 (exec)
// 測試能否新增 insert into 進資料庫 (exec)
// $Title->save(['text'=>'還好安安', 'sh'=>0]);
// $Title->save(['id'=>9, 'text'=>'呵呵呵,訂閱YT Premium了', 'sh'=>0]);

// READ 
// select 查詢顯示所有 多筆
// 有private function sql_all()
// $rows=$Title->all(['text'=>'安安']);
// dd($rows);

// select 查詢單筆 
// 有 private function a2s() 
// $row=$Title->find(2);
// $row=$Title->find(['text'=>'安安']);
// dd($row);

// MATH數學計算 一個數字
// $row=$Title->sum('sh');
// $row=$Title->count(['text'=>'安']);
// echo $row;

// DELETE 
// del()刪除的是 執行exec進資料庫 
// $Title->del(6);

// $total=$Total->find(['date'=>date("Y-m-d")]);
// echo date("y年m月d日");

// 總計
// $sum=$Total->sum('total');
// $sum=$Title->sum('sh');
// echo $sum;

// // 某日瀏覽總人次
// $date_total=$Total->find(['date'=>'2024-03-12'])['total'];
// echo $date_total;





?>