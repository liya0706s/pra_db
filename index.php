<?php
include_once "./b20240310_db.php";

// $Title->save(['text'=>'還好安安']);
// $Title->save(['text'=>'加油', 'id'=>4]);
// $Title->del(['id'=>3]);

// $title=$Title->all();
// dd($title);

// $title=$Title->count();
// dd($title);

$title=$Title->sum(['text'=>'還好安安']);
dd($title);

?>