<?php
header('Content-Type: application/json');
include 'Db.class.php';
$db = new Db();

$arr = array();
if(isset($_POST['email']) && isset($_POST['password'])){
    $login = $db->query("select * from user where email='$_POST[email]' AND password='$_POST[password]' ");
    if(count($login)>0){
        $arr['result'] = $login;
        $arr['info'] = 'success';
    }else{
        $arr['info'] = 'email/password salah';
    }
}else{
    $arr['info'] = 'form tidak lengkap';
}
// $cat_list = $db->query('select * from user');
// $arr = array();
// $arr['info'] = 'success';
// $arr['num'] = count($cat_list);
// $arr['result'] = $cat_list;
echo json_encode($arr);