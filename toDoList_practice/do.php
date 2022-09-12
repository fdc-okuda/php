<?php

SESSION_start();

if(isset($_POST["submit_content"]) && !empty($_POST["submit_content"])){
    $text = $_POST["input_content"];

    if(!isset($_SESSION['memo'])){
        $_SESSION['memo'] = [];
    }

    $arrMemo = $_SESSION['memo'];

    $arrMemo[] = [
        'text' => $text,
        'status' => 0,
    ];

    $_SESSION['memo'] = array_values($arrMemo);

    header('Location: ./');
	exit;
}

if(isset($_POST["remove"]) && !empty($_POST["remove"])){
    $arrMemo = $_SESSION['memo'];
    $remove_id = $_POST['remove_id'];
    unset($arrMemo[$remove_id]);
    $_SESSION['memo'] = array_values($arrMemo);
}

if(isset($_POST['check_above']) && !empty($_POST['check_above'])){
    $arrMemo = $_SESSION['memo'];
    $check_id_above = $_POST['check_id_above'];
    $arrMemo[$check_id_above]['status'] = 1;
    $_SESSION['memo'] = array_values($arrMemo);
}

if(isset($_POST['check_below']) && !empty($_POST['check_below'])){
    $arrMemo = $_SESSION['memo'];
    $check_id_below = $_POST['check_id_below'];
    $arrMemo[$check_id_below]['status'] = 0;
    $_SESSION['memo'] = array_values($arrMemo);
}


?>