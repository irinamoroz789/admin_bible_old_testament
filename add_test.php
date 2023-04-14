<?php
    include "mysql.php";
    include "upload.php";
    header("Content-type: text/html; charset=utf-8");
    if(isset($_POST)){
        $answer_count_arr = $_POST["answer_count"];

        $conn->query("INSERT INTO tests (title) VALUES ('{$_POST["title"]}')");
        $res = $conn->query("SELECT * FROM tests WHERE title='".$_POST["title"]."' ");
        $test = $res->fetch_assoc();

        for($i = 0; $i < $_POST["question_count"]; $i++){
            $response_options = "[";
            for($j = 1; $j < $answer_count_arr[$i]; $j++){
                $response_options .= '"'.$_POST["answer_"."$i"."_"."$j"].'"';
                  if($j != $answer_count_arr[$i]-1)
                      $response_options .= ",";
            }
            $response_options .= "]";
              echo $response_options;
            $image_pass = saveTestImage("image_$i", $test['id'], $test['title']);
//            $image_pass = "http://pstgu.yss.su/1/MorozIrina/mobile". trim($image_pass, ".");

            $conn->query("INSERT INTO questions (question, response_options, answer, image, img_caption, comment, id_test) VALUES ('{$_POST["question_$i"]}', '$response_options', '{$_POST["response_answer_$i"]}', '{$image_pass}', '{$_POST["img_caption_$i"]}', '{$_POST["comment_$i"]}', '{$test['id']}')");

        }
//        echo $_POST["question_0_"];
//        echo $_POST["question_count"];
//        foreach ($_POST["answer_count"] as $item)
//        {
//            echo $item;
//        }
//        echo $_POST["answer_count"];
//        foreach ($_POST as $value)
//            echo $value."<br>";
//
//        echo "<br>";
//        $conn->query("INSERT INTO questions (question, response_options, answer, image, img_caption, comment, id_test) VALUES ('{$_POST["question"]}', '{$_POST["response_options"]}', '{$_POST["answer"]}', '{$_POST["image"]}', '{$_POST["img_caption"]}', '{$_POST["comment"]}', '".$_GET['id']."')");
       // header('Location: table.php');
    }

