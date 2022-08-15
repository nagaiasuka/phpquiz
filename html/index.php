<?php
// 関数の読み込み
require __DIR__.'/../lib/functions.php';

$dataList = fetchAll();

if(!$dataList){
    error404();
}

$questions =[];
foreach($dataList as $data){
    $questions[] = generateFormattedData($data);
}



$assignData =[
   'questions' =>$questions,
];

loadTemplate('index.tpl',$assignData);
?>