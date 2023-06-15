<?php
include "../mysql/mysql.php";
include "../mysql/menu.php";
include "../check_auth.php";
$result_1 = $conn->query("SELECT * from tests WHERE id='{$_GET['id']}'");
$result_2 = $conn->query("SELECT * from questions WHERE id_test='{$_GET['id']}'");
while ($test = $result_1->fetch_array()) {

    ?>
    <!DOCTYPE HTML>
    <html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../style/style.php" media="screen">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title><?= $test['title'] ?></title>
    </head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
    <body class="body-form">
    <div>
        <div class="decor">
            <div class="form-inner">
                <div class="form">
                    <input type="hidden" name="test_id" id="test_id" value='<?= $_GET['id'] ?>'>
                    <h4><?= $test['title'] ?></h4>
                    <?php
                    $i = 0;
                    while ($question = $result_2->fetch_assoc()) {
                        $question['response_options'] = trim($question['response_options'], '[]');
                        $answers = explode('",', $question['response_options']);

                        ?>
                    <div id="inputFormQuestion_<?= $i ?>" class="inputFormQuestion" data-answer_count="1">
                        <br>
                        <h3><?= $i + 1 ?>. <?= $question['question'] ?></h3>

                        <!--                            <h3>Варианты ответов</h3>-->
                        <?php
                        $j = 1;
                        foreach ($answers as $answer) {
                            $answer = str_replace('"', '', $answer);
                            if (!empty($answer)) {

                                ?>

                                <div class="formAnswer">
                                    <div class="wrapper">
                                        <?php
                                        if ($j == $question['answer']) {
                                            ?>
                                            <div class="circle">
                                                <div class="checkMark"></div>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="small-circle"></div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="answer-circle"><?= $answer ?></div>
                                </div>
                                <?php
                            }
                            $j++;
                        }
                        ?>
                        <br>
                        <strong><p>Ответ: <?= $question['answer'] ?></p></strong>
                        <br>

                        <?php
                        if (@getimagesize($question['image'])) {
                            ?>
                            <div class="input-file-list-item">
                                <div><img src="<?= $question['image'] ?>" class="image-file"></div>
                                <span class="input-file-list-name"><?= $question['image'] ?></span>
                            </div>
                            <?php
                        }
                        if (!empty($question['img_caption'])) {
                            ?>
                            <h3>Описание</h3>
                            <p><?= $question['img_caption'] ?></p><br>
                            <?php
                        }
                        if (!empty($question['comment'])) {
                            ?>
                            <div class="accordion" id="comment_<?= $i ?>">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading_<?= $i ?>">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse_<?= $i ?>" aria-expanded="false"
                                                aria-controls="collapse_<?= $i ?>">

                                            <span>Комментарий</span></button>
                                    </h2>
                                    <div id="collapse_<?= $i ?>" class="accordion-collapse collapse show"
                                         data-bs-parent="#comment_<?= $i ?>">
                                        <div class="accordion-body"><?= $question['comment'] ?></div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            </div>
                            <?php
                        }
                        $i++;

                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
    <?php
}

?>
