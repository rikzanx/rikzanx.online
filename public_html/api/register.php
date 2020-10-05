<?php
header('Content-Type: application/json');
include 'Db.class.php';
$db = new Db();

$arr = array();

if(isset($_POST['nama']) && isset($_POST['email']) && isset($_POST['password'])){
    $email = $db->query("select * from user where email='$_POST[email]' ");
    if(count($email)==0){
        $insert = $db->query("INSERT INTO user(id,nama,email,password) values(NULL,'$_POST[nama]','$_POST[email]','$_POST[password]')");
        if($insert > 0){
            $arr['result'] = $insert;
            $arr['info'] = 'Succesfully created a new person !';
        }else{
            $arr['info'] = 'fail';
        }
    }else{
        $arr['info'] = 'Email sudah ada';
    }
    
}else{
    $arr['info'] = 'from harus lengkap';
}
// $cat_list = $db->query('select * from user');
// $arr = array();
// $arr['info'] = 'success';
// $arr['num'] = count($cat_list);
// $arr['result'] = $cat_list;
echo json_encode($arr);