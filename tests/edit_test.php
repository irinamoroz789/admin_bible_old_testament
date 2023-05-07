<?php
    include "../mysql/mysql.php";
    include "../mysql/menu.php";
    $result_1 = $conn->query("SELECT * from tests WHERE id='{$_GET['id']}' ");
    $result_2 = $conn->query("SELECT * from questions WHERE id_test='{$_GET['id']}' ");
    $res = $conn->query("SELECT count(*) from questions WHERE id_test='{$_GET['id']}' ");
    $row = $res->fetch_row();
    $number_question = $row[0];
//    echo $number_question;
    while($test = $result_1->fetch_array())
    {

?>
        <!DOCTYPE HTML>
        <html>
        <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="../style/style.php" media="screen">
            <title>Редактирование теста <?=$test['title']?></title>
        </head>
        <script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
        <body class="body-form">
        <div>
            <form class="decor" action="edit_script.php?id=<?=$_GET['id']?>" method="post" enctype="multipart/form-data">
                <div class="form-inner">
                    <div class="form">
                        <input type="hidden" name="test_id"  id="test_id" value='<?=$_GET['id']?>'>
                        <input type="hidden" name="old_title"  id="old_title" value='<?=$test['title']?>'>
                        <h4>Редактировать тест</h4>
                        <input type="text" name="title" value='<?=$test['title']?>' placeholder="Название теста"><br>
                        <?php
                        $i = 0;
                        while($question = $result_2->fetch_assoc())
                        {
                        $question['response_options'] = trim($question['response_options'], '[]');
                        $answers = explode( '",', $question['response_options']);

                        ?>

                        <div id="inputFormQuestion_<?=$i?>" class="inputFormQuestion" data-answer_count="1">
                            <div class="delete-question>">
                                <button id="removeQuestion" class="button-trash" type="button" onclick="deleteQuestion(this)"><object type="image/svg+xml" data="../style/trash.svg"></object></button>
                            </div>

                            <h3>Вопрос</h3>
                            <?php
                            if($i == $number_question-1){
                            ?>
                            <div id="addQuestion" onclick="addQuestion(this)"><span class="noselect" onchange="addAnswer()">Добавить вопрос</span><div id="circle"></div></div><br>
                            <?php
                            }
                            ?>
                            <input type="text" class="question" name="question_<?=$i?>" placeholder="Текст вопроса" value='<?=$question['question']?>'><br>
                            <h3>Варианты ответов</h3>
                                <?php
                                $j = 1;
                                foreach($answers as $answer)
                            {
                                    $answer = str_replace('"', '', $answer);

                                ?>

                            <div id="inputFormAnswer_<?=$i?>_<?=$j?>" class="inputFormAnswer">
                                <div class="input-group">
                                    <input type="text" name="answer_<?=$i?>_<?=$j?>" class="form-control m-input" placeholder="Введите ответ" autocomplete="off" value='<?=$answer?>'>
                                    <div class="input-group-append">
                                        <button id="removeAnswer" type="button" class="btn-danger" onclick="deleteAnswer(this)">Удалить</button>
                                    </div>
                                </div>
                            </div>
                                <?php
                                $j++;
                            }
                                ?>
                            <input type="hidden" name="answer_count[]"  id="input_answer_count_<?=$i?>" class="answer_count" value="<?=$j-1?>">
                            <div class="newAnswer"></div>
                            <div id="addAnswer" class="add_answer" onclick="addAnswer(this)">+</div>
                            <br>
                            <input type="number" name="response_answer_<?=$i?>" class="response_answer" min="1" step="1" placeholder="Номер ответа" value='<?=$question['answer']?>' onchange="this.value = parseInt(this.value);"><br>
                            <div class="input-file-row" >
                                <label class="input-file">
                                    <input type="file" name="image_<?=$i?>" class="image" multiple accept="image/*" onchange="changeImage(this)"><br>
                                    <span>Загрузить картинку</span>
                                </label>
                                <div class="input-file-list">
                                    <?php
                                    if(@getimagesize($question['image'])){
                                        ?>

                                        <div class="input-file-list-item" id="input_image<?=$i?>">
                                            <div><img src="<?=$question['image']?>" class="image-file"></div>
                                            <span class="input-file-list-name"><?=$question['image']?></span>
                                            <a href="#" onclick="removeImage(this)" class="input-file-list-remove">x</a>
                                            <input type="hidden" name="save_image_<?=$i?>"  id="save_image_<?=$i?>" class="save_image" value="<?=$question['image']?>">
                                        </div>

                                        <?php
                                    }
                                    ?>
                                </div>
<!--                                <input type="hidden" name="delete_image_--><?//=$i?><!--"  id="delete_image_--><?//=$i?><!--" class="delete_image" value="false">-->

                            </div><br>
                            <input type="text" name="img_caption_<?=$i?>" class="img_caption" placeholder="Описание картинки" value='<?=$question['img_caption']?>'><br>
                            <textarea placeholder="Комментарий к ответу..." name="comment_<?=$i?>" class="comment" rows="3" ><?=$question['comment']?></textarea><br>

                        </div>
                            <?php
                            $i++;

                        }
                        ?>

                    </div>
                    <input type="hidden" name="question_count"  id="input_question_count" value='<?=$i?>'>
                    <input type="submit" value="Отправить">
                </div>
            </form>
        </div>
        <script src="../javascript/test.js"></script>
        </body>

        </html>
        <?php
}

?>