<?php
header('Content-Type: application/json');
include 'Db.class.php';
$db = new Db();
$arr = array();
if(isset($_GET['user_id'])){
    $user_id = (int) $_GET['user_id'];
    $cat_list = $db->query("select * from data_buwuh where user_id=$user_id");
    $arr['info'] = 'success';
    $arr['num'] = count($cat_list);
    $arr['result'] = $cat_list;
}else{
    $arr['info'] = 'user id tidak ada';
}

echo json_encode($arr);