<?php
include "../mysql/menu.php";
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/style.php" media="screen">
    <title>Добавить тест</title>
</head>
<script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
<body class="body-form">
<div>
    <form class="decor" action="add_test.php" method="post" enctype="multipart/form-data">
        <div class="form-inner">
            <div class="form">
                <h4>Добавить тест</h4>
                <input type="hidden" name="question_count"  id="input_question_count" value="1">
                <input type="text" name="title" placeholder="Название теста"><br>
                <div id="inputFormQuestion_0" class="inputFormQuestion" data-answer_count="1">
                    <div class="delete-question>">
                        <button id="removeQuestion" class="button-trash" type="button" onclick="deleteQuestion(this)"><object type="image/svg+xml" data="../style/trash.svg"></object></button>
                    </div>
                    <h3>Вопрос</h3>
                    <input type="hidden" name="answer_count[]"  id="input_answer_count_0" class="answer_count" value="1">
                <div id="addQuestion" onclick="addQuestion(this)"><span class="noselect" onchange="addAnswer()">Добавить вопрос</span><div id="circle"></div></div><br>
                <input type="text" class="question" name="question_0" placeholder="Текст вопроса"><br>
                <h3>Варианты ответов</h3>
                <div id="inputFormAnswer_0_1" class="inputFormAnswer">
                    <div class="input-group">
                        <input type="text" name="answer_0_1" class="form-control m-input" placeholder="Введите ответ" autocomplete="off">
                        <div class="input-group-append">
                            <button id="removeAnswer" type="button" class="btn-danger" onclick="deleteAnswer(this)">Удалить</button>
                        </div>
                    </div>
                </div>
                <div class="newAnswer"></div>
                <div id="addAnswer" class="add_answer" onclick="addAnswer(this)">+</div>
                <br>
                <input type="number" name="response_answer_0" class="response_answer" min="1" step="1" placeholder="Номер ответа" onchange="this.value = parseInt(this.value);"><br>
                <div class="input-file-row" >
                    <label class="input-file">
                        <input type="file" name="image_0" class="image" multiple accept="image/*" onchange="changeImage(this)">
                        <span>Загрузить картинку</span>
                    </label>
                    <div class="input-file-list"></div>
                </div>
                <input type="text" name="img_caption_0" class="img_caption" placeholder="Описание картинки"><br>
                <textarea placeholder="Комментарий к ответу..." name="comment_0" class="comment" rows="3"></textarea><br>
                </div>
            </div>
            <input type="submit" value="Отправить">
        </div>
    </form>
</div>
<script src="../javascript/test.js"></script>
</body>
</html>
