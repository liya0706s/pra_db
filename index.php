<?php
include_once "./a20240324_db.php";

// CRUD 
// CREATE 
// $Title->save(['text'=>'今天傍晚去跑步']);

// READ all and find 
// $all=$Title->all();
// dd($all);
$find=$Title->find(10);
dd($find);

?>