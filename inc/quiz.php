<?php include'header.php' ?>
<main>
    <div class="quiz_box">
        <div class="quiz">
            <h2>問題<?php echo $id; ?></h2>
            <p>
                <?php echo $question; ?>
            </p>
        </div>
        <div class="choices">
            <ol class="answers" data-id="<?php echo $id; ?>">
                <?php foreach($answers as $key =>$value): ?>
                    <li data-answer="<?php echo $key ?>"><?php echo $value ?></li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>
    <div class="answer_box">
        <h3 class="answer"><span id="answer"></span></h3>
        <p class="answer_text"><span id="answer_text"></span></p>
    </div>


    <div class="buttons">
        <div class="button01">
            <a href="index.php" >戻る</a>
        </div>
        <div class="button02">
            <a href="question.php?id=<?php echo intval($id) +1?>">次に</a>
        </div>
    </div>

</main>
<?php include'footer.php' ?>

</html>


