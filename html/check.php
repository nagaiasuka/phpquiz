<?php
// 関数の読み込み
require __DIR__.'/../lib/functions.php';

$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];

// 内容確認
if($name==''){
    $name='名前を入力してください。';
}else{
    $name;
}

if($email==''){
    $email='メールアドレスが入力されていません';
}else{
    $email;
}

if($message==''){
    $message='内容が入力されていません';
}else{
    $message;
}

$assignData =[
   'name'=>$name,
   'email'=>$email,
   'message'=>$message
];

loadTemplate('check.tpl',$assignData);
?>