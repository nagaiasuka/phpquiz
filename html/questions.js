// liタグ取得
const answersList = document.querySelectorAll('ol.answers li');

answersList.forEach(li => li.addEventListener('click',checkClickedAnser));



// クリックした際の動き
function checkClickedAnser(event){
    // どのボタンを押したかデータの受け取り(liタグ)
    const clickedAnswerElement = event.currentTarget;
    console.log(clickedAnswerElement);
    // 選択した答え
    const selectedAnswer = clickedAnswerElement.dataset.answer;

    const questionId = clickedAnswerElement.closest('ol.answers').dataset.id;

    const formData = new FormData();
    
    // 送信したい値を追加
    formData.append('id', questionId);
    formData.append('selectedAnswer', selectedAnswer);

    // xhr = XMLHttpRequestの頭文字です
    const xhr = new XMLHttpRequest();

    // HTTPメソッドをPOSTに指定、送信するURLを指定
    xhr.open('POST', 'answer.php');

    // フォームデータを送信
    xhr.send(formData);
    xhr.addEventListener('loadend', function(event){
        /** @type {XMLHttpRequest} */
        const xhr =event.currentTarget;

        // リクエストが成功したかステータスコードで確認
        if (xhr.status===200){
            // jsonをオブジェクトに変換
            const response = JSON.parse(xhr.response);
            const result = response.result;
            const answer = response.answer;
            const answer_value= response.answer_value;
            const answer_text = response.answer_text;

            displayResult(result,answer,answer_value,answer_text);
        } else{
            alert('Error: 回答データの取得に失敗しました');
        }
    });


  
}



function displayResult(result,answer,answer_text,answer_value){
    // メッセージを入れる変数
    let message;
    // カラーコード入れる変数
    let answercolor;

    // 答えが正しいか判定
    if(result){
        // 正しい答えだった場合
        message = '正解！正しい答えです。';
        answercolor = 'blue';
    }else{
        // 間違えた答えだった場合
        message = '残念！不正解です。';
        answercolor = 'red';
    }

    alert(message);

    //正解の内容をHTMLに組み込む
    document.querySelector('span#answer').innerHTML = answer + '. ' + answer_text;
    document.querySelector('span#answer_text').innerHTML = answer_value;



    // 答えを間違った際に色を変更する
    document.querySelector('.answer').style.color = answercolor;
    // 答えを表示
    document.querySelector('.answer_box').style.display = 'block';
}