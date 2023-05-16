<?php
    include "../mysql/mysql.php";
    include "../javascript/upload.php";
    header("Content-type: text/html; charset=utf-8");
    if(isset($_POST)){
        $answer_count_arr = $_POST["answer_count"];

        $conn->query("INSERT INTO tests (title) VALUES ('{$_POST["title"]}')");
        $res = $conn->query("SELECT * FROM tests WHERE title='{$_POST["title"]}' ");
        $test = $res->fetch_assoc();

        for($i = 0; $i < $_POST["question_count"]; $i++){
            $response_options = "[";
            for($j = 1; $j <= $answer_count_arr[$i]; $j++){
                $response_options .= '"'.$_POST["answer_"."$i"."_"."$j"].'"';
                  if($j != $answer_count_arr[$i])
                      $response_options .= ",";
            }
            $response_options .= "]";
            $image_path = saveTestImage("image_$i", $test['id'], $test['title']);
            $image_path = "http://vkrmorozirina.troitsa-ivashevo.ru/mobile".substr($image_path, 5);

            if($conn->query("INSERT INTO questions (question, response_options, answer, image, img_caption, comment, id_test) VALUES ('{$_POST["question_$i"]}', '$response_options', '{$_POST["response_answer_$i"]}', '{$image_path}', '{$_POST["img_caption_$i"]}', '{$_POST["comment_$i"]}', '{$test['id']}')")){
                header('Location: more_test.php?id='.$test['id']);
            }
            else{
                $conn->query("DELETE from tests WHERE id ={$test['id']} ");
                echo errorBlockHtml();

            }

        }

    }

