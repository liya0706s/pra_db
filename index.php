<?php
include_once "./a20240321_db.php";

// CRUD 

// CREATE:
// insert into不行也沒有錯誤訊息?? 是少了return
// $Title->save(['text'=>'今天去參加北科就業博覽會???', 'sh'=>1]);
// 沒有寫sh預設值是0
// $Title->save(['text'=>'今天去參加北科就業博覽會']);
// $Title->save(['id'=>11, 'text'=>'今天天氣真好!']);

// READ:
// $all=$Title->all();
// dd($all);

// UPDATE:
// $Title->save(['id'=>20,'sh'=>1]);

// DELETE:
// $Title->del(['id'=>21]);

// math 
// $count=$Title->count(['sh'=>1]);
// dd($count);
// $sum=$Title->sum('sh');
// dd($sum);

// 某日瀏覽總人次
$date=$Total->find(['date'=>'2024-03-20'])['total'];
echo $date;


?>