<?php include'header.php' ?>
<main>
    <!-- <div class="profile">
        <i class="fa-solid fa-envelope"><a href="contact.php">お問合せ</a></i>
    </div> -->
    <div class="puiz_show">
        <h2>問題一覧</h2>
        <ul>
            <?php foreach($questions as $question):?>
                <li><a href="./question.php?id=<?php echo $question['id'];?>"><?php echo $question['question'];?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
</main>
<?php include'footer.php' ?>
</html>