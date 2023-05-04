<?php

include "../mysql/mysql.php";
include "../javascript/upload.php";
header("Content-type: text/html; charset=utf-8");

if (isset($_POST)) {
    $save_old_image = array();
    $answer_count_arr = $_POST["answer_count"];
    $test_old_title = translitFile($_POST["old_title"]);
    $old_dirname = '../../resources/images/tests/'.$_POST["test_id"].'-'.$test_old_title;

    $test_title = translitFile($_POST["title"]);
    $dirname = '../../resources/images/tests/'.$_POST["test_id"].'-'.$test_title;
//    echo file_exists($dirname);
//    array_map('unlink', glob("$dirname/*.*"));
//    rmdir($dirname);

    $conn->query("UPDATE tests SET title='{$_POST["title"]}' WHERE id='{$_POST["test_id"]}'");

    $result = $conn->query("SELECT * from questions WHERE id_test='{$_POST['test_id']}'");

    for ($i = 0; $i < $_POST["question_count"]; $i++) {
        $question = $result->fetch_assoc();

        if(isset($_POST["delete_image_$i"]) && $_POST["delete_image_$i"] == "true"){
            unlink($question['image']);
//            echo "Delete  ".$question['image'];
            array_push($save_old_image, "");
        }
        else{
            array_push($save_old_image, $question['image']);
        }


    }
    if($_POST["title"] != $_POST["old_title"]){
        rename($old_dirname, $dirname);
        for ($i = 0; $i < $_POST["question_count"]; $i++) {
            $save_old_image[$i] = str_replace($old_dirname, $dirname, $save_old_image[$i]);
        }
    }

    $conn->query("DELETE from questions WHERE id_test='{$_POST['test_id']}'");

    for ($i = 0; $i < $_POST["question_count"]; $i++) {
        $response_options = "[";
        for ($j = 1; $j <= $answer_count_arr[$i]; $j++) {
            $response_options .= '"' . $_POST["answer_" . "$i" . "_" . "$j"] . '"';
            if ($j != $answer_count_arr[$i])
                $response_options .= ",";
        }
        $response_options .= "]";
//        echo $response_options;
        $image_pass = saveTestImage("image_$i", $_POST["test_id"], $_POST['title']);
//            $image_pass = "http://pstgu.yss.su/1/MorozIrina/mobile". trim($image_pass, ".");
        if($image_pass == "" && $save_old_image[$i]!="")
            $image_pass = $save_old_image[$i];

        if($conn->query("INSERT INTO questions (question, response_options, answer, image, img_caption, comment, id_test) VALUES ('{$_POST["question_$i"]}', '$response_options', '{$_POST["response_answer_$i"]}', '{$image_pass}', '{$_POST["img_caption_$i"]}', '{$_POST["comment_$i"]}', '{$_POST['test_id']}')")){
            header('Location: more_test.php?id='.$_POST['test_id']);
        }
        else{
            echo errorBlockHtml();
        }
    }
}
