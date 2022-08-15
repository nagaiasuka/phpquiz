<?php
// 関数の読み込み
require __DIR__.'/../lib/functions.php';

// $id =2;
$id =escape($_GET['id'] ?? '');

$data = fetchById($id);

if(!$data){
    error404();
}

$formattedData = generateFormattedData($data);

// $question =$formattedData['question'];


// $answers=$formattedData['answers'];

// // 答え（ABCD）
// $answer=$formattedData['correctAnswer'];

// // 答えの文字
// $answer_value=$answers[$answer];

// // 解説文
// $answer_text=$formattedData['explanation'];

$assignData =[
    'id' => $formattedData['id'],
    'question' => $formattedData['question'],
    'answers'=>$formattedData['answers'],
    // 'answer_value'=>$answers['answer'],
    // 'answer_text'=>$formattedData['explanation'],
];

loadTemplate('quiz',$assignData);
?>