<?php
include_once "./a20240313_db.php";

// CREATE 
// $Title->save(['text'=>'發生什麼事了?','sh'=>1]);g
// $Title->save(['text'=>'錢真的是滿好用的，要努力用功，找工作了', 'sh'=>1]);

// UPDATE 
// $Title->save(['id'=>9, 'text'=>'呵呵呵,訂閱YT Premium了', 'sh'=>0]);
// $Title->save(['id'=>4, 'sh'=>0]);

// READ 
// $title=$Title->all();
// dd($title);
// $title=$Title->all();

// READ 
// find()只會找到條件的第一筆
// $title=$Title->find('sh');
// dd($title);

// DELETE 
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