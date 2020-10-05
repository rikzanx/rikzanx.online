<?php
header('Content-Type: application/json');
include 'Db.class.php';
$db = new Db();

$arr = array();

if(isset($_POST['id']) && isset($_POST['user_id']) && isset($_POST['nama']) && isset($_POST['nominal']) && isset($_POST['status'])){
    $buwuh_id = (int)$_POST['id'];
    $cek_buwuh = $db->query("SELECT * FROM data_buwuh where id=$buwuh_id");
    if($cek_buwuh>0){
        $user_id = (int)$_POST['user_id'];
        $cek_user = $db->query("SELECT * FROM user where id=$user_id");
        if($cek_user>0){
            $update = $db->query("UPDATE data_buwuh SET nama='$_POST[nama]', nominal='$_POST[nominal]', status='$_POST[status]' where id=$buwuh_id ");
            if($update > 0){
                $arr['result'] = $update;
                $arr['info'] = 'Succesfully updated a new data buwuh !';
            }else{
                $arr['info'] = 'fail';
            }
        }else{
            $arr['info'] = 'user id tidak cocok';
        }
    }else{
        $arr['info'] = 'id data salah';
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