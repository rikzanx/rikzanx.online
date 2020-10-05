<?php
header('Content-Type: application/json');
include 'Db.class.php';
$db = new Db();

$cat_list = $db->query('select * from user');
$arr = array();
$arr['info'] = 'success';
$arr['num'] = count($cat_list);
$arr['result'] = $cat_list;
echo json_encode($arr);