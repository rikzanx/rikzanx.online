<?php
header('Content-Type: application/json');
include 'Db.class.php';
$db = new Db();

$arr = array();

if(isset($_POST['user_id']) && isset($_POST['nama']) && isset($_POST['nominal'])){
    $user_id = (int)$_POST['user_id'];
    $cek_user = $db->query("SELECT * FROM user where id=$user_id");
    if($cek_user>0){
        $insert = $db->query("INSERT INTO data_buwuh(id,user_id,nama,nominal,status) values(NULL,$user_id,'$_POST[nama]','$_POST[nominal]',0)");
        if($insert > 0){
            $arr['result'] = $insert;
            $arr['info'] = 'Succesfully created a new data buwuh !';
        }else{
            $arr['info'] = 'fail';
        }
    }else{
        $arr['info'] = 'user id tidak cocok';
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